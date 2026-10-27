<?php

/**
 * Queue pause action.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
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

namespace PAMI\Message\Action;

/**
 * Queue pause action.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class QueuePauseAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $interface
     * @param string|null $queue
     * @param string|null $reason
     */
    public function __construct(string $interface, ?string $queue = null, ?string $reason = null)
    {
        parent::__construct('QueuePause');
        if ($queue !== null) {
            $this->setKey('Queue', $queue);
        }
        if ($reason !== null) {
            $this->setKey('Reason', $reason);
        }
        $this->setKey('Interface', $interface);
        $this->setKey('Paused', 'true');
    }
}
