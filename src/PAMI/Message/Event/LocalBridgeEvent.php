<?php

/**
 * LocalBridge Event
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

declare(strict_types=1);

namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * LocalBridge Event
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
class LocalBridgeEvent extends EventMessage
{
    /**
     * get LocalOneChannel
     *
     * Returns key: 'LocalOneChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneChannel()
    {
        return $this->getKey('LocalOneChannel');
    }

    /**
     * get LocalOneChannelState
     *
     * Returns:A numeric code for the channel's current state, related to LocalOneChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneChannelState()
    {
        return $this->getKey('LocalOneChannelState');
    }

    /**
     * get LocalOneChannelStateDesc
     *
     * Returns key: 'LocalOneChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneChannelStateDesc()
    {
        return $this->getKey('LocalOneChannelStateDesc');
    }

    /**
     * get LocalOneCallerIDNum
     *
     * Returns key: 'LocalOneCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneCallerIDNum()
    {
        return $this->getKey('LocalOneCallerIDNum');
    }

    /**
     * get LocalOneCallerIDName
     *
     * Returns key: 'LocalOneCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneCallerIDName()
    {
        return $this->getKey('LocalOneCallerIDName');
    }

    /**
     * get LocalOneConnectedLineNum
     *
     * Returns key: 'LocalOneConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneConnectedLineNum()
    {
        return $this->getKey('LocalOneConnectedLineNum');
    }

    /**
     * get LocalOneConnectedLineName
     *
     * Returns key: 'LocalOneConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneConnectedLineName()
    {
        return $this->getKey('LocalOneConnectedLineName');
    }

    /**
     * get LocalOneLanguage
     *
     * Returns key: 'LocalOneLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneLanguage()
    {
        return $this->getKey('LocalOneLanguage');
    }

    /**
     * get LocalOneAccountCode
     *
     * Returns key: 'LocalOneAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneAccountCode()
    {
        return $this->getKey('LocalOneAccountCode');
    }

    /**
     * get LocalOneContext
     *
     * Returns key: 'LocalOneContext'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneContext()
    {
        return $this->getKey('LocalOneContext');
    }

    /**
     * get LocalOneExten
     *
     * Returns key: 'LocalOneExten'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneExten()
    {
        return $this->getKey('LocalOneExten');
    }

    /**
     * get LocalOnePriority
     *
     * Returns key: 'LocalOnePriority'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOnePriority()
    {
        return $this->getKey('LocalOnePriority');
    }

    /**
     * get LocalOneUniqueid
     *
     * Returns key: 'LocalOneUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneUniqueid()
    {
        return $this->getKey('LocalOneUniqueid');
    }

    /**
     * get LocalOneLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneLinkedid()
    {
        return $this->getKey('LocalOneLinkedid');
    }

    /**
     * get LocalTwoChannel
     *
     * Returns key: 'LocalTwoChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoChannel()
    {
        return $this->getKey('LocalTwoChannel');
    }

    /**
     * get LocalTwoChannelState
     *
     * Returns:A numeric code for the channel's current state, related to LocalTwoChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoChannelState()
    {
        return $this->getKey('LocalTwoChannelState');
    }

    /**
     * get LocalTwoChannelStateDesc
     *
     * Returns key: 'LocalTwoChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoChannelStateDesc()
    {
        return $this->getKey('LocalTwoChannelStateDesc');
    }

    /**
     * get LocalTwoCallerIDNum
     *
     * Returns key: 'LocalTwoCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoCallerIDNum()
    {
        return $this->getKey('LocalTwoCallerIDNum');
    }

    /**
     * get LocalTwoCallerIDName
     *
     * Returns key: 'LocalTwoCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoCallerIDName()
    {
        return $this->getKey('LocalTwoCallerIDName');
    }

    /**
     * get LocalTwoConnectedLineNum
     *
     * Returns key: 'LocalTwoConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoConnectedLineNum()
    {
        return $this->getKey('LocalTwoConnectedLineNum');
    }

    /**
     * get LocalTwoConnectedLineName
     *
     * Returns key: 'LocalTwoConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoConnectedLineName()
    {
        return $this->getKey('LocalTwoConnectedLineName');
    }

    /**
     * get LocalTwoLanguage
     *
     * Returns key: 'LocalTwoLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoLanguage()
    {
        return $this->getKey('LocalTwoLanguage');
    }

    /**
     * get LocalTwoAccountCode
     *
     * Returns key: 'LocalTwoAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoAccountCode()
    {
        return $this->getKey('LocalTwoAccountCode');
    }

    /**
     * get LocalTwoContext
     *
     * Returns key: 'LocalTwoContext'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoContext()
    {
        return $this->getKey('LocalTwoContext');
    }

    /**
     * get LocalTwoExten
     *
     * Returns key: 'LocalTwoExten'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoExten()
    {
        return $this->getKey('LocalTwoExten');
    }

    /**
     * get LocalTwoPriority
     *
     * Returns key: 'LocalTwoPriority'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoPriority()
    {
        return $this->getKey('LocalTwoPriority');
    }

    /**
     * get LocalTwoUniqueid
     *
     * Returns key: 'LocalTwoUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoUniqueid()
    {
        return $this->getKey('LocalTwoUniqueid');
    }

    /**
     * get LocalTwoLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoLinkedid()
    {
        return $this->getKey('LocalTwoLinkedid');
    }

    /**
     * get Context
     *
     * Returns:The context in the dialplan that Channel2 starts in.
     *
     * @return string|int|float|bool|null
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * get Exten
     *
     * Returns:The extension in the dialplan that Channel2 starts in.
     *
     * @return string|int|float|bool|null
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * get LocalOptimization
     *
     * Returns key: 'LocalOptimization'
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOptimization()
    {
        return $this->getKey('LocalOptimization');
    }
}
