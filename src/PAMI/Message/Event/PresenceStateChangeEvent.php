<?php
/**
 * PresenceStateChange Event
 * isListEntry and Part Action: PresenceStateList
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
 * PresenceStateChange Event
 * isListEntry and Part Action: PresenceStateList
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
class PresenceStateChangeEvent extends EventMessage
{
    /**
     * get Presentity
     *
     * Returns:The entity whose presence state has changed
     *
     * @return string
     */
    public function getPresentity()
    {
        return $this->getKey('Presentity');
    }

    /**
     * get Status
     *
     * Returns:The new status of the presentity
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * get Subtype
     *
     * Returns:The new subtype of the presentity
     *
     * @return string
     */
    public function getSubtype()
    {
        return $this->getKey('Subtype');
    }

    /**
     * get Message
     *
     * Returns:The new message of the presentity
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getKey('Message');
    }
}
