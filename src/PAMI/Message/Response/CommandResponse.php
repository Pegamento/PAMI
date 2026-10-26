<?php

/**
 * A generic SCCP response message from ami.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Diederik de Groot <ddegroot@talon.nl>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
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

declare(strict_types=1);

namespace PAMI\Message\Response;

/**
 * Response to a CommandAction, collecting the Output lines.
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
class CommandResponse extends Response
{
    /**
     * Returns true if this response contains the Message: command output follows
     *
     * @return bool
     */
    public function isCommandFinished(): bool
    {
        return stristr(($this->getMessage() ?? ''), 'command output follows') !== false;
    }

    /**
     * Returns Command output result
     *
     * @return string
     */
    public function getCommandOutput(): string
    {
        return $this->getKey('output') ?? '';
    }

    /**
     * Returns Command output result array
     *
     * @return string[]
     */
    public function getCommandOutputArray(): array
    {
        $output = $this->getKey('output');
        if ($output === null) {
            return [];
        }
        return explode(self::EOL, $output);
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
        $this->completed = $this->isCommandFinished();
    }
}
