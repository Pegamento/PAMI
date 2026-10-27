<?php

/**
 * Event triggered when exchanging rtp stats.
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
 * Event triggered when exchanging rtp stats.
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
class RTCPSentEvent extends EventMessage
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
     * Returns key: 'To'.
     *
     * @return string|int|float|bool|null
     */
    public function getTo()
    {
        return $this->getKey('To');
    }

    /**
     * Returns key: 'OurSSRC'.
     *
     * @return string|int|float|bool|null
     */
    public function getOurSSRC()
    {
        return $this->getKey('OurSSRC');
    }

    /**
     * Returns key: 'SentNTP'.
     *
     * @return string|int|float|bool|null
     */
    public function getSentNTP()
    {
        return $this->getKey('SentNTP');
    }

    /**
     * Returns key: 'SentRTP'.
     *
     * @return string|int|float|bool|null
     */
    public function getSentRTP()
    {
        return $this->getKey('SentRTP');
    }

    /**
     * Returns key: 'SentPackets'.
     *
     * @return string|int|float|bool|null
     */
    public function getSentPackets()
    {
        return $this->getKey('SentPackets');
    }

    /**
     * Returns key: 'SentOctets'.
     *
     * @return string|int|float|bool|null
     */
    public function getSentOctets()
    {
        return $this->getKey('SentOctets');
    }

    /**
     * Returns key: 'ReportBlock'.
     *
     * @return string|int|float|bool|null
     */
    public function getReportBlock()
    {
        return $this->getKey('ReportBlock');
    }

    /**
     * Returns key: 'FractionLost'.
     *
     * @return string|int|float|bool|null
     */
    public function getFractionLost()
    {
        return $this->getKey('FractionLost');
    }

    /**
     * Returns key: 'CumulativeLoss'.
     *
     * @return string|int|float|bool|null
     */
    public function getCumulativeLoss()
    {
        return $this->getKey('CumulativeLoss');
    }

    /**
     * Returns key: 'IAJitter'.
     *
     * @return string|int|float|bool|null
     */
    public function getIAJitter()
    {
        return $this->getKey('IAJitter');
    }

    /**
     * Returns key: 'TheirLastSR'.
     *
     * @return string|int|float|bool|null
     */
    public function getTheirLastSR()
    {
        return $this->getKey('TheirLastSR');
    }

    /**
     * Returns key: 'DLSR'.
     *
     * @return string|int|float|bool|null
     */
    public function getDLSR()
    {
        return $this->getKey('DLSR');
    }
}
