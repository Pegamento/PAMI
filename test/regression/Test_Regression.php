<?php
/**
 * Regression tests for the bugs fixed in 3.0.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Test
 * @subpackage Regression
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
namespace PAMI\Client\Impl {
    use PHPUnit\Framework\TestCase as BaseTestCase;
    use PHPUnit\Framework\Attributes\Test;

    class Test_Regression extends BaseTestCase
    {
        private function clientOptions(): array
        {
            return array(
                'host' => '2.3.4.5',
                'scheme' => 'tcp://',
                'port' => 9999,
                'username' => 'asd',
                'secret' => 'asd',
                'connect_timeout' => 10,
                'read_timeout' => 10,
            );
        }

        #[Test]
        public function outgoing_values_reject_crlf()
        {
            $action = new \PAMI\Message\Action\PingAction();
            $this->expectException(\PAMI\Exception\PAMIException::class);
            $action->setVariable('FOO', "ok\r\nAction: Evil");
        }

        #[Test]
        public function outgoing_keys_reject_colon_and_crlf()
        {
            $action = new \PAMI\Message\Action\PingAction();
            $this->expectException(\PAMI\Exception\PAMIException::class);
            $action->setVariable("bad:key", 'value');
        }

        #[Test]
        public function outgoing_repeated_values_are_checked_per_element()
        {
            $action = new \PAMI\Message\Action\PingAction();
            $this->expectException(\PAMI\Exception\PAMIException::class);
            $action->setVariable('FOO', array('ok', "bad\n"));
        }

        #[Test]
        public function set_var_action_rejects_crlf_in_the_value()
        {
            $this->expectException(\PAMI\Exception\PAMIException::class);
            new \PAMI\Message\Action\SetVarAction('VAR', "a\nb");
        }

        #[Test]
        public function event_names_that_are_not_identifiers_stay_unknown()
        {
            $factory = new \PAMI\Message\Event\Factory\Impl\EventFactoryImpl();
            $event = $factory->createFromRaw("Event: Not An Identifier!\r\n\r\n");
            $this->assertInstanceOf(\PAMI\Message\Event\UnknownEvent::class, $event);
        }

        #[Test]
        public function missing_event_header_does_not_invent_a_class_name()
        {
            $factory = new \PAMI\Message\Event\Factory\Impl\EventFactoryImpl();
            // Seven bytes of padding put "Newchannel" where the old strpos+7 fallback looked.
            $event = $factory->createFromRaw("XXXXXXXNewchannel\r\n\r\n");
            $this->assertInstanceOf(\PAMI\Message\Event\UnknownEvent::class, $event);
        }

        #[Test]
        public function get_json_accepts_empty_array_and_object()
        {
            $list = new \PAMI\Message\Response\ComplexResponse("Response: Success\r\nJSON: []\r\n\r\n");
            $object = new \PAMI\Message\Response\ComplexResponse("Response: Success\r\nJSON: {}\r\n\r\n");
            $this->assertSame(array(), $list->getJSON());
            $this->assertSame(array(), $object->getJSON());
        }

        #[Test]
        public function command_output_keeps_raw_text()
        {
            $raw = "Response: Success\r\nMessage: Command output follows\r\nOutput: no\r\nOutput: <sip:100@example.com>\r\n\r\n";
            $response = new \PAMI\Message\Response\CommandResponse($raw);
            $this->assertSame(array('no', '<sip:100@example.com>'), $response->getCommandOutputArray());
            $this->assertSame("no\r\n<sip:100@example.com>", $response->getCommandOutput());
        }

        #[Test]
        public function channel_variable_values_keep_equals_signs()
        {
            $raw = "Event: Newchannel\r\nChannel: PJSIP/foo-00000001\r\nChanVariable: FOO=a=b\r\n\r\n";
            $event = new \PAMI\Message\Event\NewchannelEvent($raw);
            $this->assertSame('a=b', $event->getChannelVariables()['foo']);
        }

        #[Test]
        public function unserialize_keeps_channel_variables()
        {
            $raw = "Event: Newchannel\r\nChannel: PJSIP/foo-00000001\r\nChanVariable: FOO=a=b\r\nVariable: BAR=c=d\r\n\r\n";
            $event = new \PAMI\Message\Event\NewchannelEvent($raw);
            $restored = unserialize(serialize($event));
            $this->assertSame('a=b', $restored->getChannelVariables()['foo']);
            $this->assertSame('c=d', $restored->getStatusVariables()['bar']);
        }

        #[Test]
        public function blind_transfer_is_external_uses_the_typed_value()
        {
            $yes = new \PAMI\Message\Event\BlindTransferEvent("Event: BlindTransfer\r\nIsExternal: Yes\r\n\r\n");
            $no = new \PAMI\Message\Event\BlindTransferEvent("Event: BlindTransfer\r\nIsExternal: No\r\n\r\n");
            $this->assertTrue($yes->isExternal());
            $this->assertFalse($no->isExternal());
        }

        #[Test]
        public function async_agi_decodes_raw_environment_and_result()
        {
            $raw = "Event: AsyncAGI\r\nChannel: PJSIP/a\r\nEnv: a+b\r\nResult: %3Csip:100%3E\r\n\r\n";
            $event = new \PAMI\Message\Event\AsyncAGIEvent($raw);
            $this->assertSame('a+b', $event->getEnvironment());
            $this->assertSame('<sip:100>', $event->getResult());
        }

        #[Test]
        public function async_agi_skips_missing_environment()
        {
            $event = new \PAMI\Message\Event\AsyncAGIStartEvent("Event: AsyncAGIStart\r\nChannel: PJSIP/a\r\n\r\n");
            $this->assertNull($event->getEnvironment());
        }

        #[Test]
        public function default_action_ids_are_unique()
        {
            \PAMI\Message\Action\ActionMessage::setActionIdGenerator(null);
            try {
                $ids = array();
                for ($i = 0; $i < 40; $i++) {
                    $ids[] = (new \PAMI\Message\Action\PingAction())->getActionID();
                }
                $this->assertCount(40, array_unique($ids));
            } finally {
                \PAMI\Message\Action\ActionMessage::setActionIdGenerator(static fn (): string => '1432.123');
            }
        }

        #[Test]
        public function update_config_counters_are_per_instance()
        {
            $first = new \PAMI\Message\Action\UpdateConfigAction();
            $second = new \PAMI\Message\Action\UpdateConfigAction();
            $first->setAction('Append');
            $second->setAction('Append');
            $this->assertSame('Append', $first->getKey('action-000000'));
            $this->assertSame('Append', $second->getKey('action-000000'));
            $this->assertNull($second->getKey('action-000001'));
        }

        #[Test]
        public function update_config_fields_require_set_action_first()
        {
            $action = new \PAMI\Message\Action\UpdateConfigAction();
            $this->expectException(\PAMI\Exception\PAMIException::class);
            $action->setCat('general');
        }

        #[Test]
        public function get_table_names_is_empty_when_there_are_no_tables()
        {
            $response = new \PAMI\Message\Response\ComplexResponse("Response: Success\r\n\r\n");
            $this->assertSame(array(), $response->getTableNames());
        }

        #[Test]
        public function end_of_message_at_buffer_start_is_not_stuck()
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking = true;
            $write = array(
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            );
            setFgetsMock($standardAMIStart, $write);
            $client = new \PAMI\Client\Impl\ClientImpl($this->clientOptions());
            SomeListenerClass::$event = null;
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = array('', '', 'Event: Newchannel', 'Channel: PJSIP/endpoint-00000001', '');
            setFgetsMock($event, $event);
            for ($i = 0; $i < count($event); $i++) {
                $client->process();
            }
            $this->assertInstanceOf(\PAMI\Message\Event\NewchannelEvent::class, SomeListenerClass::$event);
            if (SomeListenerClass::$event !== null) {
                $this->assertSame('Newchannel', SomeListenerClass::$event->getName());
            }
        }

        #[Test]
        public function login_keeps_a_partial_message_in_the_buffer()
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            $mockTime = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking = true;
            $read = array(
                'Asterisk Call Manager/1.1',
                'Response: Success',
                'ActionID: 1432.123',
                "Message: Authentication accepted\r\n\r\nEvent: FullyBooted",
                'Privilege: system,all',
                'Status: Fully Booted',
                '',
            );
            $write = array(
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            );
            setFgetsMock($read, $write);
            $client = new \PAMI\Client\Impl\ClientImpl($this->clientOptions());
            SomeListenerClass::$event = null;
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            for ($i = 0; $i < 4; $i++) {
                $client->process();
            }
            $this->assertInstanceOf(\PAMI\Message\Event\FullyBootedEvent::class, SomeListenerClass::$event);
        }

        #[Test]
        public function partial_fwrite_is_retried_until_the_message_is_sent()
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $mockFwritePartial;
            global $standardAMIStart;
            $mockTime = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking = true;
            $write = array(
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            );
            setFgetsMock($standardAMIStart, $write);
            $mockFwritePartial = 8;
            $client = new \PAMI\Client\Impl\ClientImpl($this->clientOptions());
            $client->open();
            $this->assertTrue($client instanceof \PAMI\Client\Impl\ClientImpl);
        }

        #[Test]
        public function close_sends_logoff_and_drops_the_socket()
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking = true;
            $write = array(
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
                "action: Logoff\r\nactionid: 1432.123\r\n",
            );
            setFgetsMock($standardAMIStart, $write);
            $client = new \PAMI\Client\Impl\ClientImpl($this->clientOptions());
            $client->open();
            $client->close();
            $this->assertNull($client->getSocket());
        }

        #[Test]
        public function client_options_are_required()
        {
            $this->expectException(\PAMI\Client\Exception\ClientException::class);
            new \PAMI\Client\Impl\ClientImpl(array('host' => '2.3.4.5'));
        }

        #[Test]
        public function static_callables_can_listen_for_events()
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking = true;
            $write = array(
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            );
            setFgetsMock($standardAMIStart, $write);
            $client = new \PAMI\Client\Impl\ClientImpl($this->clientOptions());
            RegressionStaticListener::$event = null;
            $client->registerEventListener(array(RegressionStaticListener::class, 'onEvent'));
            $client->open();
            $event = array(
                'Event: Newchannel',
                'Privilege: system,all',
                'Channel: PJSIP/endpoint-00000001',
                '',
            );
            setFgetsMock($event, $event);
            for ($i = 0; $i < count($event); $i++) {
                $client->process();
            }
            $this->assertInstanceOf(\PAMI\Message\Event\NewchannelEvent::class, RegressionStaticListener::$event);
        }

        #[Test]
        public function optional_action_arguments_use_null()
        {
            $action = new \PAMI\Message\Action\StatusAction(null);
            $this->assertArrayNotHasKey('channel', $action->getKeys());
            $withChannel = new \PAMI\Message\Action\GetVarAction('FOO', 'PJSIP/a');
            $this->assertSame('PJSIP/a', $withChannel->getKey('channel'));
        }

        #[Test]
        public function raw_key_values_keep_trailing_and_leading_zeroes()
        {
            $raw = "Event: Newchannel\r\nChannel: PJSIP/a\r\nDuration: 1.10\r\nExtension: 0123\r\nCallerIDName: <sip>\r\n\r\n";
            $event = new \PAMI\Message\Event\NewchannelEvent($raw);
            $this->assertSame('1.10', $event->getKey('Duration'));
            $this->assertSame('0123', $event->getKey('Extension'));
            $this->assertSame('<sip>', $event->getKey('CallerIDName'));
        }

        #[Test]
        public function string_and_decimal_timeouts_are_accepted()
        {
            $stringTimeouts = new \PAMI\Client\Impl\ClientImpl(array(
                'host' => '2.3.4.5',
                'port' => '9999',
                'username' => 'asd',
                'secret' => 'asd',
                'connect_timeout' => '10',
                'read_timeout' => '10',
            ));
            $decimalReadTimeout = new \PAMI\Client\Impl\ClientImpl(array(
                'host' => '2.3.4.5',
                'port' => 9999,
                'username' => 'asd',
                'secret' => 'asd',
                'connect_timeout' => '10.5',
                'read_timeout' => 0.5,
            ));
            $this->assertSame(10.0, $this->timeoutProperty($stringTimeouts, 'cTimeout'));
            $this->assertSame(10, $this->timeoutProperty($stringTimeouts, 'rTimeout'));
            $this->assertSame(10.5, $this->timeoutProperty($decimalReadTimeout, 'cTimeout'));
            $this->assertSame(0, $this->timeoutProperty($decimalReadTimeout, 'rTimeout'));
        }

        #[Test]
        public function get_variable_returns_the_value_set_variable_stored()
        {
            $action = new \PAMI\Message\Action\PingAction();
            $action->setVariable('n', 5);
            $action->setVariable('f', 1.5);
            $action->setVariable('b', false);
            $this->assertSame(5, $action->getVariable('n'));
            $this->assertSame(1.5, $action->getVariable('f'));
            $this->assertFalse($action->getVariable('b'));
            $this->assertStringContainsString('Variable: n=5', $action->serialize());
        }

        #[Test]
        public function message_send_keeps_a_single_line_body()
        {
            $action = new \PAMI\Message\Action\MessageSendAction(
                'pjsip:sipuser',
                'hello',
                array('Content-Type' => 'text/plain'),
                'pjsip:me'
            );
            $this->assertSame('hello', $action->getKey('body'));
            $this->assertNull($action->getKey('base64body'));
            $this->assertSame('pjsip:me', $action->getKey('from'));
            $this->assertSame('text/plain', $action->getVariable('Content-Type'));
        }

        #[Test]
        public function message_send_encodes_a_multi_line_body()
        {
            $body = "hello\r\nworld";
            $action = new \PAMI\Message\Action\MessageSendAction('pjsip:sipuser', $body);
            $action->setFrom('pjsip:me');
            $this->assertNull($action->getKey('body'));
            $this->assertSame(base64_encode($body), $action->getKey('base64body'));
            $this->assertSame('pjsip:me', $action->getKey('from'));
            $this->assertStringNotContainsString("hello\r\nworld", $action->serialize());
        }

        /**
         * @return int|float
         */
        private function timeoutProperty(\PAMI\Client\Impl\ClientImpl $client, string $name): int|float
        {
            $property = new \ReflectionProperty($client, $name);
            $value = $property->getValue($client);
            $this->assertTrue(is_int($value) || is_float($value));
            return $value;
        }
    }

    class RegressionStaticListener
    {
        public static $event;

        public static function onEvent($event): void
        {
            self::$event = $event;
        }
    }
}
