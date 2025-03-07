<?php
/**
 * A generic SCCP response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Diederik de Groot <ddegroot@talon.nl>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2019 Diederik de Groot <ddegroot@talon.nl>
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
namespace PAMI\Message\Response;

use PAMI\Message\Response\Response;
use PAMI\Message\Event\EventMessage;
use PAMI\Exception\PAMIException;
use PAMI\Message\Event\TableEndEvent;
use PAMI\Message\Event\TableStartEvent;

/**
 * A generic SCCP response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ComplexResponse extends Response
{
    /**
     * Child Tables
     * @var EventMessage[]
     */
    protected $tables;

    /**
     * Catch All incoming Events into current Table.
     * @var Array
     */
    private $temptable;

    /**
     * Adds an event to this response.
     *
     * If we encounter StartTable/EndTable Events we will move the events into the tables['TableName'] array
     *
     * @param EventMessage $event Child event to add.
     *
     * @return void
     */
    public function addEvent(EventMessage $event)
    {
        // not eventlist (start/complete)
        if (stristr(($event->getEventList() ?? ''), 'start') === false
            && stristr(($event->getEventList() ?? ''), 'complete') === false
            && stristr(($event->getName() ?? ''), 'complete') === false
        ) {
            $unknownevent = "PAMI\\Message\\Event\\UnknownEvent";
            if (!($event instanceof $unknownevent)) {
                // Handle TableStart/TableEnd Differently
                if (stristr($event->getName(), 'TableStart') != false && $event instanceof TableStartEvent) {
                    $this->temptable = array();
                    $this->temptable['Name'] = $event->getTableName();
                    $this->temptable['Entries'] = array();
                } elseif (stristr($event->getName(), 'TableEnd') != false && $event instanceof TableEndEvent) {
                    if (!is_array($this->tables)) {
                        $this->tables = array();
                    }
                    $this->tables[$event->getTableName()] = $this->temptable;
                    unset($this->temptable);
                } elseif (is_array($this->temptable)) {
                    $this->temptable['Entries'][] = $event;
                } else {
                    // add regular event
                    $this->events[] = $event;
                }
            } else {
                // add regular event
                $this->events[] = $event;
            }
        }
        // finish eventlist
        if (stristr(($event->getEventList() ?? ''), 'complete') != false
            || stristr(($event->getName() ?? ''), 'complete') != false
        ) {
            $this->completed = true;
        }
    }

    /**
     * Returns true if this Response Message contains an events tables (TableStart/TableEnd)
     *
     * @return boolean
     */
    public function hasTable()
    {
        if (is_array($this->tables)) {
            return true;
        }
        return false;
    }

    /**
     * Returns all eventtabless for this response.
     *
     * @return EventMessage[]
     */
    public function getTableNames()
    {
        return array_keys($this->tables);
    }


    /**
     * Returns all associated events for this response->tablename.
     *
     * @return EventMessage[]
     */
    public function getTable($tablename)
    {
        if ($this->hasTable() && array_key_exists($tablename, $this->tables)) {
            return $this->tables[$tablename];
        }
        throw new PAMIException("No such table.");
    }

    /**
     * Returns decoded version of the 'JSON' key if present.
     *
     * @return array
     */
    public function getJSON()
    {
        if (strlen($this->getKey('JSON')) > 0) {
            if (($json = json_decode($this->getKey('JSON'), true)) != false) {
                return $json;
            }
        }
        throw new PAMIException("No JSON Key found to return.");
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}
