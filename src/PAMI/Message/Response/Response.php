<?php

/**
 * A generic response message from ami.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
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

namespace PAMI\Message\Response;

use PAMI\Message\IncomingMessage;
use PAMI\Message\Event\EventMessage;

/**
 * A generic response message from ami.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
abstract class Response extends IncomingMessage
{
    /**
     * Child events.
     * @var EventMessage[]
     */
    protected array $events = [];

    /**
     * Is this response completed? (with all its events).
     * @var bool
     */
    protected bool $completed;

    /**
     * Serialize function.
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        return parent::__serialize() + [
            'completed' => $this->completed,
            'events' => $this->events,
        ];
    }

    /**
     * Restores the state produced by __serialize().
     *
     * @param array<string, mixed> $data Serialized state.
     *
     * @return void
     */
    public function __unserialize(array $data): void
    {
        parent::__unserialize($data);
        $this->completed = $data['completed'];
        $this->events = $data['events'];
    }

    /**
     * True if this response is complete. A response is considered complete
     * if it's not a list OR it's a list with its last child event containing
     * an EventList = Complete.
     *
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->completed;
    }

    /**
     * Adds an event to this response.
     *
     * @param EventMessage $event Child event to add.
     *
     * @return void
     */
    public function addEvent(EventMessage $event): void
    {
        $this->events[] = $event;
        if (
            stristr(($event->getEventList() ?? ''), 'complete') !== false
            || stristr(($event->getName() ?? ''), 'complete') !== false
            || stristr(($event->getName() ?? ''), 'DBGetResponse') !== false
        ) {
            $this->completed = true;
        }
    }

    /**
     * Returns all associated events for this response.
     *
     * @return EventMessage[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * Checks if the Response field has the word Error in it.
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return stristr(($this->getKey('response') ?? ''), 'Error') === false;
    }

    /**
     * Returns true if this response contains the key EventList with the
     * word 'start' in it. Another way is to have a Message key, like:
     * Message: Result will follow
     *
     * @return bool
     */
    public function isList(): bool
    {
        return
            stristr(($this->getKey('eventlist') ?? 'empty'), 'start') !== false
            || stristr(($this->getMessage() ?? 'empty'), 'follow') !== false
        ;
    }

    /**
     * Returns key: 'Message'.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->getKey('message');
    }

    /**
     * Sets an action id. This should not be necessary, but asterisk sometimes
     * decides to not send the Response: or Event: headers.
     *
     * @param string $actionId New ActionId.
     *
     * @return void
     */
    public function setActionId(string $actionId): void
    {
        $this->setKey('ActionId', $actionId);
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct(string $rawContent)
    {
        parent::__construct($rawContent);
        $this->completed = !$this->isList();
    }
}
