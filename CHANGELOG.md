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
