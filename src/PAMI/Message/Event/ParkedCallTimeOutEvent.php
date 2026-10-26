<?php

/**
 * Event triggered when a channel leaves a parking lot due to reaching the time limit of being parked.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
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

/**
 * Event triggered when a channel leaves a parking lot due to reaching the time limit of being parked.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ParkedCallTimeOutEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string|int|float|bool|null
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Returns key: 'ParkeeChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeChannel()
    {
        return $this->getKey('ParkeeChannel');
    }

    /**
     * Returns key: 'ParkeeChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeChannelState()
    {
        return $this->getKey('ParkeeChannelState');
    }

    /**
     * Returns key: 'ParkeeChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeChannelStateDesc()
    {
        return $this->getKey('ParkeeChannelStateDesc');
    }

    /**
     * Returns key: 'ParkeeCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeCallerIDNum()
    {
        return $this->getKey('ParkeeCallerIDNum');
    }

    /**
     * Returns key: 'ParkeeCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeCallerIDName()
    {
        return $this->getKey('ParkeeCallerIDName');
    }

    /**
     * Returns key: 'ParkeeConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeConnectedLineNum()
    {
        return $this->getKey('ParkeeConnectedLineNum');
    }

    /**
     * Returns key: 'ParkeeConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeConnectedLineName()
    {
        return $this->getKey('ParkeeConnectedLineName');
    }

    /**
     * Returns key: 'ParkeeAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeAccountCode()
    {
        return $this->getKey('ParkeeAccountCode');
    }

    /**
     * Returns key: 'ParkeeContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeContext()
    {
        return $this->getKey('ParkeeContext');
    }

    /**
     * Returns key: 'ParkeeExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeExten()
    {
        return $this->getKey('ParkeeExten');
    }

    /**
     * Returns key: 'ParkeePriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeePriority()
    {
        return $this->getKey('ParkeePriority');
    }

    /**
     * Returns key: 'ParkeeUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkeeUniqueid()
    {
        return $this->getKey('ParkeeUniqueid');
    }

    /**
     * Returns key: 'ParkerChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerChannel()
    {
        return $this->getKey('ParkerChannel');
    }

    /**
     * Returns key: 'ParkerChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerChannelState()
    {
        return $this->getKey('ParkerChannelState');
    }

    /**
     * Returns key: 'ParkerChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerChannelStateDesc()
    {
        return $this->getKey('ParkerChannelStateDesc');
    }

    /**
     * Returns key: 'ParkerCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerCallerIDNum()
    {
        return $this->getKey('ParkerCallerIDNum');
    }

    /**
     * Returns key: 'ParkerCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerCallerIDName()
    {
        return $this->getKey('ParkerCallerIDName');
    }

    /**
     * Returns key: 'ParkerConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerConnectedLineNum()
    {
        return $this->getKey('ParkerConnectedLineNum');
    }

    /**
     * Returns key: 'ParkerConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerConnectedLineName()
    {
        return $this->getKey('ParkerConnectedLineName');
    }

    /**
     * Returns key: 'ParkerAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerAccountCode()
    {
        return $this->getKey('ParkerAccountCode');
    }

    /**
     * Returns key: 'ParkerContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerContext()
    {
        return $this->getKey('ParkerContext');
    }

    /**
     * Returns key: 'ParkerExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerExten()
    {
        return $this->getKey('ParkerExten');
    }

    /**
     * Returns key: 'ParkerPriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerPriority()
    {
        return $this->getKey('ParkerPriority');
    }

    /**
     * Returns key: 'ParkerUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerUniqueid()
    {
        return $this->getKey('ParkerUniqueid');
    }

    /**
     * Returns key: 'ParkerDialString'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkerDialString()
    {
        return $this->getKey('ParkerDialString');
    }

    /**
     * Returns key: 'Parkinglot'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkinglot()
    {
        return $this->getKey('Parkinglot');
    }

    /**
     * Returns key: 'ParkingSpace'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkingSpace()
    {
        return $this->getKey('ParkingSpace');
    }

    /**
     * Returns key: 'ParkingTimeout'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkingTimeout()
    {
        return $this->getKey('ParkingTimeout');
    }

    /**
     * Returns key: 'ParkingDuration'.
     *
     * @return string|int|float|bool|null
     */
    public function getParkingDuration()
    {
        return $this->getKey('ParkingDuration');
    }
}
