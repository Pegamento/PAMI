<?php

/**
 * ChanSpyStart Event
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
 * ChanSpyStart Event
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
class ChanSpyStartEvent extends EventMessage
{
    /**
     * get SpyerChannel
     *
     * Returns key: 'SpyerChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerChannel()
    {
        return $this->getKey('SpyerChannel');
    }

    /**
     * get SpyerChannelState
     *
     * Returns:A numeric code for the channel's current state, related to SpyerChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerChannelState()
    {
        return $this->getKey('SpyerChannelState');
    }

    /**
     * get SpyerChannelStateDesc
     *
     * Returns key: 'SpyerChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerChannelStateDesc()
    {
        return $this->getKey('SpyerChannelStateDesc');
    }

    /**
     * get SpyerCallerIDNum
     *
     * Returns key: 'SpyerCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerCallerIDNum()
    {
        return $this->getKey('SpyerCallerIDNum');
    }

    /**
     * get SpyerCallerIDName
     *
     * Returns key: 'SpyerCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerCallerIDName()
    {
        return $this->getKey('SpyerCallerIDName');
    }

    /**
     * get SpyerConnectedLineNum
     *
     * Returns key: 'SpyerConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerConnectedLineNum()
    {
        return $this->getKey('SpyerConnectedLineNum');
    }

    /**
     * get SpyerConnectedLineName
     *
     * Returns key: 'SpyerConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerConnectedLineName()
    {
        return $this->getKey('SpyerConnectedLineName');
    }

    /**
     * get SpyerLanguage
     *
     * Returns key: 'SpyerLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerLanguage()
    {
        return $this->getKey('SpyerLanguage');
    }

    /**
     * get SpyerAccountCode
     *
     * Returns key: 'SpyerAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerAccountCode()
    {
        return $this->getKey('SpyerAccountCode');
    }

    /**
     * get SpyerContext
     *
     * Returns key: 'SpyerContext'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerContext()
    {
        return $this->getKey('SpyerContext');
    }

    /**
     * get SpyerExten
     *
     * Returns key: 'SpyerExten'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerExten()
    {
        return $this->getKey('SpyerExten');
    }

    /**
     * get SpyerPriority
     *
     * Returns key: 'SpyerPriority'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerPriority()
    {
        return $this->getKey('SpyerPriority');
    }

    /**
     * get SpyerUniqueid
     *
     * Returns key: 'SpyerUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerUniqueid()
    {
        return $this->getKey('SpyerUniqueid');
    }

    /**
     * get SpyerLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getSpyerLinkedid()
    {
        return $this->getKey('SpyerLinkedid');
    }

    /**
     * get SpyeeChannel
     *
     * Returns key: 'SpyeeChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeChannel()
    {
        return $this->getKey('SpyeeChannel');
    }

    /**
     * get SpyeeChannelState
     *
     * Returns:A numeric code for the channel's current state, related to SpyeeChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeChannelState()
    {
        return $this->getKey('SpyeeChannelState');
    }

    /**
     * get SpyeeChannelStateDesc
     *
     * Returns key: 'SpyeeChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeChannelStateDesc()
    {
        return $this->getKey('SpyeeChannelStateDesc');
    }

    /**
     * get SpyeeCallerIDNum
     *
     * Returns key: 'SpyeeCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeCallerIDNum()
    {
        return $this->getKey('SpyeeCallerIDNum');
    }

    /**
     * get SpyeeCallerIDName
     *
     * Returns key: 'SpyeeCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeCallerIDName()
    {
        return $this->getKey('SpyeeCallerIDName');
    }

    /**
     * get SpyeeConnectedLineNum
     *
     * Returns key: 'SpyeeConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeConnectedLineNum()
    {
        return $this->getKey('SpyeeConnectedLineNum');
    }

    /**
     * get SpyeeConnectedLineName
     *
     * Returns key: 'SpyeeConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeConnectedLineName()
    {
        return $this->getKey('SpyeeConnectedLineName');
    }

    /**
     * get SpyeeLanguage
     *
     * Returns key: 'SpyeeLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeLanguage()
    {
        return $this->getKey('SpyeeLanguage');
    }

    /**
     * get SpyeeAccountCode
     *
     * Returns key: 'SpyeeAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeAccountCode()
    {
        return $this->getKey('SpyeeAccountCode');
    }

    /**
     * get SpyeeContext
     *
     * Returns key: 'SpyeeContext'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeContext()
    {
        return $this->getKey('SpyeeContext');
    }

    /**
     * get SpyeeExten
     *
     * Returns key: 'SpyeeExten'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeExten()
    {
        return $this->getKey('SpyeeExten');
    }

    /**
     * get SpyeePriority
     *
     * Returns key: 'SpyeePriority'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeePriority()
    {
        return $this->getKey('SpyeePriority');
    }

    /**
     * get SpyeeUniqueid
     *
     * Returns key: 'SpyeeUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeUniqueid()
    {
        return $this->getKey('SpyeeUniqueid');
    }

    /**
     * get SpyeeLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getSpyeeLinkedid()
    {
        return $this->getKey('SpyeeLinkedid');
    }
}
