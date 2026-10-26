<?php

/**
 * A generic outgoing message.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  Message
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

namespace PAMI\Message;

use PAMI\Exception\PAMIException;

/**
 * A generic outgoing message.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class OutgoingMessage extends Message
{
    /**
     * Fully qualified class name of the Response that handles replies to this message.
     *
     * @var class-string<\PAMI\Message\Response\Response>|null
     */
    private ?string $responseHandler = null;

    /**
     * Returns the class name of the response handler.
     *
     * @return string|null
     */
    public function getResponseHandler(): ?string
    {
        return $this->responseHandler;
    }

    /**
     * Set the response handler.
     *
     * @param string $newResponseHandler Short handler name, e.g. "Command" for CommandResponse.
     *
     * @return void
     * @throws PAMIException
     */
    public function setResponseHandler(string $newResponseHandler): void
    {
        $className = '\\PAMI\\Message\\Response\\' . $newResponseHandler . 'Response';
        if (class_exists($className, true) && is_a($className, '\PAMI\Message\Response\Response', true)) {
            $this->responseHandler = $className;
            return;
        }

        throw new PAMIException('ResponseHandler ' . $className . ' could not be found. Please provide a valid class name.');
    }

    /**
     * Adds a variable to this message.
     *
     * @param string $key   Variable name.
     * @param string|array $value Variable value. Arrays are repeated values.
     *
     * @return void
     * @throws PAMIException When the key or value would break the AMI frame.
     */
    public function setVariable(string $key, string|int|float|bool|array|null $value): void
    {
        $this->rejectUnsafeAmiText($key, true);
        $this->rejectUnsafeAmiText($value, false);
        parent::setVariable($key, $value);
    }

    /**
     * Adds a key to this message.
     *
     * @param string $key   Key name (i.e: Action).
     * @param string $value Key value.
     *
     * @return void
     * @throws PAMIException When the key or value would break the AMI frame.
     */
    protected function setKey(string $key, string $value): void
    {
        $this->rejectUnsafeAmiText($key, true);
        $this->rejectUnsafeAmiText($value, false);
        parent::setKey($key, $value);
    }

    /**
     * Appends another value for a key.
     *
     * @param string $key   Key name (i.e: Output).
     * @param string $value Value to append.
     *
     * @return void
     * @throws PAMIException When the key or value would break the AMI frame.
     */
    protected function addKey(string $key, string $value): void
    {
        $this->rejectUnsafeAmiText($key, true);
        $this->rejectUnsafeAmiText($value, false);
        parent::addKey($key, $value);
    }

    /**
     * Reject CR/LF in outgoing keys and values, and colons in keys.
     *
     * Incoming messages never go through OutgoingMessage, so parsing is unaffected.
     *
     * @param mixed $text  Key, value, or list of values.
     * @param bool  $isKey True when $text is a key name.
     *
     * @return void
     * @throws PAMIException
     */
    private function rejectUnsafeAmiText($text, bool $isKey): void
    {
        if (is_array($text)) {
            foreach ($text as $item) {
                $this->rejectUnsafeAmiText($item, false);
            }
            return;
        }

        $text = (string) $text;
        if (strpbrk($text, "\r\n") !== false || ($isKey && str_contains($text, ':'))) {
            throw new PAMIException(
                'CR, LF or a colon in an outgoing AMI key, or CR/LF in a value, is not allowed.'
            );
        }
    }
}
