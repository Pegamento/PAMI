<?php

/**
 * Event triggered when a call is transfered.
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

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when a call is transfered.
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
class TransferEvent extends EventMessage
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
     * Returns key: 'TransferMethod'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransferMethod()
    {
        return $this->getKey('TransferMethod');
    }

    /**
     * Returns key: 'TransferType'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransferType()
    {
        return $this->getKey('TransferType');
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
     * Returns key: 'TargetChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getTargetChannel()
    {
        return $this->getKey('TargetChannel');
    }

    /**
     * Returns key: 'SIP-Callid'.
     *
     * @return string|int|float|bool|null
     */
    public function getSipCallID()
    {
        return $this->getKey('SIP-Callid');
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
     * Returns key: 'TargetUniqueID'.
     *
     * @return string|int|float|bool|null
     */
    public function getTargetUniqueID()
    {
        return $this->getKey('TargetUniqueid');
    }

    /**
     * Returns key: 'TransferExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransferExten()
    {
        return $this->getKey('TransferExten');
    }

    /**
     * Returns key: 'TransferContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransferContext()
    {
        return $this->getKey('TransferContext');
    }
}
