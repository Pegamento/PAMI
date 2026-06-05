# Fork !
This version aims to optimize for PJSIP as a channel. Note that this is a fork of https://github.com/chan-sccp/PAMI which is a fork of the original release by [Marcelo Gornstein](https://github.com/marcelog/PAMI) - however their SCCP Channel modifications have been removed.

# Introduction

PAMI means PHP Asterisk Manager Interface. As its name suggests its just a
set of php classes that will let you issue commands to an ami and/or receive
events, using an observer-listener pattern.

The idea behind this, is to easily implement operator consoles, monitors, etc.
either via SOA or ajax.


# Resources

 * [Issues](https://github.com/Pegamento/PAMI/issues)
 * [Wiki](https://github.com/Pegamento/PAMI/wiki)

# PHP Versions

PAMI requires PHP 8.1 or higher.

# Installing
Add this library to your [Composer](https://packagist.org/) configuration. In
composer.json:
```json
  "require": {
    "pegamento/pami": "^2.1"
  }
```

# QuickStart

For an in-depth tutorial: http://marcelog.github.com/articles/pami_introduction_tutorial_how_to_install.html

```php
// Make sure you include the composer autoload.
require __DIR__ . '/vendor/autoload.php';

$options = array(
    'host' => '2.3.4.5',
    'scheme' => 'tcp://',
    'port' => 9999,
    'username' => 'asd',
    'secret' => 'asd',
    'connect_timeout' => 10,
    'read_timeout' => 10
);
$client = new \PAMI\Client\Impl\ClientImpl($options);

// Registering a closure
$client->registerEventListener(function ($event) {
});

// Register a specific method of an object for event listening
$client->registerEventListener(array($listener, 'handle'));

// Register an IEventListener:
$client->registerEventListener($listener);
```

# Using Predicates
A second (optional) argument can be used when registering the event listener: a
closure that will be evaluated before calling the callback. The callback will
be called only if this predicate returns true:

```php
use PAMI\Message\Event\DialEvent;

$client->registerEventListener(
    array($listener, 'handleDialStart'),
    function ($event) {
        return $event instanceof DialEvent && $event->getSubEvent() == 'Begin';
    })
);
```

# Currently Supported Events

More events will be added with time. I can only add the ones I can test for and
use, so your contributions may make the difference! ;)

Unknown (not yet implemented) events will be reported as UnknownEvent, so you
can still catch them. If you catch one of these, please report it!

 * AGIExec
 * AGIExecEnd
 * AGIExecStart
 * AgentCalled
 * AgentComplete
 * AgentConnect
 * AgentDump
 * AgentLogin
 * AgentLogoff
 * AgentRingNoAnswer
 * Agents
 * AgentsComplete
 * Alarm
 * AlarmClear
 * AorDetail
 * AorList
 * AorListComplete
 * AsyncAGI
 * AsyncAGIEnd
 * AsyncAGIExec
 * AsyncAGIStart
 * AttendedTransfer
 * AuthDetail
 * AuthList
 * AuthListComplete
 * AuthMethodNotAllowed
 * BlindTransfer
 * Bridge
 * BridgeCreate
 * BridgeDestroy
 * BridgeEnter
 * BridgeInfoChannel
 * BridgeInfoComplete
 * BridgeLeave
 * BridgeListItem
 * BridgeVideoSourceUpdate
 * CEL
 * CallAnswered
 * CallForward
 * Cdr
 * ChallengeResponseFailed
 * ChallengeSent
 * ChanSpyStart
 * ChanSpyStop
 * ChannelTalkingStart
 * ChannelTalkingStop
 * ChannelUpdate
 * ConfbridgeEnd
 * ConfbridgeJoin
 * ConfbridgeLeave
 * ConfbridgeList
 * ConfbridgeListComplete
 * ConfbridgeListRooms
 * ConfbridgeListRoomsComplete
 * ConfbridgeMute
 * ConfbridgeRecord
 * ConfbridgeStart
 * ConfbridgeStopRecord
 * ConfbridgeTalking
 * ConfbridgeUnmute
 * ContactList
 * ContactListComplete
 * ContactStatus
 * ContactStatusDetail
 * CoreShowChannel
 * CoreShowChannelsComplete
 * DAHDIChannel
 * DAHDIShowChannels
 * DAHDIShowChannelsComplete
 * DBGetResponse
 * DND
 * DNDState
 * DTMF
 * DTMFBegin
 * DTMFEnd
 * DeviceStateChange
 * DeviceStateListComplete
 * DeviceStatus
 * Dial
 * DialBegin
 * DialEnd
 * DialState
 * DongleDeviceEntry
 * DongleNewCUSD
 * DongleNewUSSD
 * DongleNewUSSDBase64
 * DongleSMSStatus
 * DongleShowDevicesComplete
 * DongleStatus
 * DongleUSSDStatus
 * EndpointDetail
 * EndpointDetailComplete
 * EndpointList
 * EndpointListComplete
 * ExtensionStateListComplete
 * ExtensionStatus
 * FAXSession
 * FAXSessionsComplete
 * FAXSessionsEntry
 * FAXStats
 * FAXStatus
 * FailedACL
 * FullyBooted
 * Hangup
 * HangupHandlerPop
 * HangupHandlerPush
 * HangupHandlerRun
 * HangupRequest
 * Hold
 * IdentifyDetail
 * InboundRegistrationDetail
 * InvalidAccountID
 * InvalidPassword
 * InvalidTransport
 * JabberEvent
 * Join
 * Leave
 * Link
 * ListDialplan
 * Load
 * LoadAverageLimit
 * LocalBridge
 * LocalOptimizationBegin
 * LocalOptimizationEnd
 * MCID
 * MWIGet
 * MWIGetComplete
 * Masquerade
 * MemoryLimit
 * MessageWaiting
 * MiniVoiceMail
 * MusicOnHold
 * MusicOnHoldStart
 * MusicOnHoldStop
 * NewAccountCode
 * NewCallerid
 * NewConnectedLine
 * NewExten
 * Newchannel
 * Newstate
 * OriginateResponse
 * OutboundRegistrationDetail
 * OutboundSubscriptionDetail
 * ParkedCall
 * ParkedCallGiveUp
 * ParkedCallSwap
 * ParkedCallTimeOut
 * ParkedCallsComplete
 * Pickup
 * PresenceStateChange
 * PresenceStateListComplete
 * PresenceStatus
 * QueueCallerAbandon
 * QueueCallerJoin
 * QueueCallerLeave
 * QueueEntry
 * QueueMember
 * QueueMemberAdded
 * QueueMemberPause
 * QueueMemberPaused
 * QueueMemberPenalty
 * QueueMemberRemoved
 * QueueMemberRinginuse
 * QueueMemberStatus
 * QueueParams
 * QueueStatusComplete
 * QueueSummary
 * QueueSummaryComplete
 * RTCPReceived
 * RTCPReceiverStat
 * RTCPSent
 * RTPReceiverStat
 * RTPSenderStat
 * ReceiveFAX
 * RegistrationsComplete
 * Reload
 * Rename
 * RequestBadFormat
 * RequestNotAllowed
 * RequestNotSupported
 * ResourceListDetail
 * SendFAX
 * SessionLimit
 * SessionTimeout
 * ShowDialPlanComplete
 * Shutdown
 * SoftHangupRequest
 * SpanAlarm
 * SpanAlarmClear
 * Status
 * StatusComplete
 * Success
 * SuccessfulAuth
 * TableEnd
 * TableStart
 * Transfer
 * TransportDetail
 * UnParkedCall
 * UnexpectedAddress
 * Unhold
 * Unknown
 * Unlink
 * Unload
 * UserEvent
 * VarSet
 * VgsmMeState
 * VgsmNetState
 * VgsmSmsRx
 * VoicemailUserEntry
 * VoicemailUserEntryComplete

# Currently Supported Actions

 * AGI
 * AbsoluteTimeout
 * AgentLogoff
 * Agents
 * AttendedTransfer
 * BlindTransfer
 * Bridge
 * BridgeDestroy
 * BridgeInfo
 * BridgeKick
 * BridgeList
 * BridgeTechnologyList
 * BridgeTechnologySuspend
 * BridgeTechnologyUnsuspend
 * CancelAtxfer
 * Challenge
 * Command
 * ConfbridgeKick
 * ConfbridgeList
 * ConfbridgeListRooms
 * ConfbridgeLock
 * ConfbridgeMute
 * ConfbridgeSetSingleVideoSrc
 * ConfbridgeStartRecord
 * ConfbridgeStopRecord
 * ConfbridgeUnlock
 * ConfbridgeUnmute
 * ControlPlayback
 * CoreSettings
 * CoreShowChannels
 * CoreStatus
 * CreateConfig
 * DAHDIDNDoff
 * DAHDIDNDon
 * DAHDIDialOffhook
 * DAHDIHangup
 * DAHDIRestart
 * DAHDIShowChannels
 * DAHDITransfer
 * DBDel
 * DBDelTree
 * DBGet
 * DBPut
 * DeviceStateList
 * DialplanExtensionAdd
 * DialplanExtensionRemove
 * DongleReload
 * DongleReset
 * DongleRestart
 * DongleSendPDU
 * DongleSendSMS
 * DongleSendUSSD
 * DongleShowDevices
 * DongleStart
 * DongleStop
 * Events
 * ExtensionState
 * ExtensionStateList
 * FAXSession
 * FAXSessions
 * FAXStats
 * Filter
 * GetConfig
 * GetConfigJSON
 * GetVar
 * Hangup
 * IAXnetstats
 * IAXpeerlist
 * IAXpeers
 * IAXregistry
 * JabberSend
 * ListCategories
 * ListCommands
 * LocalOptimizeAway
 * LoggerRotate
 * Login
 * Logoff
 * MWIDelete
 * MWIGet
 * MWIUpdate
 * MailboxCount
 * MailboxStatus
 * MixMonitor
 * MixMonitorMute
 * ModuleCheck
 * ModuleLoad
 * ModuleReload
 * ModuleUnload
 * MuteAudio
 * Originate
 * PJSIPNotify
 * PJSIPQualify
 * PJSIPRegister
 * PJSIPShowAors
 * PJSIPShowAuths
 * PJSIPShowContacts
 * PJSIPShowEndpoint
 * PJSIPShowEndpoints
 * PJSIPShowRegistrationInboundContactStatuses
 * PJSIPShowRegistrationsInbound
 * PJSIPShowRegistrationsOutbound
 * PJSIPShowResourceLists
 * PJSIPShowSubscriptionsInbound
 * PJSIPShowSubscriptionsOutbound
 * PJSIPUnregister
 * PRIDebugFileSet
 * PRIDebugFileUnset
 * PRIDebugSet
 * PRIShowSpans
 * Park
 * ParkedCalls
 * Parkinglots
 * Ping
 * PlayDTMF
 * PresenceState
 * PresenceStateList
 * QueueAdd
 * QueueChangePriorityCaller
 * QueueLog
 * QueueMemberRingInUse
 * QueuePause
 * QueuePenalty
 * QueueReload
 * QueueRemove
 * QueueReset
 * QueueRule
 * QueueStatus
 * QueueSummary
 * QueueUnpause
 * Queues
 * Redirect
 * Reload
 * SendText
 * SetVar
 * ShowDialPlan
 * SorceryMemoryCacheExpire
 * SorceryMemoryCacheExpireObject
 * SorceryMemoryCachePopulate
 * SorceryMemoryCacheStale
 * SorceryMemoryCacheStaleObject
 * Status
 * StopMixMonitor
 * UpdateConfig
 * UserEvent
 * VGSMSMSTx
 * VoicemailRefresh
 * VoicemailUserStatus
 * VoicemailUsersList
 * WaitEvent
## Debugging, logging

You can optionally set a [PSR-3](http://www.php-fig.org/psr/psr-3/) compatible logger:
```php
$pami->setLogger($logger);
```

By default, the client will use the [NullLogger](http://www.php-fig.org/psr/psr-3/#1-4-helper-classes-and-interfaces).

# Developers

Run the test suite:

```sh
composer test
```

Other dev tools:

```sh
vendor/bin/phpunit -c test/resources/phpunit.xml
vendor/bin/phpcs --standard=PSR2 src
vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode
```

## Contributing

To contribute:

 * Open a concise pull request with unit tests for new or changed behaviour.
 * Run `composer test` before submitting.
 * Code must comply with [PSR-2](http://www.php-fig.org/psr/psr-2/).

LICENSE
=======
Copyright 2016 Marcelo Gornstein <marcelog@gmail.com>

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

# Maintainers

This fork is maintained by [Pegamento](https://github.com/Pegamento/).

# Thanks To:

* First a formost Marcelo Gornstein, the original designer and developer of
this module. See:[https://github.com/marcelog/PAMI](https://github.com/marcelog/PAMI)
for more information

* Jason Blank <rumpled at github> for helping in the debugging of the queue
functionality and some other ami inconsistencies.

* Francesco Usseglio Gaudi, for help in debugging the Originate action.

* Matías Barletta, for the vgms support.

* Eli Hunter, for helping in bringing in tls compatibility.

* Freddy dafredmail at googlemail, for his help and testing environment to add
dongle support.

* Joshua Elson for his help in trying and debugging in loaded asterisk servers.

* Jacob Kiers for his help in bringing in and testing async agi functionality,
and CEL event support.

* Richard Baar for noticing the lack of eof support when reading from socket,
the JabberEvent, and the ScreenName in JabberAction.

* Scot Opell for helping in debugging stream_get_line() in 5.3.9 and 5.3.10.

* Brian (wormling) for trying and fixing bugs on asyncagi.

* Henning Bragge for helping with newstate event and queues.

* mbonneau for ParkedCall and UnParkedCall events.

* @brenard : Updates to ConfBridge. See:[Orig PR:179](https://github.com/marcelog/PAMI/pull/179)

* @NikolayRevin: Add action QueueMemberRingInUse and updated: QueueMemberEvent and
QueueParamsEvent. See:[Orig PR:177](https://github.com/marcelog/PAMI/pull/177).

* @alexmnv: Added `getSocket()` method to `ClientImpl` class. See:[Orig
  PR:169](https://github.com/marcelog/PAMI/pull/169).

* @edigomes: Added Options-XXXXXX. See:[Orig PR:162](https://github.com/marcelog/PAMI/pull/162).

* @amir200xven: Added CDR EVent. See:[Orig PR:159](https://github.com/marcelog/PAMI/pull/159).

* @wizzle: Added PJSIPShowEndpoints et al. See:[Orig PR:158](https://github.com/marcelog/PAMI/pull/158)
and [Orig PR:157](https://github.com/marcelog/PAMI/pull/157).

* @ilgiz-badamshin: Extended AsyncAgi impl. See:[Orig
  PR:143](https://github.com/marcelog/PAMI/pull/143).

* @Adrian0350: Added DAHDIChannelEvent. See:[Orig
  PR:138](https://github.com/marcelog/PAMI/pull/138).

* @Bloodoff: Added DeviceStateChange/VarSet. See:[Orig
  PR:126](https://github.com/marcelog/PAMI/pull/126).

* @thomasvargiu: Fix getMessages. See:[Orig PR:122](https://github.com/marcelog/PAMI/pull/122).

* @sctt: Added event filters. See:[Orig PR:107](https://github.com/marcelog/PAMI/pull/107).

* @alesf: Added QueueEntry. See:[Orig PR:98](https://github.com/marcelog/PAMI/pull/98).

* @parhamdoustdar: ConfBridge et al. See:[Orig PR:80](https://github.com/marcelog/PAMI/pull/80).
