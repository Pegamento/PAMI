<?php

/**
 * MWIUpdate Action
 *
 *
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Diederik de Groot <ddegroot@gmail.com>
 * @license    http://github.com/chan-sccp/PAMI/LICENSE
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
 * MWIUpdate Action
 *
 * Note: Auto Generated using xsltproc
 */
class MWIUpdateAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $mailbox
     *        Specific mailbox ID.
     *
     * @return void
     */
    public function __construct(string $mailbox)
    {
        parent::__construct('MWIUpdate');
        $this->setKey('Mailbox', $mailbox);
    }

    /**
     * set OldMessages
     *
     * @param string $oldmessages
     *        The number of old messages in the mailbox. Defaults to zero if missing.
     *
     * @return void
     */
    public function setOldMessages(string $oldmessages): void
    {
        $this->setKey('OldMessages', $oldmessages);
    }
    /**
     * set NewMessages
     *
     * @param string $newmessages
     *        The number of new messages in the mailbox. Defaults to zero if missing.
     *
     * @return void
     */
    public function setNewMessages(string $newmessages): void
    {
        $this->setKey('NewMessages', $newmessages);
    }
}
