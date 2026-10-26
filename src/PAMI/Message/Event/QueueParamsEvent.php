<?php

/**
 * Event triggered for a QueueStatus action.
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
 * Event triggered for a QueueStatus action.
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
class QueueParamsEvent extends EventMessage
{
    /**
     * Returns key: 'Queue'.
     *
     * @return string|int|float|bool|null
     */
    public function getQueue()
    {
        return $this->getKey('Queue');
    }

    /**
     * Returns key: 'Max'.
     *
     * @return int
     */
    public function getMax(): int
    {
        return intval($this->getKey('Max'));
    }

    /**
     * Returns key: 'Strategy'.
     *
     * @return string|int|float|bool|null
     */
    public function getStrategy()
    {
        return $this->getKey('Strategy');
    }

    /**
     * Returns key: 'Calls'.
     *
     * @return int
     */
    public function getCalls(): int
    {
        return intval($this->getKey('Calls'));
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return int
     */
    public function getHoldTime(): int
    {
        return intval($this->getKey('HoldTime'));
    }

    /**
     * Returns key: 'TalkTime'.
     *
     * @return int
     */
    public function getTalkTime(): int
    {
        return intval($this->getKey('TalkTime'));
    }

    /**
     * Returns key: 'Completed'.
     *
     * @return int
     */
    public function getCompleted(): int
    {
        return intval($this->getKey('Completed'));
    }

    /**
     * Returns key: 'Abandoned'.
     *
     * @return int
     */
    public function getAbandoned(): int
    {
        return intval($this->getKey('Abandoned'));
    }

    /**
     * Returns key: 'ServiceLevel'.
     *
     * @return int
     */
    public function getServiceLevel(): int
    {
        return intval($this->getKey('ServiceLevel'));
    }

    /**
     * Returns key: 'ServiceLevelPerf'.
     *
     * @return string|int|float|bool|null
     */
    public function getServiceLevelPerf()
    {
        return $this->getKey('ServiceLevelPerf');
    }

    /**
     * Returns key: 'Weight'.
     *
     * @return int
     */
    public function getWeight(): int
    {
        return intval($this->getKey('Weight'));
    }
}
