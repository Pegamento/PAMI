<?php
/**
 * The 2.1 value conversion, exposed for callers that still want it.
 *
 * PHP Version 8
 *
 * @category   Pami
 * @package    Test
 * @subpackage Regression
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
namespace PAMI\Message {
    use PHPUnit\Framework\TestCase as BaseTestCase;
    use PHPUnit\Framework\Attributes\Test;

    class Test_Sanitize extends BaseTestCase
    {
        private function message(): Message
        {
            return new class extends Message {
                public function put(string $key, string $value): void
                {
                    $this->setKey($key, $value);
                }
            };
        }

        #[Test]
        public function sanitize_matches_the_2_1_conversions()
        {
            $this->assertNull(Message::sanitize(''));
            $this->assertSame(10, Message::sanitize('10'));
            $this->assertSame(-10, Message::sanitize('-10'));
            $this->assertSame(-10.0, Message::sanitize('-010'));
            $this->assertSame(10.5, Message::sanitize('10.5'));
            $this->assertSame(0, Message::sanitize('0'));
            $this->assertSame(0, Message::sanitize('-0'));
            $this->assertSame(0, Message::sanitize('+0'));
            $this->assertSame('00', Message::sanitize('00'));
            $this->assertSame('0123', Message::sanitize('0123'));
            $this->assertSame('+31', Message::sanitize('+31'));
            $this->assertSame('1234.10', Message::sanitize('1234.10'));
            $this->assertSame('10.0', Message::sanitize('10.0'));
            $this->assertSame('10.50', Message::sanitize('10.50'));
            $this->assertSame('0.0', Message::sanitize('0.0'));
            $this->assertTrue(Message::sanitize('YeS'));
            $this->assertFalse(Message::sanitize('Off'));
            $this->assertSame('&lt;Alice&gt;', Message::sanitize('<Alice>'));
            $this->assertSame('plain', Message::sanitize('plain'));
        }

        #[Test]
        public function sanitized_reads_keep_identifier_keys_raw()
        {
            $message = $this->message();
            $message->put('Count', '10');
            $message->put('Extension', '0123');
            $message->put('Enabled', 'yes');
            $message->put('Note', '');
            $message->put('Uniqueid', '1793026430.319097');
            $message->put('Linkedid', '1793026430.319097');
            $message->put('ActionID', '10');
            $message->put('DestUniqueid', '1793026430.319097');

            $this->assertSame('10', $message->getKey('Count'));
            $this->assertSame(10, $message->getSanitizedKey('Count'));
            $this->assertSame('0123', $message->getSanitizedKey('Extension'));
            $this->assertTrue($message->getSanitizedKey('Enabled'));
            $this->assertNull($message->getSanitizedKey('Note'));
            $this->assertNull($message->getSanitizedKey('Missing'));
            $this->assertSame((float) '1793026430.319097', $message->getSanitizedKey('Uniqueid'));
            $this->assertSame((float) '1793026430.319097', $message->getSanitizedKey('LinkedID'));
            $this->assertSame(10, $message->getSanitizedKey('ActionID'));
            $this->assertSame((float) '1793026430.319097', $message->getSanitizedKey('DestUniqueid'));

            $this->assertSame(
                [
                    'count' => 10,
                    'extension' => '0123',
                    'enabled' => true,
                    'note' => null,
                    'uniqueid' => (float) '1793026430.319097',
                    'linkedid' => (float) '1793026430.319097',
                    'actionid' => 10,
                    'destuniqueid' => (float) '1793026430.319097',
                ],
                $message->getSanitizedKeys()
            );
        }
    }
}
