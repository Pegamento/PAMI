<?php

/**
 * Event triggered when a dial action has completed.
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
 * Event triggered when a dial action has completed.
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
class DialEndEvent extends EventMessage
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
     * Returns key: 'Channel'.
     *
     * @return string|int|float|bool|null
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * Returns key: 'ChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getChannelState()
    {
        return $this->getKey('ChannelState');
    }

    /**
     * Returns key: 'ChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getChannelStateDesc()
    {
        return $this->getKey('ChannelStateDesc');
    }

    /**
     * Returns key: 'CallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDNum()
    {
        return $this->getKey('CallerIDNum');
    }

    /**
     * Returns key: 'CallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDName()
    {
        return $this->getKey('CallerIDName');
    }

    /**
     * Returns key: 'ConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getConnectedLineNum()
    {
        return $this->getKey('ConnectedLineNum');
    }

    /**
     * Returns key: 'ConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getConnectedLineName()
    {
        return $this->getKey('ConnectedLineName');
    }

    /**
     * Returns key: 'AccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return string|int|float|bool|null
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Exten'.
     *
     * @return string|int|float|bool|null
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * Returns key: 'Priority'.
     *
     * @return string|int|float|bool|null
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
    }

    /**
     * Returns key: 'Uniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getUniqueid()
    {
        return $this->getKey('Uniqueid');
    }

    /**
     * Returns key: 'DestChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestChannel()
    {
        return $this->getKey('DestChannel');
    }

    /**
     * Returns key: 'DestChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestChannelState()
    {
        return $this->getKey('DestChannelState');
    }

    /**
     * Returns key: 'DestChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestChannelStateDesc()
    {
        return $this->getKey('DestChannelStateDesc');
    }

    /**
     * Returns key: 'DestCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestCallerIDNum()
    {
        return $this->getKey('DestCallerIDNum');
    }

    /**
     * Returns key: 'DestCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestCallerIDName()
    {
        return $this->getKey('DestCallerIDName');
    }

    /**
     * Returns key: 'DestConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestConnectedLineNum()
    {
        return $this->getKey('DestConnectedLineNum');
    }

    /**
     * Returns key: 'DestConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestConnectedLineName()
    {
        return $this->getKey('DestConnectedLineName');
    }

    /**
     * Returns key: 'DestAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestAccountCode()
    {
        return $this->getKey('DestAccountCode');
    }

    /**
     * Returns key: 'DestContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestContext()
    {
        return $this->getKey('DestContext');
    }

    /**
     * Returns key: 'DestExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestExten()
    {
        return $this->getKey('DestExten');
    }

    /**
     * Returns key: 'DestPriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestPriority()
    {
        return $this->getKey('DestPriority');
    }

    /**
     * Returns key: 'DestUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestUniqueid()
    {
        return $this->getKey('DestUniqueid');
    }

    /**
     * Returns key: 'DialStatus'.
     *
     * @return string|int|float|bool|null
     */
    public function getDialStatus()
    {
        return $this->getKey('DialStatus');
    }
}
