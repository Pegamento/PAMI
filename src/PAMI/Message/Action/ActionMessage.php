<?php

/**
 * A generic action ami message.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
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

use PAMI\Message\OutgoingMessage;
use PAMI\Exception\PAMIException;

/**
 * A generic action ami message.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class ActionMessage extends OutgoingMessage
{
    /**
     * Optional generator used instead of random ActionIDs. Tests pin this.
     *
     * @var null|\Closure(): string
     */
    private static ?\Closure $actionIdGenerator = null;

    /**
     * Replace the default random ActionID generator.
     *
     * Pass null to restore bin2hex(random_bytes(8)).
     *
     * @param null|\Closure(): string $generator
     *
     * @return void
     */
    public static function setActionIdGenerator(?\Closure $generator): void
    {
        self::$actionIdGenerator = $generator;
    }

    /**
     * Constructor.
     *
     * @param string $what Action command.
     *
     * @return void
     */
    public function __construct(string $what)
    {
        parent::__construct();
        $this->setKey('Action', $what);
        $this->setKey('ActionID', self::generateActionId());
    }

    /**
     * @return string
     */
    private static function generateActionId(): string
    {
        if (self::$actionIdGenerator !== null) {
            return (string) (self::$actionIdGenerator)();
        }

        return bin2hex(random_bytes(8));
    }

    /**
     * Sets Action ID.
     *
     * The ActionID can be at most 69 characters long, according to
     * {@link https://issues.asterisk.org/jira/browse/14847 Asterisk Issue 14847}.
     *
     * Therefore we'll throw an exception when the ActionID is too long.
     *
     * @param $actionID The Action ID to have this action known by
     *
     * @return void
     * @throws PAMIException When the ActionID is more then 69 characters long
     */
    public function setActionID(string $actionID): void
    {
        $actionID = (string) $actionID;
        if (0 == strlen($actionID)) {
            throw new PAMIException('ActionID cannot be empty.');
        }

        if (strlen($actionID) > 69) {
            throw new PAMIException('ActionID can be at most 69 characters long.');
        }

        $this->setKey('ActionID', $actionID);
    }
}
