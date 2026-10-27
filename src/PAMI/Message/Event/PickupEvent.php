<?php

/**
 * Pickup Event
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
 * Pickup Event
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
class PickupEvent extends EventMessage
{
    /**
     * get Channel
     *
     * Returns key: 'Channel'
     *
     * @return string|int|float|bool|null
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * get ChannelState
     *
     * Returns:A numeric code for the channel's current state, related to ChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getChannelState()
    {
        return $this->getKey('ChannelState');
    }

    /**
     * get ChannelStateDesc
     *
     * Returns key: 'ChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getChannelStateDesc()
    {
        return $this->getKey('ChannelStateDesc');
    }

    /**
     * get CallerIDNum
     *
     * Returns key: 'CallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDNum()
    {
        return $this->getKey('CallerIDNum');
    }

    /**
     * get CallerIDName
     *
     * Returns key: 'CallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDName()
    {
        return $this->getKey('CallerIDName');
    }

    /**
     * get ConnectedLineNum
     *
     * Returns key: 'ConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getConnectedLineNum()
    {
        return $this->getKey('ConnectedLineNum');
    }

    /**
     * get ConnectedLineName
     *
     * Returns key: 'ConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getConnectedLineName()
    {
        return $this->getKey('ConnectedLineName');
    }

    /**
     * get Language
     *
     * Returns key: 'Language'
     *
     * @return string|int|float|bool|null
     */
    public function getLanguage()
    {
        return $this->getKey('Language');
    }

    /**
     * get AccountCode
     *
     * Returns key: 'AccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * get Context
     *
     * Returns key: 'Context'
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
     * Returns key: 'Exten'
     *
     * @return string|int|float|bool|null
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * get Priority
     *
     * Returns key: 'Priority'
     *
     * @return string|int|float|bool|null
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
    }

    /**
     * get Uniqueid
     *
     * Returns key: 'Uniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getUniqueid()
    {
        return $this->getKey('Uniqueid');
    }

    /**
     * get Linkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getLinkedid()
    {
        return $this->getKey('Linkedid');
    }

    /**
     * get TargetChannel
     *
     * Returns key: 'TargetChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetChannel()
    {
        return $this->getKey('TargetChannel');
    }

    /**
     * get TargetChannelState
     *
     * Returns:A numeric code for the channel's current state, related to TargetChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getTargetChannelState()
    {
        return $this->getKey('TargetChannelState');
    }

    /**
     * get TargetChannelStateDesc
     *
     * Returns key: 'TargetChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetChannelStateDesc()
    {
        return $this->getKey('TargetChannelStateDesc');
    }

    /**
     * get TargetCallerIDNum
     *
     * Returns key: 'TargetCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetCallerIDNum()
    {
        return $this->getKey('TargetCallerIDNum');
    }

    /**
     * get TargetCallerIDName
     *
     * Returns key: 'TargetCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetCallerIDName()
    {
        return $this->getKey('TargetCallerIDName');
    }

    /**
     * get TargetConnectedLineNum
     *
     * Returns key: 'TargetConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetConnectedLineNum()
    {
        return $this->getKey('TargetConnectedLineNum');
    }

    /**
     * get TargetConnectedLineName
     *
     * Returns key: 'TargetConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetConnectedLineName()
    {
        return $this->getKey('TargetConnectedLineName');
    }

    /**
     * get TargetLanguage
     *
     * Returns key: 'TargetLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetLanguage()
    {
        return $this->getKey('TargetLanguage');
    }

    /**
     * get TargetAccountCode
     *
     * Returns key: 'TargetAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetAccountCode()
    {
        return $this->getKey('TargetAccountCode');
    }

    /**
     * get TargetContext
     *
     * Returns key: 'TargetContext'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetContext()
    {
        return $this->getKey('TargetContext');
    }

    /**
     * get TargetExten
     *
     * Returns key: 'TargetExten'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetExten()
    {
        return $this->getKey('TargetExten');
    }

    /**
     * get TargetPriority
     *
     * Returns key: 'TargetPriority'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetPriority()
    {
        return $this->getKey('TargetPriority');
    }

    /**
     * get TargetUniqueid
     *
     * Returns key: 'TargetUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getTargetUniqueid()
    {
        return $this->getKey('TargetUniqueid');
    }

    /**
     * get TargetLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getTargetLinkedid()
    {
        return $this->getKey('TargetLinkedid');
    }
}
