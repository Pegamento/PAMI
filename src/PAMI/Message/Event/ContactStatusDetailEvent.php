<?php
/**
 * Event from PJSIPShowEndpoint
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
 * Event from PJSIPShowEndpoint
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
class ContactStatusDetailEvent extends EventMessage
{
    /**
     * Returns key: 'ObjectType'.
     *
     * @return string
     */
    public function getObjectType()
    {
        return 'contactstatus';
    }

    /**
     * Returns key: 'AOR'. The AoR that owns this contact.
     *
     * @return string
     */
    public function getAOR()
    {
        return $this->getKey('AOR');
    }

    /**
     * Returns key: 'URI'. This contact's URI.
     *
     * @return string
     */
    public function getURI()
    {
        return $this->getKey('URI');
    }

    /**
     * Returns key: 'Status'. This contact's status. Reachable Unreachable
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'RoundtripUsec'. The round trip time in microseconds.
     *
     * @return string
     */
    public function getRoundtripUsec()
    {
        return $this->getKey('RoundtripUsec');
    }

    /**
     * Returns key: 'EndpointName'. The name of the endpoint associated with this information.
     *
     * @return string
     */
    public function getEndpointName()
    {
        return $this->getKey('EndpointName');
    }
}
