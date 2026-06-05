# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.1] - 2026-06-05

### Changes

- Verified and ensured full compatibility with PHP 8.4.
- Corrected type hints and PHPDoc types across `IClient` and `ClientImpl`.
- Fixed the `stream_socket_shutdown` test mock signature so it matches the built-in.
- `ClientImpl::open()` now detects and reports failed AMI logins instead of silently continuing.
- The `event_mask` client option is now actually correctly applied to the login action.
- `CommandResponse::getCommandOutput()` now returns the joined command output instead of throwing.
- `ComplexResponse` no longer triggers an undefined-property warning when parsing multi-table responses.
- Removed the stale, unused `ClientImpl.php.new` duplicate file from the repository.
- Raised the declared minimum PHP version to 8.1 and bounded the `psr/log` constraint.
- Modernized the dev tooling so the suite installs and runs on PHP 8.4 (PHPUnit `^9.6`); removed abandoned/unused dev dependencies and moved `marcelog/pagi` to `suggest`.
- Removed stale, non-existent test suites from the PHPUnit configuration.
- `ClientImpl::open()` now reports stream read errors using the correct stream error API instead of the `ext-sockets` functions.
- Credentials (`Secret`, `Password`, `MD5Key`, `AuthPassword`) are now masked in debug logs.
- Internal cleanup in `ClientImpl`: removed the unused `declare(ticks=1)`, normalized `lastActionId` to `null`, and corrected stale/malformed PHPDoc.
- Removed legacy AMI support for Asterisk modules deprecated or dropped in Asterisk 20:
  `res_monitor` (`Monitor`, `StopMonitor`, `PauseMonitor`, `UnpauseMonitor`, `ChangeMonitor` actions and `MonitorStart`/`MonitorStop` events),
  `chan_sip` (`Sippeers`, `SIPshowpeer`, `SIPshowregistry`, `SIPnotify`, `Sipqualifypeer`, `SIPpeerstatus` actions and `PeerEntry`, `PeerlistComplete`, `PeerStatus`, `Registry`, `SIPQualifyPeerDone` events),
  `app_meetme` (`MeetmeList`, `MeetmeListRooms`, `MeetmeMute`, `MeetmeUnmute` actions and `MeetmeEnd`, `MeetmeJoin`, `MeetmeLeave`, `MeetmeMute`, `MeetmeTalking`, `MeetmeTalkRequest` events),
  and `chan_skinny` (`SKINNYdevices`, `SKINNYlines`, `SKINNYshowdevice`, `SKINNYshowline` actions).
- FAX AMI support (`FAXSession`, `FAXSessions`, `FAXStats`, `ReceiveFAX`, `SendFAX`, etc.) is unchanged; it targets `res_fax`, not the deprecated `app_fax` module.

### Behaviour changes

#### Failed AMI login now fails fast

Previously, when `open()` was called with invalid credentials, the login error
response was discarded and `open()` returned as if the connection had succeeded.
The failure only surfaced later (typically the next `send()` throwing after
Asterisk closed the connection, or a "Read timeout").

As of 2.1, `open()` checks the login response and throws a
`PAMI\Client\Exception\ClientException` immediately when authentication fails,
including the rejection message returned by Asterisk.

What this means for you:
- No API or signature changes are required in your code.
- `open()` already throws `ClientException` for connection and unknown-peer
  errors, so existing `try/catch` blocks around `open()` will catch this case too.
- The only observable difference is that authentication failures now surface
  earlier (during `open()`) and with a clearer message.

#### The `event_mask` option is now honoured

Previously, the `event_mask` value passed in the client options was stored but
never sent to Asterisk, so all events were received regardless of the setting.

As of 2.1, `event_mask` is forwarded to the login action as the `Events:` key,
so Asterisk filters the event stream accordingly.

What this means for you:
- Deployments that never set `event_mask` are unaffected (the default omits the
  key, identical to previous behaviour).
- Deployments that set `event_mask` may now receive a different (typically
  smaller) set of events, because the filter is finally being applied. Review
  your configured `event_mask` value before upgrading.

#### `CommandResponse::getCommandOutput()` returns a string instead of throwing

Previously this method was declared to return a `string` but returned the
internal array of output lines, raising a `TypeError` on every call.

As of 2.1, it returns the command output lines joined into a single string. The
raw array is still available via `getCommandOutputArray()`.

What this means for you:
- No API or signature changes are required in your code.
- Calls to `getCommandOutput()` now succeed and return the output as a string
  (an empty string when there is no output) rather than throwing.

#### `ComplexResponse` no longer warns on multi-table responses

Previously, after a table was completed the internal `temptable` property was
`unset()`, and a subsequent read of it (`is_array($this->temptable)`) emitted an
"Undefined property" warning while parsing responses that contain multiple
tables.

As of 2.1, the property is reset to `null` instead of being unset, so the check
behaves correctly and no warning is produced.

What this means for you:
- No API or behavioural changes to parsed results; this only removes a spurious
  warning (and any noise it added to logs/output).

#### Correct error reporting on socket read failure

Previously, when reading the Asterisk banner failed, `open()` built its error
message with the `ext-sockets` functions (`socket_strerror`/`socket_last_error`),
which do not apply to the stream socket the client uses and require an extension
that may not be loaded.

As of 2.1, the error message is sourced from `error_get_last()`, so the reported
reason is accurate and there is no dependency on `ext-sockets`.

What this means for you:
- No API changes. Only the error message text on this failure path changes
  (it is now accurate instead of empty/misleading).

#### Credentials are masked in debug logs

Previously, debug-level logging emitted the full serialized AMI message,
including the `Secret:` value of the login action in cleartext.

As of 2.1, the values of sensitive keys (`Secret`, `Password`, `MD5Key`,
`AuthPassword`) are replaced with `****` in both the "Sending" and "Received"
debug log output.

What this means for you:
- No API changes. If you parse the library's debug log output, sensitive values
  now appear as `****` instead of their cleartext value.

#### Legacy AMI actions and events removed for Asterisk 20

As of 2.1, PAMI no longer ships PHP classes for AMI features tied to Asterisk
modules that are deprecated or no longer built by default in Asterisk 20. This
includes `res_monitor`, `chan_sip`, `app_meetme`, and `chan_skinny`.

What this means for you:
- If your application still imports or instantiates any of the removed classes,
  upgrade to the modern equivalents before moving to 2.1:
  - Call recording/spy: use `MixMonitorAction`, `StopMixMonitorAction`, and
    `MixMonitorMuteAction` instead of the `Monitor*` actions.
  - SIP endpoint management: use the `PJSIP*` actions and events instead of the
    `SIP*` / `Peer*` / `Registry` classes.
  - Conferencing: use the `Confbridge*` actions and events instead of `Meetme*`.
  - Cisco SCCP (SKINNY): no replacement is provided; remove any usage.
- FAX handling is unaffected; continue using the existing `FAX*` actions and
  `ReceiveFAX`/`SendFAX` events.
- Deployments on Asterisk 18 or older that still rely on the removed modules may
  need to stay on PAMI 2.0.x, or migrate their dialplan/AMI integration to the
  supported APIs above.
