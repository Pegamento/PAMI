<?php

/**
 * Event triggered when an action ShowDialPlan is issued.
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

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when an action ShowDialPlan is issued.
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
class ListDialplanEvent extends EventMessage
{
    /**
     * Returns key: 'Context'.
     *
     * @return string|int|float|bool|null
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Extension'.
     *
     * @return string|int|float|bool|null
     */
    public function getExtension()
    {
        return $this->getKey('Extension');
    }

    /**
     * Returns key: 'Priority'.
     *
     * @return string|int|float|bool|null
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
    }

    /**
     * Returns key: 'Application'.
     *
     * @return string|int|float|bool|null
     */
    public function getApplication()
    {
        return $this->getKey('Application');
    }

    /**
     * Returns key: 'AppData'.
     *
     * @return string|int|float|bool|null
     */
    public function getApplicationData()
    {
        return $this->getKey('AppData');
    }

    /**
     * Returns key: 'Registrar'.
     *
     * @return string|int|float|bool|null
     */
    public function getRegistrar()
    {
        return $this->getKey('Registrar');
    }

    /**
     * Returns key: 'IncludeContext'.
     *
     * @return string|int|float|bool|null
     */
    public function getIncludeContext()
    {
        return $this->getKey('IncludeContext');
    }
}
