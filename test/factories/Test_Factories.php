<?php
/**
 * This class will test the ami response factory
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage ReponseFactory
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/
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
namespace PAMI\Client\Impl {
    use PHPUnit\Framework\TestCase as BaseTestCase;

    /**
     * This class will test the response factory
     *
     * PHP Version 5
     *
     * @category   Pami
     * @package    Test
     * @subpackage Response Factory
     * @author     Diederik de Groot <ddegroot@users.sf.net>
     * @license    http://marcelog.github.com/ Apache License 2.0
     * @link       http://marcelog.github.com/
     */
    class Test_Factories extends BaseTestCase
    {
        /**
         * @test
         *
         * we might want to revise this behaviour, Response ie. GenericReponse should catch this and throw an exception
         */
        public function can_create_genericresponse_with_empty_message()
        {
            $factory = new \PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl();
            $responseExpect = "PAMI\\Message\\Response\\GenericResponse";

            $response = $factory->createFromRaw('', false);

            // we might want to revise this behaviour, GenericReponse should capture this i think and throw
            $this->assertTrue($response instanceof $responseExpect, 'Expected Class: ' . $responseExpect .  ', But got class: ' . get_class($response));
        }

        /**
         * @test
         */
        public function can_create_genericresponse_using_responsefactory()
        {
            $factory = new \PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl();
            $responseExpect = "PAMI\\Message\\Response\\GenericResponse";

            $response = $factory->createFromRaw('Response: Success\r\nMessage: Imaginary\r\n\r\n', false);
            $this->assertTrue($response instanceof $responseExpect, 'Expected Class: ' . $responseExpect .  ', But got class: ' . get_class($response));
        }

        /**
         * @test
         */
        public function can_create_genericresponse_by_outgoingMessageClass()
        {
            $factory = new \PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl();
            $actionClass = "\\PAMI\\Message\\Action\\LoginAction";
            $action = new $actionClass('test', 'boo');
            $responseExpect = "PAMI\\Message\\Response\\GenericResponse";

            $response = $factory->createFromRaw('Response: Success\r\nMessage: Imaginary\r\n\r\n', $action);
            $this->assertTrue($response instanceof $responseExpect, 'Expected Class: ' . $responseExpect .  ', But got class: ' . get_class($response));
        }

        /**
         * @test
         */
        public function can_create_genericresponse_by_responsehandler()
        {
            $factory = new \PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl();
            $actionClass = "\\PAMI\\Message\\Action\\LoginAction";
            $action = new $actionClass('test', 'boo');
            $action->setResponseHandler('Generic');
            $responseExpect = "PAMI\\Message\\Response\\GenericResponse";

            $response = $factory->createFromRaw('Response: Success\r\nMessage: Imaginary\r\n\r\n', $action);
            $this->assertTrue($response instanceof $responseExpect, 'Expected Class: ' . $responseExpect .  ', But got class: ' . get_class($response));
        }

        /**
         * @ignore
         * @test
         * @expectedException PAMI\Exception\PAMIException
         */
        /*
        public function can_get_exception_using_responsefactory_with_outgoingMessageClass()
        {
            $factory = new \PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl();
            $actionClass = "\\PAMI\\Message\\Action\\LoginAction";
            $action = new $actionClass('test', 'boo');
            $action->setResponseHandler('DoesNotExist');
            $responseExpect = "PAMI\\Message\\Response\\DoesNotExistResponse";
            $actualResponseHandlerSet = $action->getResponseHandler();
            $this->assertNotEquals($responseExpect, $actualResponseHandlerSet);
            $response = $factory->createFromRaw('Response: Success\r\nMessage: Imaginary\r\n\r\n', $action);
            $this->assertFalse($response instanceof $responseExpect, 'Expected Class: ' . $responseExpect .  ', But got class: ' . get_class($response));
        }
        */
    }
}
