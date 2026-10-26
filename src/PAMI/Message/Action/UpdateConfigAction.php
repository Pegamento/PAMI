<?php

/**
 * UpdateConfig action message.
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

namespace PAMI\Message\Action;

use PAMI\Exception\PAMIException;

/**
 *  UpdateConfig action message.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Denis Rybakov <shinomontaz@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class UpdateConfigAction extends ActionMessage
{
    /**
     * Index of the current action tuple. -1 until the first setAction().
     */
    private int $counter = -1;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('UpdateConfig');
    }

    /**
     * Sets Src filename key.
     *
     * @param string $filename.
     *
     * @return void
     */
    public function setSrcFilename(string $filename): void
    {
        $this->setKey('SrcFilename', $filename);
    }

    /**
     * Sets Dst Filename key.
     *
     * @param string $filename.
     *
     * @return void
     */
    public function setDstFilename(string $filename): void
    {
        $this->setKey('DstFilename', $filename);
    }

     /**
     * Sets Reload key.
     *
     * @param bool $reload
     *
     * @return void
     */
    public function setReload(bool $reload): void
    {
        $this->setKey('Reload', $reload ? 'yes' : 'no');
    }

    /**
     * Sets Action-XXXXXX key.
     *
     * @param string $input.
     *
     * @return void
     */

    public function setAction(string $input): void
    {
        $this->counter++;
        $this->setKey('Action-' . $this->getPaddedCounter(), $input);
    }

    /**
     * Sets Cat-XXXXXX key.
     *
     * @param string|int $input
     *
     * @return void
     */
    public function setCat(string|int $input): void
    {
        $this->requireCurrentAction();
        $this->setKey('Cat-' . $this->getPaddedCounter(), $input);
    }

    /**
     * Sets Var-XXXXXX key.
     *
     * @param string $input.
     *
     * @return void
     */
    public function setVar(string $input): void
    {
        $this->requireCurrentAction();
        $this->setKey('Var-' . $this->getPaddedCounter(), $input);
    }

    /**
     * Sets Value-XXXXXX key.
     *
     * @param string $input.
     *
     * @return void
     */
    public function setValue(string $input): void
    {
        $this->requireCurrentAction();
        $this->setKey('Value-' . $this->getPaddedCounter(), $input);
    }

     /**
     * Sets Match-XXXXXX key.
     *
     * @param string $input.
     *
     * @return void
     */
    public function setMatch(string $input): void
    {
        $this->requireCurrentAction();
        $this->setKey('Match-' . $this->getPaddedCounter(), $input);
    }

     /**
     * Sets Line-XXXXXX key.
     *
     * @param string $input.
     *
     * @return void
     */
    public function setLine(string $input): void
    {
        $this->requireCurrentAction();
        $this->setKey('Line-' . $this->getPaddedCounter(), $input);
    }

     /**
     * Sets Options-XXXXXX key.
     *
     * @param string $input.
     *
     * @return void
     */
    public function setOptions(string $input): void
    {
        $this->requireCurrentAction();
        $this->setKey('Options-' . $this->getPaddedCounter(), $input);
    }

    /**
     * Per-action fields share the index of the most recent setAction().
     *
     * @return void
     * @throws PAMIException
     */
    private function requireCurrentAction(): void
    {
        if ($this->counter < 0) {
            throw new PAMIException('setAction() must be called before setting per-action fields.');
        }
    }

    /**
     * Returns the string representation for counter with leading zeroes in UpdateConfig action format.
     *
     * @return string
     */
    protected function getPaddedCounter()
    {
        return str_pad((string) $this->counter, 6, '0', STR_PAD_LEFT);
    }
}
