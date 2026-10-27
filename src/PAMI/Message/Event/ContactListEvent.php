<?php

/**
 * ContactList Event
 * isListEntry and Part Action: PJSIPShowContacts
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

declare(strict_types=1);

namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * ContactList Event
 * isListEntry and Part Action: PJSIPShowContacts
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
class ContactListEvent extends EventMessage
{
    /**
     * get ObjectType
     *
     * Returns:The object's type. This will always be 'contact'.
     *
     * @return string|int|float|bool|null
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
    }

    /**
     * get ObjectName
     *
     * Returns:The name of this object.
     *
     * @return string|int|float|bool|null
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * get ViaAddr
     *
     * Returns:IP address of the last Via header in REGISTER request. Will only appear in the event if available.
     *
     * @return string|int|float|bool|null
     */
    public function getViaAddr()
    {
        return $this->getKey('ViaAddr');
    }

    /**
     * get ViaPort
     *
     * Returns:Port number of the last Via header in REGISTER request. Will only appear in the event if available.
     *
     * @return string|int|float|bool|null
     */
    public function getViaPort()
    {
        return $this->getKey('ViaPort');
    }

    /**
     * get QualifyTimeout
     *
     * Returns:The elapsed time in decimal seconds after which an OPTIONS message is sent before the contact is considered unavailable.
     *
     * @return string|int|float|bool|null
     */
    public function getQualifyTimeout()
    {
        return $this->getKey('QualifyTimeout');
    }

    /**
     * get CallId
     *
     * Returns:Content of the Call-ID header in REGISTER request. Will only appear in the event if available.
     *
     * @return string|int|float|bool|null
     */
    public function getCallId()
    {
        return $this->getKey('CallId');
    }

    /**
     * get RegServer
     *
     * Returns:Asterisk Server name.
     *
     * @return string|int|float|bool|null
     */
    public function getRegServer()
    {
        return $this->getKey('RegServer');
    }

    /**
     * get PruneOnBoot
     *
     * Returns:If true delete the contact on Asterisk restart/boot.
     *
     * @return string|int|float|bool|null
     */
    public function getPruneOnBoot()
    {
        return $this->getKey('PruneOnBoot');
    }

    /**
     * get Path
     *
     * Returns:The Path header received on the REGISTER.
     *
     * @return string|int|float|bool|null
     */
    public function getPath()
    {
        return $this->getKey('Path');
    }

    /**
     * get Endpoint
     *
     * Returns:The name of the endpoint associated with this information.
     *
     * @return string|int|float|bool|null
     */
    public function getEndpoint()
    {
        return $this->getKey('Endpoint');
    }

    /**
     * get AuthenticateQualify
     *
     * Returns:A boolean indicating whether a qualify should be authenticated.
     *
     * @return string|int|float|bool|null
     */
    public function getAuthenticateQualify()
    {
        return $this->getKey('AuthenticateQualify');
    }

    /**
     * get Uri
     *
     * Returns:This contact's URI.
     *
     * @return string|int|float|bool|null
     */
    public function getUri()
    {
        return $this->getKey('Uri');
    }

    /**
     * get QualifyFrequency
     *
     * Returns:The interval in seconds at which the contact will be qualified.
     *
     * @return string|int|float|bool|null
     */
    public function getQualifyFrequency()
    {
        return $this->getKey('QualifyFrequency');
    }

    /**
     * get UserAgent
     *
     * Returns:Content of the User-Agent header in REGISTER request
     *
     * @return string|int|float|bool|null
     */
    public function getUserAgent()
    {
        return $this->getKey('UserAgent');
    }

    /**
     * get ExpirationTime
     *
     * Returns:Absolute time that this contact is no longer valid after
     *
     * @return string|int|float|bool|null
     */
    public function getExpirationTime()
    {
        return $this->getKey('ExpirationTime');
    }

    /**
     * get OutboundProxy
     *
     * Returns:The contact's outbound proxy.
     *
     * @return string|int|float|bool|null
     */
    public function getOutboundProxy()
    {
        return $this->getKey('OutboundProxy');
    }

    /**
     * get Status
     *
     * Returns:This contact's status.
     *
     * @return string|int|float|bool|null
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * get RoundtripUsec
     *
     * Returns:The round trip time in microseconds.
     *
     * @return string|int|float|bool|null
     */
    public function getRoundtripUsec()
    {
        return $this->getKey('RoundtripUsec');
    }
}
