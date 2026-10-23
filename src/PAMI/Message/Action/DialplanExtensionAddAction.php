<?php
/**
 * GetConfig action message.
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
namespace PAMI\Message\Action;

/**
 * GetConfig action message.
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
class DialplanExtensionAddAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct($context, $extension, $priority, $application, $replace = false)
    {
        parent::__construct('DialplanExtensionAdd');
        $this->setKey('context', $context);
        $this->setKey('extension', $extension);
        $this->setKey('priority', $priority);
        $this->setKey('application', $application);
        $this->setKey('replace', $replace);
    }
    
    /**
     * set Optional ApplicationData.
     *
     * @param string input
     * @return void
     */
    public function setApplicationData($input)
    {
        $this->setKey('applicationData', $input);
    }
    
    /**
     * set Replace previous entry at this priority.
     *
     * @param boolean input
     * @return void
     */
    public function setReplace($input)
    {
        $this->setKey('replace', $input ? 'true' : 'false');
    }
}
