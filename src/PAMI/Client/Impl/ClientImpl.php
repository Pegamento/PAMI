<?php

/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Client
 * @subpackage Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
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

namespace PAMI\Client\Impl;

use PAMI\Message\OutgoingMessage;
use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Action\LogoffAction;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Response\Response;
use PAMI\Message\Event\Factory\Impl\EventFactoryImpl;
use PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl;
use PAMI\Listener\IEventListener;
use PAMI\Client\Exception\ClientException;
use PAMI\Client\IClient;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Client
 * @subpackage Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ClientImpl implements IClient
{
    /**
     * PSR-3 logger.
     */
    private LoggerInterface $logger;

    /**
     * Hostname
     * @var string
     */
    private string $host;

    /**
     * TCP Port.
     */
    private int $port;

    /**
     * Username
     * @var string
     */
    private string $user;

    /**
     * Password
     * @var string
     */
    private string $pass;

    /**
     * Connection timeout, in seconds.
     * @var int|float
     */
    private int|float $cTimeout;

    /**
     * Connection scheme, like tcp:// or tls://
     */
    private string $scheme;

    /**
     * Event factory.
     */
    private EventFactoryImpl $eventFactory;

    /**
     * Response factory.
     */
    private ResponseFactoryImpl $responseFactory;

    /**
     * R/W timeout, in seconds.
     * @var int
     */
    private int $rTimeout;

    /**
     * Our stream socket resource.
     * @var resource|false|null
     */
    private $socket;

    /**
     * True after a successful login, until close().
     */
    private bool $connected = false;

    /**
     * Our stream context resource.
     * @var resource|null
     */
    private $context;

    /**
     * Our event listeners. Keyed by listener id, each entry is a tuple of
     * [listener, predicate] where listener is an IEventListener|Closure|array
     * and predicate is a Closure|array|null.
     * @var array<string, array{0: IEventListener|\Closure|array, 1: \Closure|array|null}>
     */
    private array $eventListeners = [];

    /**
     * The receiving queue, keyed by ActionID.
     * @var array<string, Response>
     */
    private array $incomingQueue = [];

    /**
     * Our current received message. May be incomplete, will be completed
     * eventually with an EOM.
     */
    private string $currentProcessingMessage = '';

    /**
     * This should not happen. Asterisk may send responses without a
     * corresponding ActionId.
     */
    private ?string $lastActionId = null;

    /**
     * Event mask to apply on login action.
     * @var string|null
     */
    private ?string $eventMask;

    /**
     * The last outgoing message sent, used to resolve responses.
     */
    private ?OutgoingMessage $lastActionClass = null;

    /**
     * Return a formatted string containing scheme, host and port
     *
     * @return string
     */
    private function getSocketUri(): string
    {
        return sprintf('%s%s:%s', $this->scheme, $this->host, $this->port);
    }

    /**
     * Masks the value of sensitive keys (credentials) in a raw AMI message so
     * they are not exposed in debug logs.
     *
     * @param string $message Raw serialized AMI message.
     *
     * @return string
     */
    private function maskSensitive(string $message): string
    {
        return preg_replace(
            '/^((?:Secret|Password|MD5Key|AuthPassword)\s*:\s*).*$/im',
            '$1****',
            (string) $message
        );
    }

    /**
     * Connects a tcp connection to ami.
     *
     * @throws \PAMI\Client\Exception\ClientException
     * @return void
     */
    protected function connect(): void
    {
        $errno = $errstr = null;
        $socketUri = $this->getSocketUri();
        $this->context = stream_context_create();
        $this->socket = @stream_socket_client(
            $socketUri,
            $errno,
            $errstr,
            $this->cTimeout,
            STREAM_CLIENT_CONNECT,
            $this->context
        );
        if ($this->socket === false) {
            throw new ClientException(sprintf('error: "%s" while create socket "%s"', $errstr, $socketUri));
        }
        // set socket in block mode
        if (!stream_set_blocking($this->socket, true)) {
            throw new ClientException(sprintf('error set block mode on "%s" socket', $socketUri));
        }
        // set read timeout on socket
        if (!stream_set_timeout($this->socket, $this->rTimeout)) {
            throw new ClientException(
                sprintf('socket "%s" timeout "%s" set error', $socketUri, $this->rTimeout)
            );
        }
    }

    /**
     * Opens a tcp connection to ami.
     *
     * @throws \PAMI\Client\Exception\ClientException
     * @return void
     */
    public function open(): void
    {
        $this->connect();
        $socketUri = $this->getSocketUri();
        $asteriskId = stream_get_line($this->socket, 1024, Message::EOL);

        if ($asteriskId === false) {
            $lastError = error_get_last();
            throw new ClientException(
                sprintf('error: "%s" while read socket', $lastError['message'] ?? 'unknown error')
            );
        }

        if (strstr($asteriskId, 'Asterisk') === false) {
            throw new ClientException(sprintf('Unknown peer: "%s"', $asteriskId));
        }
        $this->logger->debug(sprintf('recv <-- asteriskId: "%s"', $asteriskId));

        $msg = new LoginAction($this->user, $this->pass, $this->eventMask);
        $response = $this->send($msg);
        if (!$response->isSuccess()) {
            throw new ClientException(
                sprintf('Could not connect to: "%s", response: "%s"', $socketUri, $response->getMessage())
            );
        }
        $this->connected = true;
        $this->logger->info(sprintf('Login to: "%s" by user: "%s"', $socketUri, $this->user));
    }

    /**
     * Registers the given listener so it can receive events. Returns the generated
     * id for this new listener. You can pass in a an IEventListener, a Closure,
     * and an array containing the object and name of the method to invoke. Can specify
     * an optional predicate to invoke before calling the callback.
     *
     * @param IEventListener|\Closure|array $listener
     * @param \Closure|array<string, string>|null $predicate Closure, or map of key => regex.
     *
     * @return string
     */
    public function registerEventListener(IEventListener|\Closure|array $listener, \Closure|array|null $predicate = null): string
    {
        $listenerId = uniqid('PamiListener');
        $this->eventListeners[$listenerId] = [$listener, $predicate];
        return $listenerId;
    }

    /**
     * Unregisters an event listener.
     *
     * @param string $listenerId The id returned by registerEventListener.
     *
     * @return void
     */
    public function unregisterEventListener(string $listenerId): void
    {
        unset($this->eventListeners[$listenerId]);
    }

    /**
     * Reads a complete message over the stream until EOM.
     *
     * @throws ClientException
     * @return string[]
     */
    protected function getMessages(): array
    {
        $msgs = [];
        $read = @fread($this->socket, 8192);
        if ($read === false || (empty($read) && @feof($this->socket))) {
            throw new ClientException('Error reading');
        }
        $this->currentProcessingMessage .= $read;
        // If we have a complete message, then return it. Save the rest for
        // later.
        while (($marker = strpos($this->currentProcessingMessage, Message::EOM)) !== false) {
            $msg = substr($this->currentProcessingMessage, 0, $marker);
            $this->currentProcessingMessage = substr(
                $this->currentProcessingMessage,
                $marker + strlen(Message::EOM)
            );
            $msgs[] = $msg;
        }
        return $msgs;
    }

    /**
     * Main processing loop. Also called from send(), you should call this in
     * your own application in order to continue reading events and responses
     * from ami.
     *
     * @throws ClientException
     * @return void
     */
    public function process(): void
    {
        $msgs = $this->getMessages();
        foreach ($msgs as $aMsg) {
            $this->logger->debug(
                '------ Received: ------ ' . "\n" . $this->maskSensitive($aMsg) . "\n\n"
            );
            $resPos = strpos($aMsg, 'Response:');
            $evePos = strpos($aMsg, 'Event:');
            if (
                ($resPos !== false) &&
                (($resPos < $evePos) || $evePos === false)
            ) {
                $response = $this->messageToResponse($aMsg);
                $actionId = $response->getActionId();
                if ($actionId !== null && $actionId !== '') {
                    $this->incomingQueue[$actionId] = $response;
                }
            } elseif ($evePos !== false) {
                $event = $this->messageToEvent($aMsg);
                $response = $this->findResponse($event);
                if (!($response instanceof Response) || $response->isComplete()) {
                    $this->dispatch($event);
                } else {
                    $response->addEvent($event);
                }
            } else {
                // broken ami.. sending a response with events without
                // Event and ActionId
                $bMsg = 'Event: ResponseEvent' . "\r\n";
                $bMsg .= 'ActionId: ' . ($this->lastActionId ?? '') . "\r\n" . $aMsg;
                $event = $this->messageToEvent($bMsg);
                $response = $this->findResponse($event);
                if ($response instanceof Response) {
                    $response->addEvent($event);
                }
            }
            $this->logger->debug('----------------');
        }
    }

    /**
     * Tries to find an associated response for the given message.
     *
     * @param IncomingMessage $message Message sent by asterisk.
     *
     * @return Response|false
     */
    protected function findResponse(IncomingMessage $message): Response|false
    {
        $actionId = $message->getActionId();
        if ($actionId !== null && $actionId !== '' && isset($this->incomingQueue[$actionId])) {
            return $this->incomingQueue[$actionId];
        }
        return false;
    }

    /**
     * Dispatches the incoming message to a handler.
     *
     * @param EventMessage $message Message to dispatch.
     *
     * @return void
     */
    protected function dispatch(EventMessage $message): void
    {
        foreach ($this->eventListeners as $data) {
            $listener = $data[0];
            $predicate = $data[1];

            if (!$this->evaluatePredicate($predicate, $message)) {
                continue;
            }

            if ($listener instanceof \Closure) {
                $listener($message);
            } elseif (is_array($listener)) {
                $listener($message);
            } else {
                $listener->handle($message);
            }
        }
    }

    /**
     * Evaluate a predicate for a message.
     *
     * @param \Closure|array<string, string>|null $predicate A closure or a map of key => regex.
     * @param IncomingMessage $message Message to compare.
     *
     * @return bool
     */
    protected function evaluatePredicate(\Closure|array|null $predicate, IncomingMessage $message): bool
    {
        if (is_callable($predicate)) {
            // preg_match() and similar predicates return int; coerce under strict_types.
            return (bool) $predicate($message);
        }

        if (!is_array($predicate)) {
            return true;
        }

        foreach ($predicate as $key => $value) {
            if (!preg_match($value, (string) ($message->getKey($key) ?? ''))) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns a Response from a raw string that came from asterisk.
     *
     * @param string $msg Raw string.
     *
     * @return Response
     */
    private function messageToResponse(string $msg): Response
    {
        $response = $this->responseFactory->createFromRaw($msg, $this->lastActionClass);
        if (is_null($response->getActionId()) && $this->lastActionId !== null && $this->lastActionId !== '') {
            $response->setActionId($this->lastActionId);
        }
        return $response;
    }

    /**
     * Returns a EventMessage from a raw string that came from asterisk.
     *
     * @param string $msg Raw string.
     *
     * @return EventMessage
     */
    private function messageToEvent(string $msg): EventMessage
    {
        return $this->eventFactory->createFromRaw($msg);
    }

    /**
     * Returns a message (response) related to the given message. This uses
     * the ActionID tag (key).
     *
     * @todo not suitable for multithreaded applications.
     *
     * @param OutgoingMessage $message
     *
     * @return Response|false
     */
    protected function getRelated(OutgoingMessage $message): Response|false
    {
        $ret = false;
        $id = $message->getActionID();
        if ($id !== null && $id !== '' && isset($this->incomingQueue[$id])) {
            $response = $this->incomingQueue[$id];
            if ($response->isComplete()) {
                unset($this->incomingQueue[$id]);
                $ret = $response;
            }
        }
        return $ret;
    }

    /**
     * Sends a message to ami.
     *
     * @param OutgoingMessage $message Message to send.
     *
     * @throws ClientException
     * @return Response
     */
    public function send(OutgoingMessage $message): Response
    {
        $messageToSend = $message->serialize();
        $length = strlen($messageToSend);
        $this->logger->debug(
            '------ Sending: ------ ' . "\n" . $this->maskSensitive($messageToSend) . '----------'
        );
        $this->lastActionId = $message->getActionId();
        $this->lastActionClass = $message;
        $written = 0;
        while ($written < $length) {
            $result = @fwrite($this->socket, substr($messageToSend, $written));
            if ($result === false || $result === 0) {
                throw new ClientException('Could not send message');
            }
            $written += $result;
        }
        $waituntil = time() + $this->rTimeout;
        while (time() <= $waituntil) {
            stream_set_timeout($this->socket, $this->rTimeout);
            $this->process();
            $info = stream_get_meta_data($this->socket);
            if ($info['timed_out']) {
                break;
            }
            $response = $this->getRelated($message);
            if ($response !== false) {
                $this->lastActionId = null;
                return $response;
            }
        }
        $actionId = $message->getActionId();
        if ($actionId !== null && $actionId !== '') {
            unset($this->incomingQueue[$actionId]);
        }
        throw new ClientException('Read timeout');
    }

    /**
     * Closes the connection to ami.
     *
     * @return void
     */
    public function close(): void
    {
        $this->logger->debug('Closing connection to asterisk.');
        if ($this->connected) {
            try {
                $this->send(new LogoffAction());
            } catch (\Throwable $e) {
                $this->logger->debug('Best-effort logoff failed: ' . $e->getMessage());
            }
        }
        if (is_resource($this->socket)) {
            fclose($this->socket);
        }
        $this->socket = null;
        $this->connected = false;
    }

    /**
     * Sets the logger implementation.
     *
     * @param LoggerInterface $logger The PSR3-Logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * Get the logger implementation.
     *
     * @return LoggerInterface The current PSR3-Logger instance
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Returns stream socket.
     *
     * @return resource|false|null
     */
    public function getSocket(): mixed
    {
        return $this->socket;
    }

    /**
     * Constructor.
     *
     * @param array{host: string, port: int|string, username: string, secret: string, connect_timeout: int|float, read_timeout?: int, scheme?: string, event_mask?: string} $options
     */
    public function __construct(array $options)
    {
        foreach (['host', 'port', 'username', 'secret', 'connect_timeout'] as $required) {
            if (!array_key_exists($required, $options)) {
                throw new ClientException(sprintf('Missing required option "%s"', $required));
            }
        }
        $this->logger = new NullLogger();
        $this->host = $options['host'];
        $this->port = (int) $options['port'];
        $this->user = $options['username'];
        $this->pass = $options['secret'];
        $this->cTimeout = $options['connect_timeout'];
        $this->rTimeout = $options['read_timeout'] ?? 1;
        $this->scheme = $options['scheme'] ?? 'tcp://';
        $this->eventMask = $options['event_mask'] ?? null;
        $this->eventFactory = new EventFactoryImpl();
        $this->responseFactory = new ResponseFactoryImpl();
    }
}
