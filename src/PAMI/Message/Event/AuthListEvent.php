<?php

/**
 * AuthList Event
 * isListEntry and Part Action: PJSIPShowAuths
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
 * AuthList Event
 * isListEntry and Part Action: PJSIPShowAuths
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
class AuthListEvent extends EventMessage
{
    /**
     * get ObjectType
     *
     * Returns:The object's type. This will always be 'auth'.
     *
     * @return string|int|float|bool|null
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
    }

    /**
     * get ObjectName
     *
     * Returns:The name of this object.
     *
     * @return string|int|float|bool|null
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * get Username
     *
     * Returns:Username to use for account
     *
     * @return string|int|float|bool|null
     */
    public function getUsername()
    {
        return $this->getKey('Username');
    }

    /**
     * get Md5Cred
     *
     * Returns:MD5 Hash used for authentication.
     *
     * @return string|int|float|bool|null
     */
    public function getMd5Cred()
    {
        return $this->getKey('Md5Cred');
    }

    /**
     * get Realm
     *
     * Returns:SIP realm for endpoint
     *
     * @return string|int|float|bool|null
     */
    public function getRealm()
    {
        return $this->getKey('Realm');
    }

    /**
     * get AuthType
     *
     * Returns:Authentication type
     *
     * @return string|int|float|bool|null
     */
    public function getAuthType()
    {
        return $this->getKey('AuthType');
    }

    /**
     * get Password
     *
     * Returns:Plain text password used for authentication.
     *
     * @return string|int|float|bool|null
     */
    public function getPassword()
    {
        return $this->getKey('Password');
    }

    /**
     * get NonceLifetime
     *
     * Returns:Lifetime of a nonce associated with this authentication config.
     *
     * @return string|int|float|bool|null
     */
    public function getNonceLifetime()
    {
        return $this->getKey('NonceLifetime');
    }
}
