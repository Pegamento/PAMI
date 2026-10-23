<?php
/**
 * AorList Event
 * isListEntry and Part Action: PJSIPShowAors
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
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * AorList Event
 * isListEntry and Part Action: PJSIPShowAors
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
class AorListEvent extends EventMessage
{
    /**
     * get ObjectType
     *
     * Returns:The object's type. This will always be 'aor'.
     *
     * @return string
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
     * @return string
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * get MinimumExpiration
     *
     * Returns:Minimum keep alive time for an AoR
     *
     * @return string
     */
    public function getMinimumExpiration()
    {
        return $this->getKey('MinimumExpiration');
    }

    /**
     * get MaximumExpiration
     *
     * Returns:Maximum time to keep an AoR
     *
     * @return string
     */
    public function getMaximumExpiration()
    {
        return $this->getKey('MaximumExpiration');
    }

    /**
     * get DefaultExpiration
     *
     * Returns:Default expiration time in seconds for contacts that are dynamically bound to an AoR.
     *
     * @return string
     */
    public function getDefaultExpiration()
    {
        return $this->getKey('DefaultExpiration');
    }

    /**
     * get QualifyFrequency
     *
     * Returns:Interval at which to qualify an AoR
     *
     * @return string
     */
    public function getQualifyFrequency()
    {
        return $this->getKey('QualifyFrequency');
    }

    /**
     * get AuthenticateQualify
     *
     * Returns:Authenticates a qualify challenge response if needed
     *
     * @return string
     */
    public function getAuthenticateQualify()
    {
        return $this->getKey('AuthenticateQualify');
    }

    /**
     * get MaxContacts
     *
     * Returns:Maximum number of contacts that can bind to an AoR
     *
     * @return string
     */
    public function getMaxContacts()
    {
        return $this->getKey('MaxContacts');
    }

    /**
     * get RemoveExisting
     *
     * Returns:Determines whether new contacts replace existing ones.
     *
     * @return string
     */
    public function getRemoveExisting()
    {
        return $this->getKey('RemoveExisting');
    }

    /**
     * get Mailboxes
     *
     * Returns:Allow subscriptions for the specified mailbox(es)
     *
     * @return string
     */
    public function getMailboxes()
    {
        return $this->getKey('Mailboxes');
    }

    /**
     * get OutboundProxy
     *
     * Returns:Outbound proxy used when sending OPTIONS request
     *
     * @return string
     */
    public function getOutboundProxy()
    {
        return $this->getKey('OutboundProxy');
    }

    /**
     * get SupportPath
     *
     * Returns:Enables Path support for REGISTER requests and Route support for other requests.
     *
     * @return string
     */
    public function getSupportPath()
    {
        return $this->getKey('SupportPath');
    }
}
