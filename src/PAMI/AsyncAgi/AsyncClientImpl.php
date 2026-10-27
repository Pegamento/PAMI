<?php

/**
 * An AsyncAGI client implementation.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  AsyncAgi
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

declare(strict_types=1);

namespace PAMI\AsyncAgi;

use PAMI\Message\Action\AGIAction;
use PAGI\Client\AbstractClient as PagiClient;
use PAMI\AsyncAgi\Event\IAsyncAgiExecEvent;
use PAMI\AsyncAgi\Event\IAsyncAgiStartEvent;
use PAGI\Exception\ChannelDownException;
use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;
use Psr\Log\NullLogger;

/**
 * An AGI client implementation.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  AsyncAgi
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
class AsyncClientImpl extends PagiClient implements IEventListener, IAsyncClient
{
    /**
     * The pami client to be used.
     * @var \PAMI\Client\IClient
     */
    private \PAMI\Client\IClient $pamiClient;
    /**
     * The event that originated this async agi request.
     * @var IAsyncAgiStartEvent
     */
    private IAsyncAgiStartEvent $asyncAgiEvent;
    /**
     * The channel that originated this async agi request.
     * @var string
     */
    private string $channel;
    /**
     * The listener id after registering with the pami client.
     * @var string
     */
    private string $listenerId;

    /**
     * Last CommandId issued, so we can track responses for agi commands.
     * @var string
     */
    private string $lastCommandId;

    /**
     * Filled when an async agi event has been received, with command id equal
     * to the last command id sent.
     * @var string
     */
    private string|false $lastAgiResult = false;

    /**
     * Optional busy-wait limit, in seconds. Null waits until a result arrives.
     * @var float|null
     */
    private ?float $timeout = null;

    /**
     * Handles pami events.
     *
     * @param EventMessage $event
     *
     * @return void
     */
    public function handle(EventMessage $event): void
    {
        if ($event instanceof IAsyncAgiExecEvent) {
            if ($event->getCommandID() == $this->lastCommandId) {
                $this->lastAgiResult = trim($event->getResult() ?? '');
            }
        }
    }

    /**
     * The parameter stays untyped so this override stays compatible with
     * PAGI\Client\AbstractClient::send(), which has no native parameter type.
     *
     * @param string $text
     * @return mixed
     * @throws \PAGI\Exception\ChannelDownException
     * @throws \PAGI\Exception\InvalidCommandException
     * @throws \PAMI\Client\Exception\ClientException
     */
    protected function send($text)
    {
        $this->logger->debug('Sending: ' . $text);
        $this->lastCommandId = uniqid(__CLASS__);
        $action = new AGIAction($this->channel, $text, $this->lastCommandId);
        $this->lastAgiResult = false;
        $response = $this->pamiClient->send($action);
        if (!$response->isSuccess()) {
            throw new ChannelDownException($response->getMessage());
        }
        $deadline = $this->timeout !== null ? microtime(true) + $this->timeout : null;
        // handle() stores the result while process() runs, which static analysis cannot see.
        while ($this->lastAgiResult === false) { // @phpstan-ignore identical.alwaysTrue
            if ($deadline !== null && microtime(true) >= $deadline) {
                throw new ChannelDownException('Async AGI command timed out');
            }
            $this->pamiClient->process();
            usleep(1000);
        }
        return $this->getResultFromResultString($this->lastAgiResult); // @phpstan-ignore deadCode.unreachable
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::open()
     */
    protected function open(): void
    {
        $environment = $this->asyncAgiEvent->getEnvironment();
        $this->channel = $this->asyncAgiEvent->getChannel();
        foreach (explode("\n", $environment) as $line) {
            if ($this->isEndOfEnvironmentVariables($line)) {
                break;
            }
            $this->readEnvironmentVariable($line);
        }
        $this->listenerId = $this->pamiClient->registerEventListener($this);
        $this->logger->debug(print_r($this->variables, true));
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::close()
     */
    protected function close(): void
    {
        $this->pamiClient->unregisterEventListener($this->listenerId);
    }

    /**
     * Constructor.
     *
     * Note: The client accepts an array with options. The available options are
     *
     * pamiClient => The PAMI client that will be used to run this async client.
     *
     * environment => Environment as received by the AsyncAGI Event.
     *
     * timeout => Optional seconds to wait for an AsyncAGI exec result before
     * throwing ChannelDownException. Omit it to wait indefinitely.
     *
     * @param array $options Optional properties.
     *
     * @return void
     */
    public function __construct(array $options = [])
    {
        // $this->options = $options;
        $this->logger = new NullLogger();
        $this->pamiClient = $options['pamiClient'];
        $this->asyncAgiEvent = $options['asyncAgiEvent'];
        $this->timeout = isset($options['timeout']) ? (float) $options['timeout'] : null;
        $this->open();
    }


    /**
     * (non-PHPdoc)
     * @see IAsyncClient::asyncBreak()
     */
    public function asyncBreak(): void
    {
        $this->send('ASYNCAGI BREAK');
    }
}
