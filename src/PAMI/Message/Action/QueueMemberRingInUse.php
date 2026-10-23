<?php
/**
 * QueueReset action message.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
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
namespace PAMI\Message\Action;

/**
 * QueueReset action message.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package Message
 * @subpackage Action
 * @author Marcelo Gornstein <marcelog@gmail.com>
 * @license http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link http://marcelog.github.com/PAMI/
 */
class QueueMemberRingInUse extends ActionMessage
{

    /**
     * Constructor.
     *
     * @param string $interface interface.
     * @param boolean $ringinuse.
     *
     * @return void
     */
    public function __construct($interface, $ringinuse)
    {
        parent::__construct('QueueMemberRingInUse');
        $this->setKey('Interface', $interface);
        $this->setKey('RingInUse', $ringinuse ? 'true' : 'false');
        $this->setKey('Queue', 'false');
    }

    /**
     * Set Queue.
     *
     * @param optional string $queue Queue name.
     *
     * @return void
     */
    public function setQueue($queue)
    {
        $this->setKey('Queue', $queue);
    }

    /**
     * Set RingInuse.
     *
     * @param boolean $ringinuse Is Ring Inuse.
     *
     * @return void
     */
    public function setRingInUse($ringinuse)
    {
        $this->setKey('RingInUse', $ringinuse ? 'true' : 'false');
    }
}
