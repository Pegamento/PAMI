<?php

/**
 * A generic ami message, in-or-outbound.
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
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 8
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class Message
{
    /**
     * End Of Line means this token.
     * @var string
     */
    public const EOL = "\r\n";

    /**
     * End Of Message means this token.
     * @var string
     */
    public const EOM = "\r\n\r\n";

    /**
     * Metadata. Message variables (key/value).
     * @var array<string, string|int|float|bool|array|null>
     */
    protected array $variables = [];

    /**
     * Metadata. Message "keys" i.e: Action: login.
     * Each value is the raw string. Repeated headers are joined with EOL.
     * @var array<string, string>
     */
    private array $keys = [];

    /**
     * Created date (unix timestamp).
     * @var integer
     */
    protected int $createdDate;

    /**
     * Serialize helper. __serialize() can see private $keys; __sleep() cannot
     * when a child class supplies the property list.
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        return [
            'variables' => $this->variables,
            'keys' => $this->keys,
            'createdDate' => $this->createdDate,
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
        $this->variables = $data['variables'];
        $this->keys = $data['keys'];
        $this->createdDate = $data['createdDate'];
    }

    /**
     * Returns created date.
     *
     * @return int
     */
    public function getCreatedDate(): int
    {
        return $this->createdDate;
    }

    /**
     * Adds a variable to this message.
     *
     * @param string $key Variable name.
     * @param string|int|float|bool|array<array-key, mixed>|null $value Variable value.
     *
     * @return void
     */
    public function setVariable(string $key, string|int|float|bool|array|null $value): void
    {
        $this->variables[$key] = $value;
    }

    /**
     * Returns a variable by name.
     *
     * The value is whatever setVariable() stored. Numeric and boolean values
     * are not converted.
     *
     * @param string $key Variable name.
     *
     * @return string|int|float|bool|array<array-key, mixed>|null
     */
    public function getVariable(string $key): string|int|float|bool|array|null
    {
        return $this->variables[$key] ?? null;
    }

    /**
     * Replaces a key. The name is stored lowercased and the value is stored as given.
     *
     * @param string $key   Key name (i.e: Action).
     * @param string $value Key value.
     *
     * @return void
     */
    protected function setKey(string $key, string $value): void
    {
        $this->keys[strtolower($key)] = $value;
    }

    /**
     * Appends another value for a key, joined with EOL.
     *
     * The first occurrence is stored on its own. Each later value is appended
     * after Message::EOL so repeated AMI headers stay one string.
     *
     * @param string $key   Key name (i.e: Output).
     * @param string $value Value to append.
     *
     * @return void
     */
    protected function addKey(string $key, string $value): void
    {
        $key = strtolower($key);
        if (!array_key_exists($key, $this->keys)) {
            $this->keys[$key] = $value;
            return;
        }
        $this->keys[$key] .= self::EOL . $value;
    }

    /**
     * @deprecated Use setKey() instead.
     */
    protected function setSanitizedKey(string $key, string $value): void
    {
        $this->setKey($key, $value);
    }

    /**
     * Returns a key by name, exactly as stored.
     *
     * Repeated values are one string separated by EOL. No numeric or yes/no
     * conversion is applied. A missing key is null.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return string|null
     */
    public function getKey(string $key): ?string
    {
        return $this->keys[strtolower($key)] ?? null;
    }

    /**
     * Returns a key by name, exactly as stored.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return string|null
     */
    public function getStringKey(string $key): ?string
    {
        return $this->getKey($key);
    }

    /**
     * Returns a key interpreted as a boolean.
     *
     * Accepts yes/no, on/off, true/false, and 1/0, case-insensitively.
     * Missing, empty, and unrecognized values are null.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return bool|null
     */
    public function getBoolKey(string $key): ?bool
    {
        $value = $this->getKey($key);
        if ($value === null || $value === '') {
            return null;
        }
        if (preg_match('/^(on|true|yes|1)$/i', $value) === 1) {
            return true;
        }
        if (preg_match('/^(off|false|no|0)$/i', $value) === 1) {
            return false;
        }
        return null;
    }

    /**
     * Returns a key interpreted as an integer.
     *
     * The whole value must be an optional sign followed by digits.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return int|null
     */
    public function getIntKey(string $key): ?int
    {
        $value = $this->getKey($key);
        if ($value === null || preg_match('/^[+-]?\d+$/', $value) !== 1) {
            return null;
        }
        return (int) $value;
    }

    /**
     * Returns a key interpreted as a float.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return float|null
     */
    public function getFloatKey(string $key): ?float
    {
        $value = $this->getKey($key);
        if ($value === null || !is_numeric($value)) {
            return null;
        }
        return (float) $value;
    }

    /**
     * Returns all keys for this message.
     *
     * @return array<string, string>
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * Returns all variables for this message.
     *
     * @return array<string, string|int|float|bool|array|null>
     */
    public function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * Returns the end of message token appended to the end of a given message.
     *
     * @param string $message
     *
     * @return string
     */
    protected function finishMessage(string $message): string
    {
        return $message . self::EOL . self::EOL;
    }

    /**
     * Returns the string representation for an ami action variable.
     *
     * @param string $key
     * @param string $value
     *
     * @return string
     */
    private function serializeVariable($key, $value): string
    {
        return "Variable: $key=$value";
    }

    /**
     * Gives a string representation for this message, ready to be sent to
     * ami.
     *
     * @return string
     */
    public function serialize(): string
    {
        $result = [];
        foreach ($this->getKeys() as $k => $v) {
            foreach (explode(self::EOL, $v) as $singleValue) {
                $result[] = $k . ': ' . $singleValue;
            }
        }
        foreach ($this->getVariables() as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $singleValue) {
                    $result[] = $this->serializeVariable($k, $singleValue);
                }
            } else {
                $result[] = $this->serializeVariable($k, $v);
            }
        }
        $mStr = $this->finishMessage(implode(self::EOL, $result));
        return $mStr;
    }

    /**
     * Returns key: 'ActionID'.
     *
     * @return string|null
     */
    public function getActionID(): ?string
    {
        return $this->getKey('actionid');
    }

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->createdDate = time();
    }
}
