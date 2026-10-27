<?php

/**
 * Event triggered when a CEL log message is generated
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Jacob Kiers <jacob@alphacomm.nl>
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

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when a CEL log message is generated
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Jacob Kiers <jacob@alphacomm.nl>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class CELEvent extends EventMessage
{
    /**
     * Returns key: 'AMAFlags'.
     *
     * @return string|int|float|bool|null
     */
    public function getAMAFlags()
    {
        return $this->getKey('AMAFlags');
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
     * Returns key: 'AppData'.
     *
     * @return string|int|float|bool|null
     */
    public function getAppData()
    {
        return $this->getKey('AppData');
    }


    /**
     * Returns key: 'Application'.
     *
     * @return string|int|float|bool|null
     */
    public function getApplication()
    {
        return $this->getKey('Application');
    }


    /**
     * Returns key: 'CallerIDani'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDani()
    {
        return $this->getKey('CallerIDani');
    }


    /**
     * Returns key: 'CallerIDdnid'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDdnid()
    {
        return $this->getKey('CallerIDdnid');
    }


    /**
     * Returns key: 'CallerIDname'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDname()
    {
        return $this->getKey('CallerIDname');
    }


    /**
     * Returns key: 'CallerIDnum'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDnum()
    {
        return $this->getKey('CallerIDnum');
    }


    /**
     * Returns key: 'CallerIDrdnis'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallerIDrdnis()
    {
        return $this->getKey('CallerIDrdnis');
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
     * Returns key: 'Context'.
     *
     * @return string|int|float|bool|null
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }


    /**
     * Returns key: 'Event'.
     *
     * @return string|int|float|bool|null
     */
    public function getEvent()
    {
        return $this->getKey('Event');
    }


    /**
     * Returns key: 'EventName'.
     *
     * @return string|int|float|bool|null
     */
    public function getEventName()
    {
        return $this->getKey('EventName');
    }


    /**
     * Returns key: 'EventTime'.
     *
     * @return string|int|float|bool|null
     */
    public function getEventTime()
    {
        return $this->getKey('EventTime');
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
     * Returns key: 'Extra'.
     *
     * @return string|int|float|bool|null
     */
    public function getExtra()
    {
        return $this->getKey('Extra');
    }


    /**
     * Returns key: 'LinkedID'.
     *
     * @return string|int|float|bool|null
     */
    public function getLinkedID()
    {
        return $this->getKey('LinkedID');
    }


    /**
     * Returns key: 'Peer'.
     *
     * @return string|int|float|bool|null
     */
    public function getPeer()
    {
        return $this->getKey('Peer');
    }


    /**
     * Returns key: 'PeerAccount'.
     *
     * @return string|int|float|bool|null
     */
    public function getPeerAccount()
    {
        return $this->getKey('PeerAccount');
    }


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
     * Returns key: 'Timestamp'.
     *
     * @return string|int|float|bool|null
     */
    public function getTimestamp()
    {
        return $this->getKey('Timestamp');
    }


    /**
     * Returns key: 'UniqueID'.
     *
     * @return string|int|float|bool|null
     */
    public function getUniqueID()
    {
        return $this->getKey('UniqueID');
    }


    /**
     * Returns key: 'Userfield'.
     *
     * @return string|int|float|bool|null
     */
    public function getUserfield()
    {
        return $this->getKey('Userfield');
    }
}
