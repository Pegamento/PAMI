<?php
/**
 * Event from PJSIPShowEndpoint
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Niklas Larsson <niklas@tese.se>, Marcelo Gornstein <marcelog@gmail.com>
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
 * Event from PJSIPShowEndpoint
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class AuthDetailEvent extends EventMessage
{

    /**
     * Returns key: 'ObjectType'. The object's type. This will always be 'auth'.
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
    }

    /**
     * Returns key: 'ObjectName'. The name of this object.
     *
     * @return string
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Returns key: 'Username'. Username to use for account
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->getKey('Username');
    }

    /**
     * Returns key: 'Password'. Username to use for account
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->getKey('Password');
    }

    /**
     * Returns key: 'Md5Cred'. MD5 Hash used for authentication.
     *
     * @return string
     */
    public function getMd5Cred()
    {
        return $this->getKey('Md5Cred');
    }

    /**
     * Returns key: 'Realm'. SIP realm for endpoint
     *
     * @return string
     */
    public function getRealm()
    {
        return $this->getKey('Realm');
    }

    /**
     * Returns key: 'NonceLifetime'. Lifetime of a nonce associated with this authentication config.
     *
     * @return string
     */
    public function getNonceLifetime()
    {
        return $this->getKey('NonceLifetime');
    }

    /**
     * Returns key: 'AuthType'. Authentication type
     *
     * @return string
     */
    public function getAuthType()
    {
        return $this->getKey('AuthType');
    }

    /**
     * Returns key: 'EndpointName'. The name of the endpoint associated with this information.
     *
     * @return string
     */
    public function getEndpointName()
    {
        return $this->getKey('EndpointName');
    }
}
