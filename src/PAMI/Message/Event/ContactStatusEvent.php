<?php
/**
 * ContactStatus Event
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
 * @version    SVN: $Id$
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
 * ContactStatus Event
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
class ContactStatusEvent extends EventMessage
{
    /**
     * get URI
     *
     * Returns:This contact's URI.
     *
     * @return string
     */
    public function getURI()
    {
        return $this->getKey('URI');
    }

    /**
     * get ContactStatus
     *
     * Returns:New status of the contact.
     *
     * @return string
     */
    public function getContactStatus()
    {
        return $this->getKey('ContactStatus');
    }

    /**
     * get AOR
     *
     * Returns:The name of the associated aor.
     *
     * @return string
     */
    public function getAOR()
    {
        return $this->getKey('AOR');
    }

    /**
     * get EndpointName
     *
     * Returns:The name of the associated endpoint.
     *
     * @return string
     */
    public function getEndpointName()
    {
        return $this->getKey('EndpointName');
    }

    /**
     * get RoundtripUsec
     *
     * Returns:The RTT measured during the last qualify.
     *
     * @return string
     */
    public function getRoundtripUsec()
    {
        return $this->getKey('RoundtripUsec');
    }
}
