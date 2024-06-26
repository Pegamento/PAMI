<?php
/**
 * An AsyncAGI client implementation.
 *
 * PHP Version 5
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
 * PHP Version 5
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
    private $pamiClient;
    /**
     * The event that originated this async agi request.
     * @var IAsyncAgiStartEvent
     */
    private $asyncAgiEvent;
    /**
     * The channel that originated this async agi request.
     * @var string
     */
    private $channel;
    /**
     * The listener id after registering with the pami client.
     * @var string
     */
    private $listenerId;

    /**
     * Last CommandId issued, so we can track responses for agi commands.
     * @var string
     */
    private $lastCommandId;

    /**
     * Filled when an async agi event has been received, with command id equal
     * to the last command id sent.
     * @var string
     */
    private $lastAgiResult;

    /**
     * Handles pami events.
     *
     * @param EventMessage $event
     *
     * @return void
     */
    public function handle(EventMessage $event)
    {
        if ($event instanceof IAsyncAgiExecEvent) {
            if ($event->getCommandId() == $this->lastCommandId) {
                $this->lastAgiResult = trim($event->getResult());
            }
        }
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::send()
     * @param $text
     * @return Result
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
        while ($this->lastAgiResult === false) {
            $this->pamiClient->process();
            usleep(1000);
        }
        return $this->getResultFromResultString($this->lastAgiResult);
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::open()
     */
    protected function open()
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
    protected function close()
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
     * @param array $options Optional properties.
     *
     * @return void
     */
    public function __construct(array $options = array())
    {
        // $this->options = $options;
        $this->logger = new NullLogger;
        $this->pamiClient = $options['pamiClient'];
        $this->asyncAgiEvent = $options['asyncAgiEvent'];
        $this->open();
    }


    /**
     * (non-PHPdoc)
     * @see IAsyncClient::asyncBreak()
     */
    public function asyncBreak()
    {
        $this->send('ASYNCAGI BREAK');
    }
}
