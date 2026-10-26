<?php

/**
 * ParkedCallSwap Event
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
 * ParkedCallSwap Event
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
class ParkedCallSwapEvent extends EventMessage
{
    /**
     * get ParkeeChannel
     *
     * Returns key: 'ParkeeChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeChannel()
    {
        return $this->getKey('ParkeeChannel');
    }

    /**
     * get ParkeeChannelState
     *
     * Returns:A numeric code for the channel's current state, related to ParkeeChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeChannelState()
    {
        return $this->getKey('ParkeeChannelState');
    }

    /**
     * get ParkeeChannelStateDesc
     *
     * Returns key: 'ParkeeChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeChannelStateDesc()
    {
        return $this->getKey('ParkeeChannelStateDesc');
    }

    /**
     * get ParkeeCallerIDNum
     *
     * Returns key: 'ParkeeCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeCallerIDNum()
    {
        return $this->getKey('ParkeeCallerIDNum');
    }

    /**
     * get ParkeeCallerIDName
     *
     * Returns key: 'ParkeeCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeCallerIDName()
    {
        return $this->getKey('ParkeeCallerIDName');
    }

    /**
     * get ParkeeConnectedLineNum
     *
     * Returns key: 'ParkeeConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeConnectedLineNum()
    {
        return $this->getKey('ParkeeConnectedLineNum');
    }

    /**
     * get ParkeeConnectedLineName
     *
     * Returns key: 'ParkeeConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeConnectedLineName()
    {
        return $this->getKey('ParkeeConnectedLineName');
    }

    /**
     * get ParkeeLanguage
     *
     * Returns key: 'ParkeeLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeLanguage()
    {
        return $this->getKey('ParkeeLanguage');
    }

    /**
     * get ParkeeAccountCode
     *
     * Returns key: 'ParkeeAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeAccountCode()
    {
        return $this->getKey('ParkeeAccountCode');
    }

    /**
     * get ParkeeContext
     *
     * Returns key: 'ParkeeContext'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeContext()
    {
        return $this->getKey('ParkeeContext');
    }

    /**
     * get ParkeeExten
     *
     * Returns key: 'ParkeeExten'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeExten()
    {
        return $this->getKey('ParkeeExten');
    }

    /**
     * get ParkeePriority
     *
     * Returns key: 'ParkeePriority'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeePriority()
    {
        return $this->getKey('ParkeePriority');
    }

    /**
     * get ParkeeUniqueid
     *
     * Returns key: 'ParkeeUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeUniqueid()
    {
        return $this->getKey('ParkeeUniqueid');
    }

    /**
     * get ParkeeLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeLinkedid()
    {
        return $this->getKey('ParkeeLinkedid');
    }

    /**
     * get ParkerChannel
     *
     * Returns key: 'ParkerChannel'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerChannel()
    {
        return $this->getKey('ParkerChannel');
    }

    /**
     * get ParkerChannelState
     *
     * Returns:A numeric code for the channel's current state, related to ParkerChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getParkerChannelState()
    {
        return $this->getKey('ParkerChannelState');
    }

    /**
     * get ParkerChannelStateDesc
     *
     * Returns key: 'ParkerChannelStateDesc'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerChannelStateDesc()
    {
        return $this->getKey('ParkerChannelStateDesc');
    }

    /**
     * get ParkerCallerIDNum
     *
     * Returns key: 'ParkerCallerIDNum'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerCallerIDNum()
    {
        return $this->getKey('ParkerCallerIDNum');
    }

    /**
     * get ParkerCallerIDName
     *
     * Returns key: 'ParkerCallerIDName'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerCallerIDName()
    {
        return $this->getKey('ParkerCallerIDName');
    }

    /**
     * get ParkerConnectedLineNum
     *
     * Returns key: 'ParkerConnectedLineNum'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerConnectedLineNum()
    {
        return $this->getKey('ParkerConnectedLineNum');
    }

    /**
     * get ParkerConnectedLineName
     *
     * Returns key: 'ParkerConnectedLineName'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerConnectedLineName()
    {
        return $this->getKey('ParkerConnectedLineName');
    }

    /**
     * get ParkerLanguage
     *
     * Returns key: 'ParkerLanguage'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerLanguage()
    {
        return $this->getKey('ParkerLanguage');
    }

    /**
     * get ParkerAccountCode
     *
     * Returns key: 'ParkerAccountCode'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerAccountCode()
    {
        return $this->getKey('ParkerAccountCode');
    }

    /**
     * get ParkerContext
     *
     * Returns key: 'ParkerContext'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerContext()
    {
        return $this->getKey('ParkerContext');
    }

    /**
     * get ParkerExten
     *
     * Returns key: 'ParkerExten'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerExten()
    {
        return $this->getKey('ParkerExten');
    }

    /**
     * get ParkerPriority
     *
     * Returns key: 'ParkerPriority'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerPriority()
    {
        return $this->getKey('ParkerPriority');
    }

    /**
     * get ParkerUniqueid
     *
     * Returns key: 'ParkerUniqueid'
     *
     * @return string|int|float|bool|null
     */
    public function getParkerUniqueid()
    {
        return $this->getKey('ParkerUniqueid');
    }

    /**
     * get ParkerLinkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerLinkedid()
    {
        return $this->getKey('ParkerLinkedid');
    }

    /**
     * get ParkerDialString
     *
     * Returns:Dial String that can be used to call back the parker on ParkingTimeout.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerDialString()
    {
        return $this->getKey('ParkerDialString');
    }

    /**
     * get Parkinglot
     *
     * Returns:Name of the parking lot that the parkee is parked in
     *
     * @return string|int|float|bool|null
     */
    public function getParkinglot()
    {
        return $this->getKey('Parkinglot');
    }

    /**
     * get ParkingSpace
     *
     * Returns:Parking Space that the parkee is parked in
     *
     * @return string|int|float|bool|null
     */
    public function getParkingSpace()
    {
        return $this->getKey('ParkingSpace');
    }

    /**
     * get ParkingTimeout
     *
     * Returns:Time remaining until the parkee is forcefully removed from parking in seconds
     *
     * @return string|int|float|bool|null
     */
    public function getParkingTimeout()
    {
        return $this->getKey('ParkingTimeout');
    }

    /**
     * get ParkingDuration
     *
     * Returns:Time the parkee has been in the parking bridge (in seconds)
     *
     * @return string|int|float|bool|null
     */
    public function getParkingDuration()
    {
        return $this->getKey('ParkingDuration');
    }
}
