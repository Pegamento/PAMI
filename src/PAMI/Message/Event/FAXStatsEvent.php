<?php
/**
 * FAXStats Event
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
 * FAXStats Event
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
class FAXStatsEvent extends EventMessage
{
    /**
     * get CurrentSessions
     *
     * Returns:Number of active FAX sessions
     *
     * @return string
     */
    public function getCurrentSessions()
    {
        return $this->getKey('CurrentSessions');
    }

    /**
     * get ReservedSessions
     *
     * Returns:Number of reserved FAX sessions
     *
     * @return string
     */
    public function getReservedSessions()
    {
        return $this->getKey('ReservedSessions');
    }

    /**
     * get TransmitAttempts
     *
     * Returns:Total FAX sessions for which Asterisk is/was the transmitter
     *
     * @return string
     */
    public function getTransmitAttempts()
    {
        return $this->getKey('TransmitAttempts');
    }

    /**
     * get ReceiveAttempts
     *
     * Returns:Total FAX sessions for which Asterisk is/was the recipient
     *
     * @return string
     */
    public function getReceiveAttempts()
    {
        return $this->getKey('ReceiveAttempts');
    }

    /**
     * get CompletedFAXes
     *
     * Returns:Total FAX sessions which have been completed successfully
     *
     * @return string
     */
    public function getCompletedFAXes()
    {
        return $this->getKey('CompletedFAXes');
    }

    /**
     * get FailedFAXes
     *
     * Returns:Total FAX sessions which failed to complete successfully
     *
     * @return string
     */
    public function getFailedFAXes()
    {
        return $this->getKey('FailedFAXes');
    }
}
