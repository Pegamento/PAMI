<?php
/**
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
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
namespace PAMI\Message;

use PAMI\Exception\PAMIException;

/**
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 5
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
    const EOL = "\r\n";

    /**
     * End Of Message means this token.
     * @var string
     */
    const EOM = "\r\n\r\n";

    /**
     * Message content, line by line. This is what it gets sent
     * or received literally.
     * @var string[]
     */
    protected $lines;

    /**
     * Metadata. Message variables (key/value).
     * @var string[]
     */
    protected $variables;

    /**
     * Metadata. Message "keys" i.e: Action: login.
     * Values are stored as received. Sanitation happens in getKey().
     * @var string[]|array[]
     */
    protected $keys;

    /**
     * Created date (unix timestamp).
     * @var integer
     */
    protected $createdDate;

    /**
     * Serialize helper function.
     *
     * @return string[]
     */
    public function __sleep()
    {
        return array('lines', 'variables', 'keys', 'createdDate');
    }

    /**
     * Returns created date.
     *
     * @return integer
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Adds a variable to this message.
     *
     * @param string $key   Variable name.
     * @param string $value Variable value.
     *
     * @return void
     */
    public function setVariable($key, $value)
    {
        $this->variables[$key] = $value;
    }

    /**
     * Returns a variable by name.
     *
     * @param string $key Variable name.
     *
     * @return string
     */
    public function getVariable($key)
    {
        if (!isset($this->variables[$key])) {
            return null;
        }
        return $this->variables[$key];
    }

    /**
     * Sanitize incoming value
     *
     * @param string $value Key value.
     *
     * @return typed and sanitized value
     */
    protected function sanitizeInput($value)
    {
        if (!isset($value) || $value === null || strlen($value) == 0) {
            return null;
        } elseif (is_numeric($value)) {
            // index access is safe as is_numeric('') === false
            if ($value[0] === '0' || $value[0] === '+') {
                // Return as string if there's a leading zero or plus sign to avoid losing information
                return $value;
            }
            // Float conversion drops trailing zeros in the fractional part (e.g. "1234.10" becomes 1234.1)
            if (preg_match('/\.\d*0(?:[eE][+-]?\d+)?$/', $value)) {
                return $value;
            }
            if (filter_var($value, FILTER_VALIDATE_INT, FILTER_FLAG_ALLOW_HEX | FILTER_FLAG_ALLOW_OCTAL)) {
                return intval($value, 0);
            }
            if (filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND | FILTER_FLAG_ALLOW_SCIENTIFIC)) {
                return (float)$value;
            }
            return (float)$value;
        } elseif (is_string($value)) {
            //if (filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))
            //    return (boolean)$value;
            if (strcasecmp($value, 'on') === 0 || strcasecmp($value, 'true') === 0 || strcasecmp($value, 'yes') === 0) {
                return (bool)true;
            }
            if (strcasecmp($value, 'off') === 0 || strcasecmp($value, 'false') === 0 || strcasecmp($value, 'no') === 0) {
                return (bool)false;
            }
            if ($value == htmlspecialchars($value)) {
                return (string)$value;
            }
            if (filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE)) {
                return (string)htmlspecialchars($value, ENT_QUOTES);
            }
            throw new PAMIException("Incoming String is not sanitary. Skipping: '" . $value . "'\n");
        } else {
            throw new PAMIException("Don't know how to convert: '" . $value . "'\n");
        }
    }

    /**
     * Adds a variable to this message. The value is stored unsanitized.
     *
     * @param string $key   Key name (i.e: Action).
     * @param string $value Key value.
     *
     * @return void
     */
    protected function setKey($key, $value)
    {
        $key = strtolower((string)$key);
        $this->keys[$key] = (string)$value;
    }

    /**
     * @deprecated Use setKey() instead. 
     */
    protected function setSanitizedKey($key, $value)
    {
        $this->setKey($key, $value);
    }

    /**
     * Returns a key by name, sanitized.
     *
     * ActionId, Uniqueid and Linkedid are returned as stored so identifiers
     * are not rewritten.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return string
     */
    public function getKey($key)
    {
        $key = strtolower($key);
        if (!array_key_exists($key, $this->keys)) {
            return null;
        }
        $value = $this->keys[$key];
        if ($key === 'actionid' || $key === 'uniqueid' || $key === 'linkedid') {
            return $value;
        }
        if (is_array($value)) {
            $sanitized = [];
            foreach ($value as $item) {
                $sanitizedItem = $this->sanitizeInput($item);
                $sanitized[] = $sanitizedItem === null ? '' : (string)$sanitizedItem;
            }
            return $sanitized;
        }
        return $this->sanitizeInput($value);
    }

    /**
     * Returns a key by name as stored, without sanitation.
     *
     * Repeated Output lines are returned as an array of the original strings.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return string
     */
    public function getStringKey($key): ?string
    {
        $key = strtolower($key);
        if (!array_key_exists($key, $this->keys)) {
            return null;
        }

        if (is_array($this->keys[$key])) {
            return implode("\n", $this->keys[$key]);
        }
        return (string) $this->keys[$key];
    }

    /**
     * Returns a key by name.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return string
     */
    public function getBoolKey($key)
    {
        $key = strtolower($key);
        if (!array_key_exists($key, $this->keys) || $this->keys[$key] === '') {
            return null;
        }
        return (bool) $this->getKey($key);
    }

    /**
     * Returns all keys for this message.
     *
     * @return string[]
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Returns all variabels for this message.
     *
     * @return string[]
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Returns the end of message token appended to the end of a given message.
     *
     * @param $message
     * @return string
     */
    protected function finishMessage($message)
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
    private function serializeVariable($key, $value)
    {
        return "Variable: $key=$value";
    }

    /**
     * Gives a string representation for this message, ready to be sent to
     * ami.
     *
     * @return string
     */
    public function serialize()
    {
        $result = array();
        foreach ($this->getKeys() as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $singleValue) {
                    $result[] = $k . ': ' . $singleValue;
                }
            } else {
                $result[] = $k . ': ' . $v;
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
     * @return string
     */
    public function getActionID()
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
        $this->lines = array();
        $this->variables = array();
        $this->keys = array();
        $this->createdDate = time();
    }
}
