<?php

/**
 * Event triggered when a blind transfer is complete.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
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

/**
 * Event triggered when a blind transfer is complete.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class BlindTransferEvent extends EventMessage
{
    public const RESULT_FAIL = 'Fail';
    public const RESULT_INVALID = 'Invalid';
    public const RESULT_NOT_PERMITTED = 'Not Permitted';
    public const RESULT_SUCCESS = 'Success';

    /**
     * Returns key: 'Privilege'.
     *
     * @return string|int|float|bool|null
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Returns key: 'Result'.
     * Result - Indicates if the transfer was successful or if it failed.
     *
     * - Fail - An internal error occurred.
     * - Invalid - Invalid configuration for transfer (e.g. Not bridged)
     * - Not Permitted - Bridge does not permit transfers
     * - Success - Transfer completed successfully
     *
     * @return string|int|float|bool|null
     */
    public function getResult()
    {
        return $this->getKey('Result');
    }

    /**
     * Returns key: 'TransfererChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererChannel()
    {
        return $this->getKey('TransfererChannel');
    }

    /**
     * Returns key: 'TransfererChannelState'.
     * TransfererChannelState - A numeric code for the channel's current state, related to TransfererChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererChannelState()
    {
        return $this->getKey('TransfererChannelState');
    }

    /**
     * Returns key: 'TransfererChannelStateDesc'.
     *
     * Down
     * Rsrvd
     * OffHook
     * Dialing
     * Ring
     * Ringing
     * Up
     * Busy
     * Dialing Offhook
     * Pre-ring
     * Unknown
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererChannelStateDesc()
    {
        return $this->getKey('TransfererChannelStateDesc');
    }

    /**
     * Returns key: 'TransfererCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererCallerIDNum()
    {
        return $this->getKey('TransfererCallerIDNum');
    }

    /**
     * Returns key: 'TransfererCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererCallerIDName()
    {
        return $this->getKey('TransfererCallerIDName');
    }

    /**
     * Returns key: 'TransfererConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererConnectedLineNum()
    {
        return $this->getKey('TransfererConnectedLineNum');
    }

    /**
     * Returns key: 'TransfererConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererConnectedLineName()
    {
        return $this->getKey('TransfererConnectedLineName');
    }

    /**
     * Returns key: 'TransfererAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererAccountCode()
    {
        return $this->getKey('TransfererAccountCode');
    }

    /**
     * Returns key: 'TransfererContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererContext()
    {
        return $this->getKey('TransfererContext');
    }

    /**
     * Returns key: 'TransfererExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererExten()
    {
        return $this->getKey('TransfererExten');
    }

    /**
     * Returns key: 'TransfererPriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererPriority()
    {
        return $this->getKey('TransfererPriority');
    }

    /**
     * Returns key: 'TransfererUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfererUniqueid()
    {
        return $this->getKey('TransfererUniqueid');
    }

    /**
     * Returns key: 'TransfereeChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeChannel()
    {
        return $this->getKey('TransfereeChannel');
    }

    /**
     * Returns key: 'TransfereeChannelState'.
     * TransfereeChannelState - A numeric code for the channel's current state, related to TransfereeChannelStateDesc
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeChannelState()
    {
        return $this->getKey('TransfereeChannelState');
    }

    /**
     * Returns key: 'TransfereeChannelStateDesc'.
     *
     * Down
     * Rsrvd
     * OffHook
     * Dialing
     * Ring
     * Ringing
     * Up
     * Busy
     * Dialing Offhook
     * Pre-ring
     * Unknown
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeChannelStateDesc()
    {
        return $this->getKey('TransfereeChannelStateDesc');
    }

    /**
     * Returns key: 'TransfereeCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeCallerIDNum()
    {
        return $this->getKey('TransfereeCallerIDNum');
    }

    /**
     * Returns key: 'TransfereeCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeCallerIDName()
    {
        return $this->getKey('TransfereeCallerIDName');
    }

    /**
     * Returns key: 'TransfereeConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeConnectedLineNum()
    {
        return $this->getKey('TransfereeConnectedLineNum');
    }

    /**
     * Returns key: 'TransfereeConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeConnectedLineName()
    {
        return $this->getKey('TransfereeConnectedLineName');
    }

    /**
     * Returns key: 'TransfereeAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeAccountCode()
    {
        return $this->getKey('TransfereeAccountCode');
    }

    /**
     * Returns key: 'TransfereeContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeContext()
    {
        return $this->getKey('TransfereeContext');
    }

    /**
     * Returns key: 'TransfereeExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeExten()
    {
        return $this->getKey('TransfereeExten');
    }

    /**
     * Returns key: 'TransfereePriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereePriority()
    {
        return $this->getKey('TransfereePriority');
    }

    /**
     * Returns key: 'TransfereeUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getTransfereeUniqueid()
    {
        return $this->getKey('TransfereeUniqueid');
    }

    /**
     * Returns key: 'BridgeUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getBridgeUniqueid()
    {
        return $this->getKey('BridgeUniqueid');
    }

    /**
     * Returns key: 'BridgeType'.
     * BridgeType - The type of bridge
     *
     * @return string|int|float|bool|null
     */
    public function getBridgeType()
    {
        return $this->getKey('BridgeType');
    }

    /**
     * Returns key: 'BridgeTechnology'.
     * BridgeTechnology - Technology in use by the bridge
     *
     * @return string|int|float|bool|null
     */
    public function getBridgeTechnology()
    {
        return $this->getKey('BridgeTechnology');
    }

    /**
     * Returns key: 'BridgeCreator'.
     * BridgeCreator - Entity that created the bridge if applicable
     *
     * @return string|int|float|bool|null
     */
    public function getBridgeCreator()
    {
        return $this->getKey('BridgeCreator');
    }

    /**
     * Returns key: 'BridgeName'.
     * BridgeName - Name used to refer to the bridge by its BridgeCreator if applicable
     *
     * @return string|int|float|bool|null
     */
    public function getBridgeName()
    {
        return $this->getKey('BridgeName');
    }

    /**
     * Returns key: 'BridgeNumChannels'.
     * BridgeNumChannels - Number of channels in the bridge
     *
     * @return string|int|float|bool|null
     */
    public function getBridgeNumChannels()
    {
        return $this->getKey('BridgeNumChannels');
    }

    /**
     * Returns key: 'IsExternal'.
     * IsExternal - Indicates if the transfer was performed outside of Asterisk.
     * For instance, a channel protocol native transfer is external. A DTMF transfer is internal.
     *
     * Yes
     * No
     *
     * @return string|int|float|bool|null
     */
    public function getIsExternal()
    {
        return $this->getKey('IsExternal');
    }

    /**
     * Indicates if the transfer was performed outside of Asterisk.
     * For instance, a channel protocol native transfer is external. A DTMF transfer is internal.
     *
     * @return bool
     */
    public function isExternal()
    {
        return $this->getBoolKey('IsExternal') === true;
    }

    /**
     * Returns key: 'Context'.
     * Context - Destination context for the blind transfer.
     *
     * @return string|int|float|bool|null
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Extension'.
     * Extension - Destination extension for the blind transfer.
     *
     * @return string|int|float|bool|null
     */
    public function getExtension()
    {
        return $this->getKey('Extension');
    }
}
