<?php
/**
 * FAXSession Event
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
 * FAXSession Event
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
class FAXSessionEvent extends EventMessage
{
    /**
     * get SessionNumber
     *
     * Returns:The numerical identifier for this particular session
     *
     * @return string
     */
    public function getSessionNumber()
    {
        return $this->getKey('SessionNumber');
    }

    /**
     * get Operation
     *
     * Returns:FAX session operation type
     *
     * @return string
     */
    public function getOperation()
    {
        return $this->getKey('Operation');
    }

    /**
     * get State
     *
     * Returns:Current state of the FAX session
     *
     * @return string
     */
    public function getState()
    {
        return $this->getKey('State');
    }

    /**
     * get ErrorCorrectionMode
     *
     * Returns:Whether error correcting mode is enabled for the FAX session. This field is not included when operation is 'V.21 Detect' or if operation is 'gateway' and state is 'Uninitialized'
     *
     * @return string
     */
    public function getErrorCorrectionMode()
    {
        return $this->getKey('ErrorCorrectionMode');
    }

    /**
     * get DataRate
     *
     * Returns:Bit rate of the FAX. This field is not included when operation is 'V.21 Detect' or if operation is 'gateway' and state is 'Uninitialized'.
     *
     * @return string
     */
    public function getDataRate()
    {
        return $this->getKey('DataRate');
    }

    /**
     * get ImageResolution
     *
     * Returns:Resolution of each page of the FAX. Will be in the format of X_RESxY_RES. This field is not included if the operation is anything other than Receive/Transmit.
     *
     * @return string
     */
    public function getImageResolution()
    {
        return $this->getKey('ImageResolution');
    }

    /**
     * get PageNumber
     *
     * Returns:Current number of pages transferred during this FAX session. May change as the FAX progresses. This field is not included when operation is 'V.21 Detect' or if operation is 'gateway' and state is 'Uninitialized'.
     *
     * @return string
     */
    public function getPageNumber()
    {
        return $this->getKey('PageNumber');
    }

    /**
     * get FileName
     *
     * Returns:Filename of the image being sent/received for this FAX session. This field is not included if Operation isn't 'send' or 'receive'.
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->getKey('FileName');
    }

    /**
     * get PagesTransmitted
     *
     * Returns:Total number of pages sent during this session. This field is not included if Operation isn't 'send' or 'receive'. Will always be 0 for 'receive'.
     *
     * @return string
     */
    public function getPagesTransmitted()
    {
        return $this->getKey('PagesTransmitted');
    }

    /**
     * get PagesReceived
     *
     * Returns:Total number of pages received during this session. This field is not included if Operation is not 'send' or 'receive'. Will be 0 for 'send'.
     *
     * @return string
     */
    public function getPagesReceived()
    {
        return $this->getKey('PagesReceived');
    }

    /**
     * get TotalBadLines
     *
     * Returns:Total number of bad lines sent/received during this session. This field is not included if Operation is not 'send' or 'received'.
     *
     * @return string
     */
    public function getTotalBadLines()
    {
        return $this->getKey('TotalBadLines');
    }
}
