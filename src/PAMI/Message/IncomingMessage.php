<?php

/**
 * A generic incoming message.
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

namespace PAMI\Message;

/**
 * A generic incoming message.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class IncomingMessage extends Message
{
    /**
     * Holds original message.
     * @var string
     */
    protected string $rawContent;

    /**
     * Metadata. Specific channel variables.
     * @var array<string, array<string, string>>
     */
    protected array $channelVariables;

    /**
     * Metadata. Status variables (Variable: lines), keyed by channel.
     * @var array<string, array<string, string>>
     */
    protected array $statusVariables;

    /**
     * Serialize function.
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        return parent::__serialize() + [
            'rawContent' => $this->rawContent,
            'channelVariables' => $this->channelVariables,
            'statusVariables' => $this->statusVariables,
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
        $this->rawContent = $data['rawContent'];
        $this->channelVariables = $data['channelVariables'];
        $this->statusVariables = $data['statusVariables'];
    }

    /**
     * Returns key 'EventList'. In responses, this will surely be a "start". In
     * events, should be a "complete".
     *
     * @return string|null
     */
    public function getEventList(): ?string
    {
        return $this->getKey('EventList');
    }

    /**
     * Returns the original message content without parsing.
     *
     * @return string
     */
    public function getRawContent(): string
    {
        return $this->rawContent;
    }

    /**
     * Returns the channel variables for all reported channels.
     * https://github.com/marcelog/PAMI/issues/85
     *
     * The channel names will be lowercased.
     *
     * @return array<string, array<string, string>>
     */
    public function getAllChannelVariables(): array
    {
        return $this->channelVariables;
    }

    /**
     * Returns the channel variables for the given channel.
     * https://github.com/marcelog/PAMI/issues/85
     *
     * @param string $channel Channel name. If not given, will return variables
     * for the "current" channel.
     *
     * @return array<string, string>|null
     */
    public function getChannelVariables(?string $channel = null): ?array
    {
        if (is_null($channel)) {
            $current = $this->getKey('channel');
            if ($current === null || $current === '') {
                return $this->getChannelVariables('default');
            } else {
                return $this->getChannelVariables($current);
            }
        } else {
            $channel = strtolower($channel);
            if (!isset($this->channelVariables[$channel])) {
                return null;
            }
            return $this->channelVariables[$channel];
        }
    }

    /**
     * Returns the status variables for all reported channels.
     * https://github.com/marcelog/PAMI/issues/85
     *
     * The channel names will be lowercased.
     *
     * @return array<string, array<string, string>>
     */
    public function getAllStatusVariables(): array
    {
        return $this->statusVariables;
    }

    /**
     * Returns the status variables for the given channel.
     * https://github.com/marcelog/PAMI/issues/85
     *
     * @param string $channel Channel name. If not given, will return variables
     * for the "current" channel.
     *
     * @return array<string, string>|null
     */
    public function getStatusVariables(?string $channel = null): ?array
    {
        if (is_null($channel)) {
            $current = $this->getKey('channel');
            if ($current === null || $current === '') {
                return $this->getStatusVariables('default');
            } else {
                return $this->getStatusVariables($current);
            }
        } else {
            $channel = strtolower($channel);
            if (!isset($this->statusVariables[$channel])) {
                return null;
            }
            return $this->statusVariables[$channel];
        }
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami.
     *
     * @return void
     */
    public function __construct(string $rawContent)
    {
        parent::__construct();
        $this->channelVariables = ['default' => []];
        $this->statusVariables = ['default' => []];
        $this->rawContent = $rawContent;
        $lines = explode(Message::EOL, $rawContent);
        foreach ($lines as $line) {
            $content = explode(':', $line);
            $name = strtolower(trim($content[0]));
            unset($content[0]);
            $value = isset($content[1]) ? trim(implode(':', $content)) : '';
            if (!strncmp($name, 'chanvariable', 12)) {
                // https://github.com/marcelog/PAMI/issues/85
                $matches = preg_match("/\(([^\)]*)\)/", $name, $captures);
                $chanName = 'default';
                if ($matches > 0) {
                    $chanName = $captures[1];
                }
                $content = explode('=', $value);
                $name = trim($content[0]);
                unset($content[0]);
                $value = isset($content[1]) ? trim(implode('=', $content)) : '';
                $this->channelVariables[$chanName][strtolower($name)] = $value;
                $this->addKey('chanvariable', $name);
            } elseif (!strncmp($name, 'variable', 8)) {
                // https://github.com/marcelog/PAMI/issues/85
                $matches = preg_match("/\(([^\)]*)\)/", $name, $captures);
                $chanName = 'default';
                if ($matches > 0) {
                    $chanName = $captures[1];
                }
                $content = explode('=', $value);
                $name = trim($content[0]);
                unset($content[0]);
                $value = isset($content[1]) ? trim(implode('=', $content)) : '';
                $this->statusVariables[$chanName][strtolower($name)] = $value;
                $this->addKey('variable', $name);
            }
            $this->addKey($name, $value);
        }
        // https://github.com/marcelog/PAMI/issues/85
        $channelName = $this->getKey('channel');
        if ($channelName !== null && $channelName !== '') {
            $channel = strtolower($channelName);

            if (isset($this->channelVariables[$channel])) {
                $this->channelVariables[$channel] = array_merge(
                    $this->channelVariables[$channel],
                    $this->channelVariables['default']
                );
            } else {
                $this->channelVariables[$channel] = $this->channelVariables['default'];
            }
            unset($this->channelVariables['default']);

            if (isset($this->statusVariables[$channel])) {
                $this->statusVariables[$channel] = array_merge(
                    $this->statusVariables[$channel],
                    $this->statusVariables['default']
                );
            } else {
                $this->statusVariables[$channel] = $this->statusVariables['default'];
            }
            unset($this->statusVariables['default']);
        }
    }
}
