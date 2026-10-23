<?php
/**
 * Event from PJSIPShowRegistrationsOutbound
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
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
 * Event from PJSIPShowRegistrationsOutbound
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
class OutboundRegistrationDetailEvent extends EventMessage
{
    /**
     * Returns key: 'ObjectType'.
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
    }

    /**
     * Returns key: 'ObjectName'.
     *
     * @return string
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Returns key: 'SupportPath'.
     *
     * @return string
     */
    public function getSupportPath()
    {
        return $this->getKey('SupportPath');
    }

    /**
     * Returns key: 'AuthRejectionPermanent'.
     *
     * @return string
     */
    public function getAuthRejectionPermanent()
    {
        return $this->getKey('AuthRejectionPermanent');
    }

    /**
     * Returns key: 'ServerUri'.
     *
     * @return string
     */
    public function getServerUri()
    {
        return $this->getKey('ServerUri');
    }

    /**
     * Returns key: 'ClientUri'.
     *
     * @return string
     */
    public function getClientUri()
    {
        return $this->getKey('ClientUri');
    }

    /**
     * Returns key: 'RetryInterval'.
     *
     * @return string
     */
    public function getRetryInterval()
    {
        return $this->getKey('RetryInterval');
    }

    /**
     * Returns key: 'MaxRetries'.
     *
     * @return string
     */
    public function getMaxRetries()
    {
        return $this->getKey('MaxRetries');
    }

    /**
     * Returns key: 'OutboundProxy'.
     *
     * @return string
     */
    public function getOutboundProxy()
    {
        return $this->getKey('OutboundProxy');
    }

    /**
     * Returns key: 'Transport'.
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->getKey('Transport');
    }

    /**
     * Returns key: 'ForbiddenRetryInterval'.
     *
     * @return string
     */
    public function getForbiddenRetryInterval()
    {
        return $this->getKey('ForbiddenRetryInterval');
    }

    /**
     * Returns key: 'OutboundAuth'.
     *
     * @return string
     */
    public function getOutboundAuth()
    {
        return $this->getKey('OutboundAuth');
    }

    /**
     * Returns key: 'ContactUser'.
     *
     * @return string
     */
    public function getContactUser()
    {
        return $this->getKey('ContactUser');
    }

    /**
     * Returns key: 'Expiration'.
     *
     * @return string
     */
    public function getExpiration()
    {
        return $this->getKey('Expiration');
    }

    /**
     * Returns key: 'Status'.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'NextReg'.
     *
     * @return string
     */
    public function getNextReg()
    {
        return $this->getKey('NextReg');
    }
}
