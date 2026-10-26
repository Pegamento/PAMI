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
    public function getResponseHandler()
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
    public function setResponseHandler($newResponseHandler)
    {
        $className = '\\PAMI\\Message\\Response\\' . $newResponseHandler . 'Response';
        if (class_exists($className, true) && is_a($className, '\PAMI\Message\Response\Response', true)) {
            $this->responseHandler = $className;
            return;
        }

        throw new PAMIException('ResponseHandler '.$className.' could not be found. Please provide a valid class name.');
    }
}
