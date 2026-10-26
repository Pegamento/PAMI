<?php

/**
 * UserEventAction action message.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Niklas Larsson <niklas@tese.se>
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

namespace PAMI\Message\Action;

/**
 * UserEventAction action message.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Niklas Larsson <niklas@tese.se>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class UserEventAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $userevent Event
     * @param array<string, string|int|float|bool|null>|null $valuesArr
     * @return void
     */
    public function __construct(string $userevent, ?array $valuesArr = null)
    {
        parent::__construct('UserEvent');
        $this->setKey('UserEvent', $userevent);

        if (is_array($valuesArr) && $valuesArr) {
            foreach ($valuesArr as $key => $value) {
                $this->setKey($key, $value);
            }
        }
    }
}
