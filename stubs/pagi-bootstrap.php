<?php

/**
 * Stand-ins for marcelog/pagi, which is suggested rather than required.
 * Loaded only for static analysis. Skipped when the real classes are present.
 */

namespace PAGI\Client;

if (!interface_exists(IClient::class, false)) {
    interface IClient
    {
    }
}

if (!class_exists(AbstractClient::class, false)) {
    abstract class AbstractClient implements IClient
    {
        /** @var \Psr\Log\LoggerInterface */
        protected $logger;

        /** @var array<string, string> */
        protected $variables = [];

        /**
         * @param string $text
         * @return mixed
         */
        abstract protected function send($text);

        abstract protected function open();

        abstract protected function close();

        /**
         * @param string $text
         * @return mixed
         */
        protected function getResultFromResultString($text)
        {
        }

        protected function readEnvironmentVariable(string $text): void
        {
        }

        protected function isEndOfEnvironmentVariables(string $line): bool
        {
            return false;
        }
    }
}

namespace PAGI\Application;

if (!class_exists(PAGIApplication::class, false)) {
    abstract class PAGIApplication
    {
    }
}

namespace PAGI\Exception;

if (!class_exists(ChannelDownException::class, false)) {
    class ChannelDownException extends \Exception
    {
    }
}

if (!class_exists(InvalidCommandException::class, false)) {
    class InvalidCommandException extends \Exception
    {
    }
}
