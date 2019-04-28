<?php
/**
 * PresenceStateListComplete Event
 * Part Of Action: PresenceStateList
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Diederik de Groot <ddegroot@gmail.com>
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
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * PresenceStateListComplete Event
 * Part Of Action: PresenceStateList
 *
 * Note: Auto Generated using xsltproc
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@gmail.com>
 * @license    http://dkgroot.github.com/PAMI/ Apache License 2.0
 * @link       http://github.com/dkgroot/PAMI/
 */
class PresenceStateListCompleteEvent extends EventMessage
{
    /**
     * get EventList
     *
     * Returns:Conveys the status of the event list.
     *
     * @return string
     */
    public function getEventList()
    {
        return $this->getKey('EventList');
    }

    /**
     * get ListItems
     *
     * Returns:Conveys the number of statuses reported.
     *
     * @return string
     */
    public function getListItems()
    {
        return $this->getKey('ListItems');
    }

    
} 
?>
  