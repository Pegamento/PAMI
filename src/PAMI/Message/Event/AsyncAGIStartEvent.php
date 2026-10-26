<?php

/**
 * Event triggered when a channel starts AsyncAGI command processing.
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

use PAMI\AsyncAgi\Event\IAsyncAgiStartEvent;

/**
 * Event triggered when a channel starts AsyncAGI command processing.
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
class AsyncAGIStartEvent extends EventMessage implements IAsyncAgiStartEvent
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string|int|float|bool|null
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
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
     * Returns key: 'ChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getChannelState()
    {
        return $this->getKey('ChannelState');
    }

    /**
     * Returns key: 'ChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getChannelStateDesc()
    {
        return $this->getKey('ChannelStateDesc');
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
     * Returns key: 'AccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return string|int|float|bool|null
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Exten'.
     *
     * @return string|int|float|bool|null
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * Returns key: 'Priority'.
     *
     * @return string|int|float|bool|null
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
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
     * @deprecated
     * @see AsyncAGIStartEvent::getEnvironment()
     * @return string|int|float|bool|null
     */
    public function getEnv()
    {
        return $this->getEnvironment();
    }

    /**
     * Returns key: 'Env'.
     *
     * @return string|int|float|bool|null
     */
    public function getEnvironment()
    {
        return $this->getKey('Env');
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
        $env = $this->getStringKey('Env');
        if ($env !== null) {
            $this->setKey('Env', rawurldecode($env));
        }
    }
}
