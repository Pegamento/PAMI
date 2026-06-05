<?php
/**
 * This class will test the ami client
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Client
 * @author     Diederik de Groot <ddegroot@talon.nl>
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
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
namespace {
    // PHPUnit loads the bootstrap inside a function scope, so these mock
    // defaults must be bound to the global scope explicitly to be reachable
    // via `global $...` from within the test methods.
    global $mockTime, $mockTimeCount, $mockTimeReturn, $mock_stream_socket_client,
        $mock_stream_set_blocking, $mock_stream_set_timeout, $mock_stream_get_meta_data_return,
        $mockFwrite, $mockFwriteReturn, $mockFwriteCount, $mockFgets, $mockFgetsCount,
        $mockFreadReturn, $mockRTimeout, $standardAMIStart, $standardAMIStartBadLogin;
    $mockTime = false;
    $mockTimeCount = false;
    $mockTimeReturn = false;
    $mock_stream_socket_client = false;
    $mock_stream_set_blocking = false;
    $mock_stream_set_timeout = false;
    $mock_stream_get_meta_data_return = false;
    $mockFwrite = false;
    $mockFwriteReturn = false;
    $mockFwriteCount = 0;
    $mockFgets = false;
    $mockFgetsCount = 0;
    $mockFreadReturn = false;
    $mockRTimeout = 0;
    $standardAMIStart = array(
        'Asterisk Call Manager/1.1',
        'Response: Success',
        'ActionID: 1432.123',
        'Message: Authentication accepted',
        '',
        'Response: Goodbye',
        'ActionID: 1432.123',
        'Message: Thanks for all the fish.',
        ''
    );
    $standardAMIStartBadLogin = array(
        'Asterisk Call Manager/1.1',
        'Response: Error', // also tests behavior when asterisk does not return an actionid
        'Message: Authentication accepted',
        ''
    );
}

namespace PAMI\Message\Action {
    function microtime()
    {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            return 1432.123;
        } else {
            return call_user_func_array('\microtime', func_get_args());
        }
    }
}

namespace PAMI\Client\Impl {
    use PHPUnit\Framework\TestCase as BaseTestCase;

    function microtime()
    {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            return 1432.123;
        } else {
            return call_user_func_array('\microtime', func_get_args());
        }
    }
    function stream_socket_client($remote_socket, &$errno = null, &$errstr = null, $timeout = null, $flags = null, $context = null)
    {
        global $mock_stream_socket_client;
        if (isset($mock_stream_socket_client) && $mock_stream_socket_client === true) {
        } else {
            return \stream_socket_client($remote_socket, $errno, $errstr, $timeout, $flags, $context);
        }
    }
    function stream_socket_shutdown($stream, $mode)
    {
        return true;
    }
    function stream_set_blocking()
    {
        global $mock_stream_set_blocking;
        if (isset($mock_stream_set_blocking)) {
            return $mock_stream_set_blocking;
        } else {
            return call_user_func_array('\stream_set_blocking', func_get_args());
        }
    }
    function stream_set_timeout()
    {
        /*
        global $mockRTimeout;
        $args = func_get_args();
        $mockRTimeout = $args[1];
        return true;
        */
        global $mockRTimeout;
        global $mock_stream_socket_client;
        if (isset($mock_stream_socket_client)) {
            $args = func_get_args();
            $mockRTimeout = $args[1];
            return $mock_stream_socket_client;
        } else {
            return call_user_func_array('\stream_set_timeout', func_get_args());
        }
    }
    function stream_get_meta_data()
    {
        global $mockRTimeout;
        global $mock_stream_socket_client;
        global $mock_stream_get_meta_data_return;
        if (isset($mock_stream_socket_client)) {
            if ($mock_stream_socket_client === true) {
                if ($mock_stream_get_meta_data_return === true) {
                    sleep($mockRTimeout);
                }
                return array('timed_out' => $mock_stream_get_meta_data_return);
            }
            return $mock_stream_socket_client;
        } else {
            return call_user_func_array('\stream_get_meta_data', func_get_args());
        }
    }
    function fwrite()
    {
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        if (isset($mockFwrite) && $mockFwrite === true) {
            $args = func_get_args();
            if (isset($mockFwriteReturn[$mockFwriteCount]) && $mockFwriteReturn[$mockFwriteCount] !== false) {
                if ($mockFwriteReturn[$mockFwriteCount] === 'fwrite error') {
                    $mockFwriteCount++;
                    return 0;
                }
                $str = $mockFwriteReturn[$mockFwriteCount] . "\r\n";
                if ($str !== $args[1]) {
                    throw new \Exception(
                        'Mocked: ' . PHP_EOL . PHP_EOL .  print_r($mockFwriteReturn[$mockFwriteCount], true) . PHP_EOL . PHP_EOL
                        . ' is different from: ' . PHP_EOL . PHP_EOL . print_r($args[1], true)
                    );
                }
            }
            $mockFwriteCount++;
            return strlen($args[1]);
        } else {
            return call_user_func_array('\fwrite', func_get_args());
        }
    }
    function stream_get_line()
    {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;
            return is_string($result) ? $result . "\r\n" : $result;
        } else {
            return call_user_func_array('\stream_get_line', func_get_args());
        }
    }
    function feof($resource)
    {
        global $mockFgets;
        if (isset($mockFgets) && $mockFgets === true) {
            return false;
        }
        return \feof($resource);
    }

    function fread()
    {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;
            if (is_integer($result)) {
                sleep($result);
                return '';
            }
            return is_string($result) ? $result . "\r\n" : $result;
        } else {
            return call_user_func_array('\fread', func_get_args());
        }
    }
    function setFgetsMock(array $readValues, $writeValues)
    {
        global $mockFgets;
        global $mockFopen;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        $mockFgets = true;
        $mockFopen = true;
        $mockFwrite = true;
        $mockFgetsCount = 0;
        $mockFgetsReturn = $readValues;
        $mockFwriteCount = 0;
        $mockFwriteReturn = $writeValues;
    }
    class SomeListenerClass implements \PAMI\Listener\IEventListener
    {
        public static $event;

        public function handle(\PAMI\Message\Event\EventMessage $event)
        {
            self::$event = $event;
        }
    }
}
