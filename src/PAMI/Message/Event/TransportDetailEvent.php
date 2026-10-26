<?php

/**
 * Event triggered when an agent logs in.
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
 * Copyright 2015 Diederik de Groot <ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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
 * Event triggered when an agent logs in.
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
class TransportDetailEvent extends EventMessage
{
    /**
     * Returns key: 'ObjectType'. The object's type. This will always be 'transport'.
     *
     * @return string|int|float|bool|null
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
    }

    /**
     * Returns key: 'ObjectName'. The name of this object.
     *
     * @return string|int|float|bool|null
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Returns key: 'Protocol'. Protocol to use for SIP traffic
     *
     * @return string|int|float|bool|null
     */
    public function getProtocol()
    {
        return $this->getKey('Protocol');
    }

    /**
     * Returns key: 'Bind'. IP Address and optional port to bind to for this transport
     *
     * @return string|int|float|bool|null
     */
    public function getBind()
    {
        return $this->getKey('Bind');
    }

    /**
     * Returns key: 'AsycOperations'. Number of simultaneous Asynchronous Operations
     *
     * @return string|int|float|bool|null
     */
    public function getAsycOperations()
    {
        return $this->getKey('AsycOperations');
    }

    /**
     * Returns key: 'CaListFile'. File containing a list of certificates to read (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getCaListFile()
    {
        return $this->getKey('CaListFile');
    }

    /**
     * Returns key: 'CaListPath'. Path to directory containing a list of certificates to read (TLSONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getCaListPath()
    {
        return $this->getKey('CaListPath');
    }

    /**
     * Returns key: 'CertFile'. Certificate file for endpoint (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getCertFile()
    {
        return $this->getKey('CertFile');
    }

    /**
     * Returns key: 'PrivKeyFile'. Private key file (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getPrivKeyFile()
    {
        return $this->getKey('PrivKeyFile');
    }

    /**
     * Returns key: 'Password'. Password required for transport
     *
     * @return string|int|float|bool|null
     */
    public function getPassword()
    {
        return $this->getKey('Password');
    }

    /**
     * Returns key: 'ExternalSignalingAddress'. External address for SIP signalling
     *
     * @return string|int|float|bool|null
     */
    public function getExternalSignalingAddress()
    {
        return $this->getKey('ExternalSignalingAddress');
    }

    /**
     * Returns key: 'ExternalSignalingPort'. External port for SIP signalling
     *
     * @return string|int|float|bool|null
     */
    public function getExternalSignalingPort()
    {
        return $this->getKey('ExternalSignalingPort');
    }

    /**
     * Returns key: 'ExternalMediaAddress'. External IP address to use in RTP handling
     *
     * @return string|int|float|bool|null
     */
    public function getExternalMediaAddress()
    {
        return $this->getKey('ExternalMediaAddress');
    }

    /**
     * Returns key: 'Domain'. Domain the transport comes from
     *
     * @return string|int|float|bool|null
     */
    public function getDomain()
    {
        return $this->getKey('Domain');
    }

    /**
     * Returns key: 'VerifyServer'. Require verification of server certificate (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getVerifyServer()
    {
        return $this->getKey('VerifyServer');
    }

    /**
     * Returns key: 'VerifyClient'. Require verification of client certificate (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getVerifyClient()
    {
        return $this->getKey('VerifyClient');
    }

    /**
     * Returns key: 'RequireClientCert'. Require client certificate (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getRequireClientCert()
    {
        return $this->getKey('RequireClientCert');
    }

    /**
     * Returns key: 'Method'. Method of SSL transport (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getMethod()
    {
        return $this->getKey('Method');
    }

    /**
     * Returns key: 'Cipher'. Preferred cryptography cipher names (TLS ONLY)
     *
     * @return string|int|float|bool|null
     */
    public function getCipher()
    {
        return $this->getKey('Cipher');
    }

    /**
     * Returns key: 'LocalNet'. Network to consider local (used for NAT purposes).
     *
     * @return string|int|float|bool|null
     */
    public function getLocalNet()
    {
        return $this->getKey('LocalNet');
    }

    /**
     * Returns key: 'Tos'. Enable TOS for the signalling sent over this transport
     *
     * @return string|int|float|bool|null
     */
    public function getTos()
    {
        return $this->getKey('Tos');
    }

    /**
     * Returns key: 'Cos'. Enable COS for the signalling sent over this transport
     *
     * @return string|int|float|bool|null
     */
    public function getCos()
    {
        return $this->getKey('Cos');
    }

    /**
     * Returns key: 'WebsocketWriteTimeout'. The timeout (in milliseconds) to set on WebSocket connections.
     *
     * @return string|int|float|bool|null
     */
    public function getWebsocketWriteTimeout()
    {
        return $this->getKey('WebsocketWriteTimeout');
    }

    /**
     * Returns key: 'EndpointName'. The name of the endpoint associated with this information.
     *
     * @return string|int|float|bool|null
     */
    public function getEndpointName()
    {
        return $this->getKey('EndpointName');
    }
}
