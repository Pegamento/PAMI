<?php
/**
 * This class will test xslt generated actions.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Diederik de Groot <ddegroot@gmail.com>
 * @license    http://github.com/chan-sccp/PAMI/LICENSE
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
     * This class will test  xslt generated actions.
     *
     * PHP Version 5
     *
     * @category   Pami
     * @package    Test
     * @subpackage Action
     * @author     Diederik de Groot <ddegroot@gmail.com>
     * @license    http://chan-sccp.github.com/PAMI/ Apache License 2.0
     * @link       http://github.com/chan-scc/PAMI/
     */
    class Test_XSLT_Actions extends BaseTestCase
    {
        private function start(array $write, \PAMI\Message\Action\ActionMessage $action)
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking = true;
            $options = array(
            'host' => '2.3.4.5',
            'scheme' => 'tcp://',
            'port' => 9999,
            'username' => 'asd',
            'secret' => 'asd',
            'connect_timeout' => 10,
            'read_timeout' => 10
            );
            $writeLogin = array(
            "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
            );
            setFgetsMock($standardAMIStart, $writeLogin);
            $client = new \PAMI\Client\Impl\ClientImpl($options);
            $client->open();
            if ($action instanceof \PAMI\Message\Action\DBGetAction) {
                $event = array(
                'Response: Success',
                'EventList: start',
                'ActionID: 1432.123',
                '',
                'Event: DBGetResponse',
                'ActionID: 1432.123',
                ''
                );
            } elseif ($action instanceof \PAMI\Message\Action\CommandAction) {
                $event = array(
                'Response: Success',
                'ActionID: 1432.123',
                'Message: Command output follows',
                'Output: Changing mystate1 to INUSE',
                ''
                );
            } else {
                $event = array(
                'Response: Success',
                'ActionID: 1432.123',
                ''
                );
            }
            setFgetsMock($event, $write);
            $response = $client->send($action);
            $this->assertTrue($response instanceof \PAMI\Message\Response\Response);
            return array('client' => $client, 'response' => $response);
        }

    
    /**
     * @test IAXpeers
     *
     */
        public function can_iaxpeers()
        {
            $write = array(implode("\r\n", array(
            'action: IAXpeers',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\IAXpeersAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test IAXpeerlist
     *
     */
        public function can_iaxpeerlist()
        {
            $write = array(implode("\r\n", array(
            'action: IAXpeerlist',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\IAXpeerlistAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test IAXnetstats
     *
     */
        public function can_iaxnetstats()
        {
            $write = array(implode("\r\n", array(
            'action: IAXnetstats',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\IAXnetstatsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test IAXregistry
     *
     */
        public function can_iaxregistry()
        {
            $write = array(implode("\r\n", array(
            'action: IAXregistry',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\IAXregistryAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test DAHDIShowChannels
     *
     */
        public function can_dahdishowchannels()
        {
            $write = array(implode("\r\n", array(
            'action: DAHDIShowChannels',
            'actionid: 1432.123',
            'dahdichannel: DAHDIChannel',
            ''
            )));
            $action = new \PAMI\Message\Action\DAHDIShowChannelsAction();
            $action->setDAHDIChannel('DAHDIChannel');
            $result = $this->start($write, $action);
        }


    /**
     * @test PRIShowSpans
     *
     */
        public function can_prishowspans()
        {
            $write = array(implode("\r\n", array(
            'action: PRIShowSpans',
            'actionid: 1432.123',
            'span: Span',
            ''
            )));
            $action = new \PAMI\Message\Action\PRIShowSpansAction();
            $action->setSpan('Span');
            $result = $this->start($write, $action);
        }


    /**
     * @test PRIDebugSet
     *
     */
        public function can_pridebugset()
        {
            $write = array(implode("\r\n", array(
            'action: PRIDebugSet',
            'actionid: 1432.123',
            'span: Span',
            'level: Level',
            ''
            )));
            $action = new \PAMI\Message\Action\PRIDebugSetAction('Span', 'Level');
            $result = $this->start($write, $action);
        }


    /**
     * @test PRIDebugFileSet
     *
     */
        public function can_pridebugfileset()
        {
            $write = array(implode("\r\n", array(
            'action: PRIDebugFileSet',
            'actionid: 1432.123',
            'file: File',
            ''
            )));
            $action = new \PAMI\Message\Action\PRIDebugFileSetAction('File');
            $result = $this->start($write, $action);
        }


    /**
     * @test PRIDebugFileUnset
     *
     */
        public function can_pridebugfileunset()
        {
            $write = array(implode("\r\n", array(
            'action: PRIDebugFileUnset',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\PRIDebugFileUnsetAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test ConfbridgeSetSingleVideoSrc
     *
     */
        public function can_confbridgesetsinglevideosrc()
        {
            $write = array(implode("\r\n", array(
            'action: ConfbridgeSetSingleVideoSrc',
            'actionid: 1432.123',
            'conference: Conference',
            'channel: Channel',
            ''
            )));
            $action = new \PAMI\Message\Action\ConfbridgeSetSingleVideoSrcAction('Conference', 'Channel');
            $result = $this->start($write, $action);
        }


    /**
     * @test ControlPlayback
     *
     */
        public function can_controlplayback()
        {
            $write = array(implode("\r\n", array(
            'action: ControlPlayback',
            'actionid: 1432.123',
            'channel: Channel',
            'control: Control',
            ''
            )));
            $action = new \PAMI\Message\Action\ControlPlaybackAction('Channel', 'Control');
            $result = $this->start($write, $action);
        }


    /**
     * @test VoicemailUserStatus
     *
     */
        public function can_voicemailuserstatus()
        {
            $write = array(implode("\r\n", array(
            'action: VoicemailUserStatus',
            'actionid: 1432.123',
            'context: Context',
            'mailbox: Mailbox',
            ''
            )));
            $action = new \PAMI\Message\Action\VoicemailUserStatusAction('Context', 'Mailbox');
            $result = $this->start($write, $action);
        }


    /**
     * @test VoicemailRefresh
     *
     */
        public function can_voicemailrefresh()
        {
            $write = array(implode("\r\n", array(
            'action: VoicemailRefresh',
            'actionid: 1432.123',
            'context: Context',
            'mailbox: Mailbox',
            ''
            )));
            $action = new \PAMI\Message\Action\VoicemailRefreshAction();
            $action->setContext('Context');
            $action->setMailbox('Mailbox');
            $result = $this->start($write, $action);
        }


    /**
     * @test QueueMemberRingInUse
     *
     */
        public function can_queuememberringinuse()
        {
            $write = array(implode("\r\n", array(
            'action: QueueMemberRingInUse',
            'actionid: 1432.123',
            'interface: Interface',
            'ringinuse: RingInUse',
            'queue: Queue',
            ''
            )));
            $action = new \PAMI\Message\Action\QueueMemberRingInUseAction('Interface', 'RingInUse');
            $action->setQueue('Queue');
            $result = $this->start($write, $action);
        }


    /**
     * @test QueueChangePriorityCaller
     *
     */
        public function can_queuechangeprioritycaller()
        {
            $write = array(implode("\r\n", array(
            'action: QueueChangePriorityCaller',
            'actionid: 1432.123',
            'queue: Queue',
            'caller: Caller',
            'priority: Priority',
            ''
            )));
            $action = new \PAMI\Message\Action\QueueChangePriorityCallerAction('Queue', 'Caller', 'Priority');
            $result = $this->start($write, $action);
        }


    /**
     * @test BridgeDestroy
     *
     */
        public function can_bridgedestroy()
        {
            $write = array(implode("\r\n", array(
            'action: BridgeDestroy',
            'actionid: 1432.123',
            'bridgeuniqueid: BridgeUniqueid',
            ''
            )));
            $action = new \PAMI\Message\Action\BridgeDestroyAction('BridgeUniqueid');
            $result = $this->start($write, $action);
        }


    /**
     * @test BridgeKick
     *
     */
        public function can_bridgekick()
        {
            $write = array(implode("\r\n", array(
            'action: BridgeKick',
            'actionid: 1432.123',
            'channel: Channel',
            'bridgeuniqueid: BridgeUniqueid',
            ''
            )));
            $action = new \PAMI\Message\Action\BridgeKickAction('Channel');
            $action->setBridgeUniqueid('BridgeUniqueid');
            $result = $this->start($write, $action);
        }


    /**
     * @test BridgeTechnologyList
     *
     */
        public function can_bridgetechnologylist()
        {
            $write = array(implode("\r\n", array(
            'action: BridgeTechnologyList',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\BridgeTechnologyListAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test BridgeTechnologySuspend
     *
     */
        public function can_bridgetechnologysuspend()
        {
            $write = array(implode("\r\n", array(
            'action: BridgeTechnologySuspend',
            'actionid: 1432.123',
            'bridgetechnology: BridgeTechnology',
            ''
            )));
            $action = new \PAMI\Message\Action\BridgeTechnologySuspendAction('BridgeTechnology');
            $result = $this->start($write, $action);
        }


    /**
     * @test BridgeTechnologyUnsuspend
     *
     */
        public function can_bridgetechnologyunsuspend()
        {
            $write = array(implode("\r\n", array(
            'action: BridgeTechnologyUnsuspend',
            'actionid: 1432.123',
            'bridgetechnology: BridgeTechnology',
            ''
            )));
            $action = new \PAMI\Message\Action\BridgeTechnologyUnsuspendAction('BridgeTechnology');
            $result = $this->start($write, $action);
        }


    /**
     * @test ExtensionStateList
     *
     */
        public function can_extensionstatelist()
        {
            $write = array(implode("\r\n", array(
            'action: ExtensionStateList',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\ExtensionStateListAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test CancelAtxfer
     *
     */
        public function can_cancelatxfer()
        {
            $write = array(implode("\r\n", array(
            'action: CancelAtxfer',
            'actionid: 1432.123',
            'channel: Channel',
            ''
            )));
            $action = new \PAMI\Message\Action\CancelAtxferAction('Channel');
            $result = $this->start($write, $action);
        }


    /**
     * @test PresenceState
     *
     */
        public function can_presencestate()
        {
            $write = array(implode("\r\n", array(
            'action: PresenceState',
            'actionid: 1432.123',
            'provider: Provider',
            ''
            )));
            $action = new \PAMI\Message\Action\PresenceStateAction('Provider');
            $result = $this->start($write, $action);
        }


    /**
     * @test LoggerRotate
     *
     */
        public function can_loggerrotate()
        {
            $write = array(implode("\r\n", array(
            'action: LoggerRotate',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\LoggerRotateAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test Filter
     *
     */
        public function can_filter()
        {
            $write = array(implode("\r\n", array(
            'action: Filter',
            'actionid: 1432.123',
            'operation: Operation',
            'filter: Filter',
            ''
            )));
            $action = new \PAMI\Message\Action\FilterAction();
            $action->setOperation('Operation');
            $action->setFilter('Filter');
            $result = $this->start($write, $action);
        }


    /**
     * @test Parkinglots
     *
     */
        public function can_parkinglots()
        {
            $write = array(implode("\r\n", array(
            'action: Parkinglots',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\ParkinglotsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test DeviceStateList
     *
     */
        public function can_devicestatelist()
        {
            $write = array(implode("\r\n", array(
            'action: DeviceStateList',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\DeviceStateListAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test PresenceStateList
     *
     */
        public function can_presencestatelist()
        {
            $write = array(implode("\r\n", array(
            'action: PresenceStateList',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\PresenceStateListAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test MuteAudio
     *
     */
        public function can_muteaudio()
        {
            $write = array(implode("\r\n", array(
            'action: MuteAudio',
            'actionid: 1432.123',
            'channel: Channel',
            'direction: Direction',
            'state: State',
            ''
            )));
            $action = new \PAMI\Message\Action\MuteAudioAction('Channel', 'Direction', 'State');
            $result = $this->start($write, $action);
        }


    /**
     * @test MWIGet
     *
     */
        public function can_mwiget()
        {
            $write = array(implode("\r\n", array(
            'action: MWIGet',
            'actionid: 1432.123',
            'mailbox: Mailbox',
            ''
            )));
            $action = new \PAMI\Message\Action\MWIGetAction('Mailbox');
            $result = $this->start($write, $action);
        }


    /**
     * @test MWIDelete
     *
     */
        public function can_mwidelete()
        {
            $write = array(implode("\r\n", array(
            'action: MWIDelete',
            'actionid: 1432.123',
            'mailbox: Mailbox',
            ''
            )));
            $action = new \PAMI\Message\Action\MWIDeleteAction('Mailbox');
            $result = $this->start($write, $action);
        }


    /**
     * @test MWIUpdate
     *
     */
        public function can_mwiupdate()
        {
            $write = array(implode("\r\n", array(
            'action: MWIUpdate',
            'actionid: 1432.123',
            'mailbox: Mailbox',
            'oldmessages: OldMessages',
            'newmessages: NewMessages',
            ''
            )));
            $action = new \PAMI\Message\Action\MWIUpdateAction('Mailbox');
            $action->setOldMessages('OldMessages');
            $action->setNewMessages('NewMessages');
            $result = $this->start($write, $action);
        }


    /**
     * @test PJSIPNotify
     *
     */
        public function can_pjsipnotify()
        {
            $write = array(implode("\r\n", array(
            'action: PJSIPNotify',
            'actionid: 1432.123',
            'variable: Variable',
            'endpoint: Endpoint',
            'uri: URI',
            'channel: channel',
            ''
            )));
            $action = new \PAMI\Message\Action\PJSIPNotifyAction('Variable');
            $action->setEndpoint('Endpoint');
            $action->setURI('URI');
            $action->setchannel('channel');
            $result = $this->start($write, $action);
        }


    /**
     * @test SorceryMemoryCacheExpireObject
     *
     */
        public function can_sorcerymemorycacheexpireobject()
        {
            $write = array(implode("\r\n", array(
            'action: SorceryMemoryCacheExpireObject',
            'actionid: 1432.123',
            'cache: Cache',
            'object: Object',
            ''
            )));
            $action = new \PAMI\Message\Action\SorceryMemoryCacheExpireObjectAction('Cache', 'Object');
            $result = $this->start($write, $action);
        }


    /**
     * @test SorceryMemoryCacheExpire
     *
     */
        public function can_sorcerymemorycacheexpire()
        {
            $write = array(implode("\r\n", array(
            'action: SorceryMemoryCacheExpire',
            'actionid: 1432.123',
            'cache: Cache',
            ''
            )));
            $action = new \PAMI\Message\Action\SorceryMemoryCacheExpireAction('Cache');
            $result = $this->start($write, $action);
        }


    /**
     * @test SorceryMemoryCacheStaleObject
     *
     */
        public function can_sorcerymemorycachestaleobject()
        {
            $write = array(implode("\r\n", array(
            'action: SorceryMemoryCacheStaleObject',
            'actionid: 1432.123',
            'cache: Cache',
            'object: Object',
            'reload: Reload',
            ''
            )));
            $action = new \PAMI\Message\Action\SorceryMemoryCacheStaleObjectAction('Cache', 'Object');
            $action->setReload('Reload');
            $result = $this->start($write, $action);
        }


    /**
     * @test SorceryMemoryCacheStale
     *
     */
        public function can_sorcerymemorycachestale()
        {
            $write = array(implode("\r\n", array(
            'action: SorceryMemoryCacheStale',
            'actionid: 1432.123',
            'cache: Cache',
            ''
            )));
            $action = new \PAMI\Message\Action\SorceryMemoryCacheStaleAction('Cache');
            $result = $this->start($write, $action);
        }


    /**
     * @test SorceryMemoryCachePopulate
     *
     */
        public function can_sorcerymemorycachepopulate()
        {
            $write = array(implode("\r\n", array(
            'action: SorceryMemoryCachePopulate',
            'actionid: 1432.123',
            'cache: Cache',
            ''
            )));
            $action = new \PAMI\Message\Action\SorceryMemoryCachePopulateAction('Cache');
            $result = $this->start($write, $action);
        }


    /**
     * @test FAXSessions
     *
     */
        public function can_faxsessions()
        {
            $write = array(implode("\r\n", array(
            'action: FAXSessions',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\FAXSessionsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test FAXSession
     *
     */
        public function can_faxsession()
        {
            $write = array(implode("\r\n", array(
            'action: FAXSession',
            'actionid: 1432.123',
            'sessionnumber: SessionNumber',
            ''
            )));
            $action = new \PAMI\Message\Action\FAXSessionAction('SessionNumber');
            $result = $this->start($write, $action);
        }


    /**
     * @test FAXStats
     *
     */
        public function can_faxstats()
        {
            $write = array(implode("\r\n", array(
            'action: FAXStats',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\FAXStatsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test PJSIPShowAors
     *
     */
        public function can_pjsipshowaors()
        {
            $write = array(implode("\r\n", array(
            'action: PJSIPShowAors',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\PJSIPShowAorsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test PJSIPShowAuths
     *
     */
        public function can_pjsipshowauths()
        {
            $write = array(implode("\r\n", array(
            'action: PJSIPShowAuths',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\PJSIPShowAuthsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test PJSIPShowContacts
     *
     */
        public function can_pjsipshowcontacts()
        {
            $write = array(implode("\r\n", array(
            'action: PJSIPShowContacts',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\PJSIPShowContactsAction();
            $result = $this->start($write, $action);
        }


    /**
     * @test PJSIPShowRegistrationInboundContactStatuses
     *
     */
        public function can_pjsipshowregistrationinboundcontactstatuses()
        {
            $write = array(implode("\r\n", array(
            'action: PJSIPShowRegistrationInboundContactStatuses',
            'actionid: 1432.123',
            ''
            )));
            $action = new \PAMI\Message\Action\PJSIPShowRegistrationInboundContactStatusesAction();
            $result = $this->start($write, $action);
        }
    }
}
