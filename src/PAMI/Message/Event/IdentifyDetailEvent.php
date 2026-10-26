<?php

/**
 * IdentifyDetail Event
 * isListEntry and Part Action: PJSIPShowEndpoint
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
 * IdentifyDetail Event
 * isListEntry and Part Action: PJSIPShowEndpoint
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
class IdentifyDetailEvent extends EventMessage
{
    /**
     * get ObjectType
     *
     * Returns:The object's type. This will always be 'identify'.
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
     * get Endpoint
     *
     * Returns:Name of endpoint identified
     *
     * @return string|int|float|bool|null
     */
    public function getEndpoint()
    {
        return $this->getKey('Endpoint');
    }

    /**
     * get SrvLookups
     *
     * Returns:Perform SRV lookups for provided hostnames.
     *
     * @return string|int|float|bool|null
     */
    public function getSrvLookups()
    {
        return $this->getKey('SrvLookups');
    }

    /**
     * get Match
     *
     * Returns:IP addresses or networks to match against.
     *
     * @return string|int|float|bool|null
     */
    public function getMatch()
    {
        return $this->getKey('Match');
    }

    /**
     * get MatchHeader
     *
     * Returns:Header/value pair to match against.
     *
     * @return string|int|float|bool|null
     */
    public function getMatchHeader()
    {
        return $this->getKey('MatchHeader');
    }

    /**
     * get EndpointName
     *
     * Returns:The name of the endpoint associated with this information.
     *
     * @return string|int|float|bool|null
     */
    public function getEndpointName()
    {
        return $this->getKey('EndpointName');
    }
}
