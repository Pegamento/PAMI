<?php

/**
 * Event triggered when a call is transfered.
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
 * Event triggered when an attended transfer is complete.
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
class AttendedTransferEvent extends EventMessage
{
    public const RESULT_FAIL = 'Fail';
    public const RESULT_INVALID = 'Invalid';
    public const RESULT_NOT_PERMITTED = 'Not Permitted';
    public const RESULT_SUCCESS = 'Success';

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
     * Returns key: 'OrigTransfererChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererChannel()
    {
        return $this->getKey('OrigTransfererChannel');
    }

    /**
     * Returns key: 'OrigTransfererChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererChannelState()
    {
        return $this->getKey('OrigTransfererChannelState');
    }

    /**
     * Returns key: 'OrigTransfererChannelStateDesc'.
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
    public function getOrigTransfererChannelStateDesc()
    {
        return $this->getKey('OrigTransfererChannelStateDesc');
    }

    /**
     * Returns key: 'OrigTransfererCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererCallerIDNum()
    {
        return $this->getKey('OrigTransfererCallerIDNum');
    }

    /**
     * Returns key: 'OrigTransfererCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererCallerIDName()
    {
        return $this->getKey('OrigTransfererCallerIDName');
    }

    /**
     * Returns key: 'OrigTransfererConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererConnectedLineNum()
    {
        return $this->getKey('OrigTransfererConnectedLineNum');
    }

    /**
     * Returns key: 'OrigTransfererConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererConnectedLineName()
    {
        return $this->getKey('OrigTransfererConnectedLineName');
    }

    /**
     * Returns key: 'OrigTransfererAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererAccountCode()
    {
        return $this->getKey('OrigTransfererAccountCode');
    }

    /**
     * Returns key: 'OrigTransfererContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererContext()
    {
        return $this->getKey('OrigTransfererContext');
    }

    /**
     * Returns key: 'OrigTransfererExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererExten()
    {
        return $this->getKey('OrigTransfererExten');
    }

    /**
     * Returns key: 'OrigTransfererPriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererPriority()
    {
        return $this->getKey('OrigTransfererPriority');
    }

    /**
     * Returns key: 'OrigTransfererUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigTransfererUniqueid()
    {
        return $this->getKey('OrigTransfererUniqueid');
    }

    /**
     * Returns key: 'OrigBridgeUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigBridgeUniqueid()
    {
        return $this->getKey('OrigBridgeUniqueid');
    }

    /**
     * Returns key: 'OrigBridgeType'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigBridgeType()
    {
        return $this->getKey('OrigBridgeType');
    }

    /**
     * Returns key: 'OrigBridgeTechnology'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigBridgeTechnology()
    {
        return $this->getKey('OrigBridgeTechnology');
    }

    /**
     * Returns key: 'OrigBridgeCreator'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigBridgeCreator()
    {
        return $this->getKey('OrigBridgeCreator');
    }

    /**
     * Returns key: 'OrigBridgeName'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigBridgeName()
    {
        return $this->getKey('OrigBridgeName');
    }

    /**
     * Returns key: 'OrigBridgeNumChannels'.
     *
     * @return string|int|float|bool|null
     */
    public function getOrigBridgeNumChannels()
    {
        return $this->getKey('OrigBridgeNumChannels');
    }

    /**
     * Returns key: 'SecondTransfererChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererChannel()
    {
        return $this->getKey('SecondTransfererChannel');
    }

    /**
     * Returns key: 'SecondTransfererChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererChannelState()
    {
        return $this->getKey('SecondTransfererChannelState');
    }

    /**
     * Returns key: 'SecondTransfererChannelStateDesc'.
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
    public function getSecondTransfererChannelStateDesc()
    {
        return $this->getKey('SecondTransfererChannelStateDesc');
    }

    /**
     * Returns key: 'SecondTransfererCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererCallerIDNum()
    {
        return $this->getKey('SecondTransfererCallerIDNum');
    }

    /**
     * Returns key: 'SecondTransfererCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererCallerIDName()
    {
        return $this->getKey('SecondTransfererCallerIDName');
    }

    /**
     * Returns key: 'SecondTransfererConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererConnectedLineNum()
    {
        return $this->getKey('SecondTransfererConnectedLineNum');
    }

    /**
     * Returns key: 'SecondTransfererConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererConnectedLineName()
    {
        return $this->getKey('SecondTransfererConnectedLineName');
    }

    /**
     * Returns key: 'SecondTransfererAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererAccountCode()
    {
        return $this->getKey('SecondTransfererAccountCode');
    }

    /**
     * Returns key: 'SecondTransfererContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererContext()
    {
        return $this->getKey('SecondTransfererContext');
    }

    /**
     * Returns key: 'SecondTransfererExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererExten()
    {
        return $this->getKey('SecondTransfererExten');
    }

    /**
     * Returns key: 'SecondTransfererPriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererPriority()
    {
        return $this->getKey('SecondTransfererPriority');
    }

    /**
     * Returns key: 'SecondTransfererUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondTransfererUniqueid()
    {
        return $this->getKey('SecondTransfererUniqueid');
    }

    /**
     * Returns key: 'SecondBridgeUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondBridgeUniqueid()
    {
        return $this->getKey('SecondBridgeUniqueid');
    }

    /**
     * Returns key: 'SecondBridgeType'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondBridgeType()
    {
        return $this->getKey('SecondBridgeType');
    }

    /**
     * Returns key: 'SecondBridgeTechnology'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondBridgeTechnology()
    {
        return $this->getKey('SecondBridgeTechnology');
    }

    /**
     * Returns key: 'SecondBridgeCreator'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondBridgeCreator()
    {
        return $this->getKey('SecondBridgeCreator');
    }

    /**
     * Returns key: 'SecondBridgeName'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondBridgeName()
    {
        return $this->getKey('SecondBridgeName');
    }

    /**
     * Returns key: 'SecondBridgeNumChannels'.
     *
     * @return string|int|float|bool|null
     */
    public function getSecondBridgeNumChannels()
    {
        return $this->getKey('SecondBridgeNumChannels');
    }

    /**
     * Returns key: 'DestType'.
     * DestType - Indicates the method by which the attended transfer completed.
     *
     * Bridge - The transfer was accomplished by merging two bridges into one.
     * App - The transfer was accomplished by having a channel or bridge run a dialplan application.
     * Link - The transfer was accomplished by linking two bridges together using a local channel pair.
     * Threeway - The transfer was accomplished by placing all parties into a threeway call.
     * Fail - The transfer failed.
     *
     * @return string|int|float|bool|null
     */
    public function getDestType()
    {
        return $this->getKey('DestType');
    }

    /**
     * Returns key: 'DestBridgeUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestBridgeUniqueid()
    {
        return $this->getKey('DestBridgeUniqueid');
    }

    /**
     * Returns key: 'DestApp'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestApp()
    {
        return $this->getKey('DestApp');
    }

    /**
     * Returns key: 'LocalOneChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneChannel()
    {
        return $this->getKey('LocalOneChannel');
    }

    /**
     * Returns key: 'LocalOneChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneChannelState()
    {
        return $this->getKey('LocalOneChannelState');
    }

    /**
     * Returns key: 'LocalOneChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneChannelStateDesc()
    {
        return $this->getKey('LocalOneChannelStateDesc');
    }

    /**
     * Returns key: 'LocalOneCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneCallerIDNum()
    {
        return $this->getKey('LocalOneCallerIDNum');
    }

    /**
     * Returns key: 'LocalOneCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneCallerIDName()
    {
        return $this->getKey('LocalOneCallerIDName');
    }

    /**
     * Returns key: 'LocalOneConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneConnectedLineNum()
    {
        return $this->getKey('LocalOneConnectedLineNum');
    }

    /**
     * Returns key: 'LocalOneConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneConnectedLineName()
    {
        return $this->getKey('LocalOneConnectedLineName');
    }

    /**
     * Returns key: 'LocalOneAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneAccountCode()
    {
        return $this->getKey('LocalOneAccountCode');
    }

    /**
     * Returns key: 'LocalOneContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneContext()
    {
        return $this->getKey('LocalOneContext');
    }

    /**
     * Returns key: 'LocalOneExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneExten()
    {
        return $this->getKey('LocalOneExten');
    }

    /**
     * Returns key: 'LocalOnePriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOnePriority()
    {
        return $this->getKey('LocalOnePriority');
    }

    /**
     * Returns key: 'LocalOneUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalOneUniqueid()
    {
        return $this->getKey('LocalOneUniqueid');
    }

    /**
     * Returns key: 'LocalTwoChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoChannel()
    {
        return $this->getKey('LocalTwoChannel');
    }

    /**
     * Returns key: 'LocalTwoChannelState'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoChannelState()
    {
        return $this->getKey('LocalTwoChannelState');
    }

    /**
     * Returns key: 'LocalTwoChannelStateDesc'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoChannelStateDesc()
    {
        return $this->getKey('LocalTwoChannelStateDesc');
    }

    /**
     * Returns key: 'LocalTwoCallerIDNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoCallerIDNum()
    {
        return $this->getKey('LocalTwoCallerIDNum');
    }

    /**
     * Returns key: 'LocalTwoCallerIDName'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoCallerIDName()
    {
        return $this->getKey('LocalTwoCallerIDName');
    }

    /**
     * Returns key: 'LocalTwoConnectedLineNum'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoConnectedLineNum()
    {
        return $this->getKey('LocalTwoConnectedLineNum');
    }

    /**
     * Returns key: 'LocalTwoConnectedLineName'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoConnectedLineName()
    {
        return $this->getKey('LocalTwoConnectedLineName');
    }

    /**
     * Returns key: 'LocalTwoAccountCode'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoAccountCode()
    {
        return $this->getKey('LocalTwoAccountCode');
    }

    /**
     * Returns key: 'LocalTwoContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoContext()
    {
        return $this->getKey('LocalTwoContext');
    }

    /**
     * Returns key: 'LocalTwoExten'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoExten()
    {
        return $this->getKey('LocalTwoExten');
    }

    /**
     * Returns key: 'LocalTwoPriority'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoPriority()
    {
        return $this->getKey('LocalTwoPriority');
    }

    /**
     * Returns key: 'LocalTwoUniqueid'.
     *
     * @return string|int|float|bool|null
     */
    public function getLocalTwoUniqueid()
    {
        return $this->getKey('LocalTwoUniqueid');
    }

    /**
     * Returns key: 'DestTransfererChannel'.
     *
     * @return string|int|float|bool|null
     */
    public function getDestTransfererChannel()
    {
        return $this->getKey('DestTransfererChannel');
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
}
