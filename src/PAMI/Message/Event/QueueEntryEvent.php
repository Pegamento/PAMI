<?php

/**
 * Event triggered for a QueueStatus action.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Ales Farcnik <@alesf>
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
 * @author     Ales Farcnik <@alesf>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class QueueEntryEvent extends EventMessage
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
     * Returns key: 'Position'.
     *
     * @return int
     */
    public function getPosition(): int
    {
        return intval($this->getKey('Position'));
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
     * Returns key: 'Uniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getUniqueid()
    {
        return $this->getKey('Uniqueid');
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
     * Returns key: 'Wait'.
     *
     * @return string|int|float|bool|null
     */
    public function getWait()
    {
        return $this->getKey('Wait');
    }
}
