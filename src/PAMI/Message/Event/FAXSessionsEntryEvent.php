<?php

/**
 * FAXSessionsEntry Event
 *
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
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

namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * FAXSessionsEntry Event
 *
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@gmail.com>
 * @license    http://chan-sccp.github.com/PAMI/ Apache License 2.0
 * @link       http://github.com/chan-sccp/PAMI/
 */
class FAXSessionsEntryEvent extends EventMessage
{
    /**
     * get Channel
     *
     * Returns:Name of the channel responsible for the FAX session
     *
     * @return string|int|float|bool|null
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * get Technology
     *
     * Returns:The FAX technology that the FAX session is using
     *
     * @return string|int|float|bool|null
     */
    public function getTechnology()
    {
        return $this->getKey('Technology');
    }

    /**
     * get SessionNumber
     *
     * Returns:The numerical identifier for this particular session
     *
     * @return string|int|float|bool|null
     */
    public function getSessionNumber()
    {
        return $this->getKey('SessionNumber');
    }

    /**
     * get SessionType
     *
     * Returns:FAX session passthru/relay type
     *
     * @return string|int|float|bool|null
     */
    public function getSessionType()
    {
        return $this->getKey('SessionType');
    }

    /**
     * get Operation
     *
     * Returns:FAX session operation type
     *
     * @return string|int|float|bool|null
     */
    public function getOperation()
    {
        return $this->getKey('Operation');
    }

    /**
     * get State
     *
     * Returns:Current state of the FAX session
     *
     * @return string|int|float|bool|null
     */
    public function getState()
    {
        return $this->getKey('State');
    }

    /**
     * get Files
     *
     * Returns:File or list of files associated with this FAX session
     *
     * @return string|int|float|bool|null
     */
    public function getFiles()
    {
        return $this->getKey('Files');
    }
}
