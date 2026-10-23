<?php
/**
 * Event from PJSIPShowEndpoints
 * Provide details about a device/endpoint/contact's status.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Niklas Larsson <niklas@tese.se>, Marcelo Gornstein <marcelog@gmail.com>
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
 * Event from PJSIPShowEndpoints
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class EndpointListEvent extends EventMessage
{
    /**
     * The object's type. This will always be 'endpoint'.
     *
     * @return string key: 'ObjectType'
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
    }

    /**
     * The name of this object.
     *
     * @return string key: 'ObjectName'.
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * The transport configurations associated with this endpoint.
     *
     * @return string key: 'Transport'.
     */
    public function getTransport()
    {
        return $this->getKey('Transport');
    }

    /**
     * The aor configurations associated with this endpoint.
     *
     * @return string key: 'Aor'.
     */
    public function getAor()
    {
        return $this->getKey('Aor');
    }

    /**
     * The inbound authentication configurations associated with this endpoint.
     *
     * @return string key: 'Auths'.
     */
    public function getAuths()
    {
        return $this->getKey('Auths');
    }

    /**
     * The outbound authentication configurations associated with this endpoint.
     *
     * @return string key: 'OutboundAuths'.
     */
    public function getOutboundAuths()
    {
        return $this->getKey('OutboundAuths');
    }

    /**
     * Returns key: 'Contacts'.
     *
     * @return string
     */
    public function getContacts()
    {
        return $this->getKey('Contacts');
    }

    /**
     * The aggregate device state for this endpoint.
     *
     * @return string key: 'DeviceState'.
     */
    public function getDeviceState()
    {
        return $this->getKey('DeviceState');
    }

    /**
     * The number of active channels associated with this endpoint.
     *
     * @return integer for key: 'ActiveChannels'.
     */
    public function getActiveChannels()
    {
        return intval($this->getKey('ActiveChannels'));
    }
}
