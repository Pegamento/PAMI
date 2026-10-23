<?php
/**
 * RequestNotSupported Event
 *
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Diederik de Groot <ddegroot@gmail.com>
 * @license    http://github.com/chan-sccp/PAMI/LICENSE
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
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * RequestNotSupported Event
 *
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@gmail.com>
 * @license    http://chan-sccp.github.com/PAMI/ Apache License 2.0
 * @link       http://github.com/chan-sccp/PAMI/
 */
class RequestNotSupportedEvent extends EventMessage
{
    /**
     * get EventTV
     *
     * Returns:The time the event was detected.
     *
     * @return string
     */
    public function getEventTV()
    {
        return $this->getKey('EventTV');
    }

    /**
     * get Severity
     *
     * Returns:A relative severity of the security event.
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->getKey('Severity');
    }

    /**
     * get Service
     *
     * Returns:The Asterisk service that raised the security event.
     *
     * @return string
     */
    public function getService()
    {
        return $this->getKey('Service');
    }

    /**
     * get EventVersion
     *
     * Returns:The version of this event.
     *
     * @return string
     */
    public function getEventVersion()
    {
        return $this->getKey('EventVersion');
    }

    /**
     * get AccountID
     *
     * Returns:The Service account associated with the security event notification.
     *
     * @return string
     */
    public function getAccountID()
    {
        return $this->getKey('AccountID');
    }

    /**
     * get SessionID
     *
     * Returns:A unique identifier for the session in the service that raised the event.
     *
     * @return string
     */
    public function getSessionID()
    {
        return $this->getKey('SessionID');
    }

    /**
     * get LocalAddress
     *
     * Returns:The address of the Asterisk service that raised the security event.
     *
     * @return string
     */
    public function getLocalAddress()
    {
        return $this->getKey('LocalAddress');
    }

    /**
     * get RemoteAddress
     *
     * Returns:The remote address of the entity that caused the security event to be raised.
     *
     * @return string
     */
    public function getRemoteAddress()
    {
        return $this->getKey('RemoteAddress');
    }

    /**
     * get RequestType
     *
     * Returns:The type of request attempted.
     *
     * @return string
     */
    public function getRequestType()
    {
        return $this->getKey('RequestType');
    }

    /**
     * get Module
     *
     * Returns:If available, the name of the module that raised the event.
     *
     * @return string
     */
    public function getModule()
    {
        return $this->getKey('Module');
    }

    /**
     * get SessionTV
     *
     * Returns:The timestamp reported by the session.
     *
     * @return string
     */
    public function getSessionTV()
    {
        return $this->getKey('SessionTV');
    }
}
