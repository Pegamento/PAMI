<?php
/**
 * MCID Event
 *
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
 * @version    SVN: $Id$
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
 * MCID Event
 *
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
class MCIDEvent extends EventMessage
{
    /**
     * get Channel
     *
     * Returns key: 'Channel'
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * get ChannelState
     *
     * Returns:A numeric code for the channel's current state, related to ChannelStateDesc
     *
     * @return string
     */
    public function getChannelState()
    {
        return $this->getKey('ChannelState');
    }

    /**
     * get ChannelStateDesc
     *
     * Returns key: 'ChannelStateDesc'
     *
     * @return string
     */
    public function getChannelStateDesc()
    {
        return $this->getKey('ChannelStateDesc');
    }

    /**
     * get CallerIDNum
     *
     * Returns key: 'CallerIDNum'
     *
     * @return string
     */
    public function getCallerIDNum()
    {
        return $this->getKey('CallerIDNum');
    }

    /**
     * get CallerIDName
     *
     * Returns key: 'CallerIDName'
     *
     * @return string
     */
    public function getCallerIDName()
    {
        return $this->getKey('CallerIDName');
    }

    /**
     * get ConnectedLineNum
     *
     * Returns key: 'ConnectedLineNum'
     *
     * @return string
     */
    public function getConnectedLineNum()
    {
        return $this->getKey('ConnectedLineNum');
    }

    /**
     * get ConnectedLineName
     *
     * Returns key: 'ConnectedLineName'
     *
     * @return string
     */
    public function getConnectedLineName()
    {
        return $this->getKey('ConnectedLineName');
    }

    /**
     * get Language
     *
     * Returns key: 'Language'
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->getKey('Language');
    }

    /**
     * get AccountCode
     *
     * Returns key: 'AccountCode'
     *
     * @return string
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * get Context
     *
     * Returns key: 'Context'
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * get Exten
     *
     * Returns key: 'Exten'
     *
     * @return string
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * get Priority
     *
     * Returns key: 'Priority'
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
    }

    /**
     * get Uniqueid
     *
     * Returns key: 'Uniqueid'
     *
     * @return string
     */
    public function getUniqueid()
    {
        return $this->getKey('Uniqueid');
    }

    /**
     * get Linkedid
     *
     * Returns:Uniqueid of the oldest channel associated with this channel.
     *
     * @return string
     */
    public function getLinkedid()
    {
        return $this->getKey('Linkedid');
    }

    /**
     * get MCallerIDNumValid
     *
     * Returns key: 'MCallerIDNumValid'
     *
     * @return string
     */
    public function getMCallerIDNumValid()
    {
        return $this->getKey('MCallerIDNumValid');
    }

    /**
     * get MCallerIDNum
     *
     * Returns key: 'MCallerIDNum'
     *
     * @return string
     */
    public function getMCallerIDNum()
    {
        return $this->getKey('MCallerIDNum');
    }

    /**
     * get MCallerIDton
     *
     * Returns key: 'MCallerIDton'
     *
     * @return string
     */
    public function getMCallerIDton()
    {
        return $this->getKey('MCallerIDton');
    }

    /**
     * get MCallerIDNumPlan
     *
     * Returns key: 'MCallerIDNumPlan'
     *
     * @return string
     */
    public function getMCallerIDNumPlan()
    {
        return $this->getKey('MCallerIDNumPlan');
    }

    /**
     * get MCallerIDNumPres
     *
     * Returns key: 'MCallerIDNumPres'
     *
     * @return string
     */
    public function getMCallerIDNumPres()
    {
        return $this->getKey('MCallerIDNumPres');
    }

    /**
     * get MCallerIDNameValid
     *
     * Returns key: 'MCallerIDNameValid'
     *
     * @return string
     */
    public function getMCallerIDNameValid()
    {
        return $this->getKey('MCallerIDNameValid');
    }

    /**
     * get MCallerIDName
     *
     * Returns key: 'MCallerIDName'
     *
     * @return string
     */
    public function getMCallerIDName()
    {
        return $this->getKey('MCallerIDName');
    }

    /**
     * get MCallerIDNameCharSet
     *
     * Returns key: 'MCallerIDNameCharSet'
     *
     * @return string
     */
    public function getMCallerIDNameCharSet()
    {
        return $this->getKey('MCallerIDNameCharSet');
    }

    /**
     * get MCallerIDNamePres
     *
     * Returns key: 'MCallerIDNamePres'
     *
     * @return string
     */
    public function getMCallerIDNamePres()
    {
        return $this->getKey('MCallerIDNamePres');
    }

    /**
     * get MCallerIDSubaddr
     *
     * Returns key: 'MCallerIDSubaddr'
     *
     * @return string
     */
    public function getMCallerIDSubaddr()
    {
        return $this->getKey('MCallerIDSubaddr');
    }

    /**
     * get MCallerIDSubaddrType
     *
     * Returns key: 'MCallerIDSubaddrType'
     *
     * @return string
     */
    public function getMCallerIDSubaddrType()
    {
        return $this->getKey('MCallerIDSubaddrType');
    }

    /**
     * get MCallerIDSubaddrOdd
     *
     * Returns key: 'MCallerIDSubaddrOdd'
     *
     * @return string
     */
    public function getMCallerIDSubaddrOdd()
    {
        return $this->getKey('MCallerIDSubaddrOdd');
    }

    /**
     * get MCallerIDPres
     *
     * Returns key: 'MCallerIDPres'
     *
     * @return string
     */
    public function getMCallerIDPres()
    {
        return $this->getKey('MCallerIDPres');
    }

    /**
     * get MConnectedIDNumValid
     *
     * Returns key: 'MConnectedIDNumValid'
     *
     * @return string
     */
    public function getMConnectedIDNumValid()
    {
        return $this->getKey('MConnectedIDNumValid');
    }

    /**
     * get MConnectedIDNum
     *
     * Returns key: 'MConnectedIDNum'
     *
     * @return string
     */
    public function getMConnectedIDNum()
    {
        return $this->getKey('MConnectedIDNum');
    }

    /**
     * get MConnectedIDton
     *
     * Returns key: 'MConnectedIDton'
     *
     * @return string
     */
    public function getMConnectedIDton()
    {
        return $this->getKey('MConnectedIDton');
    }

    /**
     * get MConnectedIDNumPlan
     *
     * Returns key: 'MConnectedIDNumPlan'
     *
     * @return string
     */
    public function getMConnectedIDNumPlan()
    {
        return $this->getKey('MConnectedIDNumPlan');
    }

    /**
     * get MConnectedIDNumPres
     *
     * Returns key: 'MConnectedIDNumPres'
     *
     * @return string
     */
    public function getMConnectedIDNumPres()
    {
        return $this->getKey('MConnectedIDNumPres');
    }

    /**
     * get MConnectedIDNameValid
     *
     * Returns key: 'MConnectedIDNameValid'
     *
     * @return string
     */
    public function getMConnectedIDNameValid()
    {
        return $this->getKey('MConnectedIDNameValid');
    }

    /**
     * get MConnectedIDName
     *
     * Returns key: 'MConnectedIDName'
     *
     * @return string
     */
    public function getMConnectedIDName()
    {
        return $this->getKey('MConnectedIDName');
    }

    /**
     * get MConnectedIDNameCharSet
     *
     * Returns key: 'MConnectedIDNameCharSet'
     *
     * @return string
     */
    public function getMConnectedIDNameCharSet()
    {
        return $this->getKey('MConnectedIDNameCharSet');
    }

    /**
     * get MConnectedIDNamePres
     *
     * Returns key: 'MConnectedIDNamePres'
     *
     * @return string
     */
    public function getMConnectedIDNamePres()
    {
        return $this->getKey('MConnectedIDNamePres');
    }

    /**
     * get MConnectedIDSubaddr
     *
     * Returns key: 'MConnectedIDSubaddr'
     *
     * @return string
     */
    public function getMConnectedIDSubaddr()
    {
        return $this->getKey('MConnectedIDSubaddr');
    }

    /**
     * get MConnectedIDSubaddrType
     *
     * Returns key: 'MConnectedIDSubaddrType'
     *
     * @return string
     */
    public function getMConnectedIDSubaddrType()
    {
        return $this->getKey('MConnectedIDSubaddrType');
    }

    /**
     * get MConnectedIDSubaddrOdd
     *
     * Returns key: 'MConnectedIDSubaddrOdd'
     *
     * @return string
     */
    public function getMConnectedIDSubaddrOdd()
    {
        return $this->getKey('MConnectedIDSubaddrOdd');
    }

    /**
     * get MConnectedIDPres
     *
     * Returns key: 'MConnectedIDPres'
     *
     * @return string
     */
    public function getMConnectedIDPres()
    {
        return $this->getKey('MConnectedIDPres');
    }
}
