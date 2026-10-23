<?php
/**
 * Atxfer action message.
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
 * AttendedTransfer action message.
 * using 'Atxfer'
 */
class AttendedTransferAction extends ActionMessage
{
        /**
         * Constructor.
         *
         * @param string $channel
         *        Transferer's channel.
         *
         * @param string $exten
         *        Extension to transfer to.
         *
         * @param string $context
         *        Context to transfer to.
         *
         * @param string $priority
         *        Priority to transfer to.
         *
         * @return void
         */
    public function __construct($channel, $exten, $context = null, $priority = null)
    {
        parent::__construct('Atxfer');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $exten);

        if ($context !== null) {
            trigger_error('Argument $context will be remove at next major version', E_USER_DEPRECATED);
            $this->setContext($context);
        }

        if ($priority !== null) {
            trigger_error('Argument $priority will be remove at next major version', E_USER_DEPRECATED);
            $this->setPriority($priority);
        }
    }

        /**
         * set Context
         *
         * @param string $context
         *        Context to transfer to.
         *
         * @return void
         */
    public function setContext($context)
    {
        $this->setKey('Context', $context);
    }

        /**
         * set Priority
         *
         * @param string $priority
         *        Priority to transfer to.
         *
         * @return void
         */
    public function setPriority($priority)
    {
        $this->setKey('Priority', $priority);
    }
}
