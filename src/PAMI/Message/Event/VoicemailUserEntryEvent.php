<?php

/**
 * Event triggered when issuing a VoicemailUsersList action.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
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
 * Event triggered when issuing a VoicemailUsersList action.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class VoicemailUserEntryEvent extends EventMessage
{
    /**
     * Returns key: 'NewMessageCount'.
     *
     * @return string|int|float|bool|null
     */
    public function getNewMessageCount()
    {
        return $this->getKey('NewMessageCount');
    }

    /**
     * Returns key: 'MaxMessageLength'.
     *
     * @return string|int|float|bool|null
     */
    public function getMaxMessageLength()
    {
        return $this->getKey('MaxMessageLength');
    }

    /**
     * Returns key: 'MaxMessageCount'.
     *
     * @return string|int|float|bool|null
     */
    public function getMaxMessageCount()
    {
        return $this->getKey('MaxMessageCount');
    }

    /**
     * Returns key: 'CallOperator'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallOperator()
    {
        return $this->getKey('CallOperator');
    }

    /**
     * Returns key: 'CanReview'.
     *
     * @return string|int|float|bool|null
     */
    public function getCanReview()
    {
        return $this->getKey('CanReview');
    }

    /**
     * Returns key: 'VolumeGain'.
     *
     * @return string|int|float|bool|null
     */
    public function getVolumeGain()
    {
        return $this->getKey('VolumeGain');
    }

    /**
     * Returns key: 'DeleteMessage'.
     *
     * @return string|int|float|bool|null
     */
    public function getDeleteMessage()
    {
        return $this->getKey('DeleteMessage');
    }

    /**
     * Returns key: 'AttachmentFormat'.
     *
     * @return string|int|float|bool|null
     */
    public function getAttachmentFormat()
    {
        return $this->getKey('AttachmentFormat');
    }

    /**
     * Returns key: 'AttachMessage'.
     *
     * @return string|int|float|bool|null
     */
    public function getAttachMessage()
    {
        return $this->getKey('AttachMessage');
    }

    /**
     * Returns key: 'SayCID'.
     *
     * @return string|int|float|bool|null
     */
    public function getSayCID()
    {
        return $this->getKey('SayCID');
    }

    /**
     * Returns key: 'SayEnvelope'.
     *
     * @return string|int|float|bool|null
     */
    public function getSayEnvelope()
    {
        return $this->getKey('SayEnvelope');
    }

    /**
     * Returns key: 'SayDurationMin'.
     *
     * @return string|int|float|bool|null
     */
    public function getSayDurationMin()
    {
        return $this->getKey('SayDurationMin');
    }

    /**
     * Returns key: 'ExitContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getExitContext()
    {
        return $this->getKey('ExitContext');
    }

    /**
     * Returns key: 'UniqueID'.
     *
     * @return string|int|float|bool|null
     */
    public function getUniqueID()
    {
        return $this->getKey('UniqueID');
    }

    /**
     * Returns key: 'DialOut'.
     *
     * @return string|int|float|bool|null
     */
    public function getDialOut()
    {
        return $this->getKey('DialOut');
    }

    /**
     * Returns key: 'Callback'.
     *
     * @return string|int|float|bool|null
     */
    public function getCallback()
    {
        return $this->getKey('Callback');
    }

    /**
     * Returns key: 'Timezone'.
     *
     * @return string|int|float|bool|null
     */
    public function getTimezone()
    {
        return $this->getKey('Timezone');
    }

    /**
     * Returns key: 'Language'.
     *
     * @return string|int|float|bool|null
     */
    public function getLanguage()
    {
        return $this->getKey('Language');
    }

    /**
     * Returns key: 'MailCommand'.
     *
     * @return string|int|float|bool|null
     */
    public function getMailCommand()
    {
        return $this->getKey('MailCommand');
    }

    /**
     * Returns key: 'ServerEmail'.
     *
     * @return string|int|float|bool|null
     */
    public function getServerEmail()
    {
        return $this->getKey('ServerEmail');
    }

    /**
     * Returns key: 'Pager'.
     *
     * @return string|int|float|bool|null
     */
    public function getPager()
    {
        return $this->getKey('Pager');
    }

    /**
     * Returns key: 'Email'.
     *
     * @return string|int|float|bool|null
     */
    public function getEmail()
    {
        return $this->getKey('Email');
    }

    /**
     * Returns key: 'Fullname'.
     *
     * @return string|int|float|bool|null
     */
    public function getFullname()
    {
        return $this->getKey('Fullname');
    }

    /**
     * Returns key: 'VoicemailBox'.
     *
     * @return string|int|float|bool|null
     */
    public function getVoicemailBox()
    {
        return $this->getKey('VoicemailBox');
    }

    /**
     * Returns key: 'VmContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getVoicemailContext()
    {
        return $this->getKey('VmContext');
    }
}
