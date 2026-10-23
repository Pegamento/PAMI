<?php
/**
 * BridgeVideoSourceUpdate Event
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
 * BridgeVideoSourceUpdate Event
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
class BridgeVideoSourceUpdateEvent extends EventMessage
{
    /**
     * get BridgeUniqueid
     *
     * Returns key: 'BridgeUniqueid'
     *
     * @return string
     */
    public function getBridgeUniqueid()
    {
        return $this->getKey('BridgeUniqueid');
    }

    /**
     * get BridgeType
     *
     * Returns:The type of bridge
     *
     * @return string
     */
    public function getBridgeType()
    {
        return $this->getKey('BridgeType');
    }

    /**
     * get BridgeTechnology
     *
     * Returns:Technology in use by the bridge
     *
     * @return string
     */
    public function getBridgeTechnology()
    {
        return $this->getKey('BridgeTechnology');
    }

    /**
     * get BridgeCreator
     *
     * Returns:Entity that created the bridge if applicable
     *
     * @return string
     */
    public function getBridgeCreator()
    {
        return $this->getKey('BridgeCreator');
    }

    /**
     * get BridgeName
     *
     * Returns:Name used to refer to the bridge by its BridgeCreator if applicable
     *
     * @return string
     */
    public function getBridgeName()
    {
        return $this->getKey('BridgeName');
    }

    /**
     * get BridgeNumChannels
     *
     * Returns:Number of channels in the bridge
     *
     * @return string
     */
    public function getBridgeNumChannels()
    {
        return $this->getKey('BridgeNumChannels');
    }

    /**
     * get BridgeVideoSourceMode
     *
     * Returns:The video source mode for the bridge.
     *
     * @return string
     */
    public function getBridgeVideoSourceMode()
    {
        return $this->getKey('BridgeVideoSourceMode');
    }

    /**
     * get BridgeVideoSource
     *
     * Returns:If there is a video source for the bridge, the unique ID of the channel that is the video source.
     *
     * @return string
     */
    public function getBridgeVideoSource()
    {
        return $this->getKey('BridgeVideoSource');
    }

    /**
     * get BridgePreviousVideoSource
     *
     * Returns:The unique ID of the channel that was the video source.
     *
     * @return string
     */
    public function getBridgePreviousVideoSource()
    {
        return $this->getKey('BridgePreviousVideoSource');
    }
}
