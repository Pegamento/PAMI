<?php

declare(strict_types=1);

namespace PAMI\Message\Action;

/**
 * AMI MessageSend action.
 *
 * A body that contains CR or LF is sent as Base64Body. AMI values cannot
 * contain line breaks, and Asterisk provides Base64Body for that case.
 *
 * @see https://docs.asterisk.org/Latest_API/API_Documentation/AMI_Actions/MessageSend/
 */
class MessageSendAction extends ActionMessage
{
    /**
     * @param string               $to      Destination (e.g. pjsip:sipuser)
     * @param string               $body    Message body. Newlines are sent as Base64Body.
     * @param array<string,string> $headers MESSAGE_DATA variables (SIP headers / Content-Type)
     * @param string|null          $from    Optional source of the message
     */
    public function __construct(string $to, string $body, array $headers = [], ?string $from = null)
    {
        parent::__construct('MessageSend');
        $this->setKey('To', $to);
        if ($from !== null) {
            $this->setFrom($from);
        }
        $this->setBody($body);
        foreach ($headers as $name => $value) {
            $this->setVariable($name, (string) $value);
        }
    }

    /**
     * Sets the optional From field.
     *
     * @param string $from Source of the message (e.g. pjsip:me).
     *
     * @return void
     */
    public function setFrom(string $from): void
    {
        $this->setKey('From', $from);
    }

    /**
     * Stores a single-line body as Body, or a multi-line body as Base64Body.
     *
     * @param string $body Message body.
     *
     * @return void
     */
    private function setBody(string $body): void
    {
        if (strpbrk($body, "\r\n") !== false) {
            $this->setKey('Base64Body', base64_encode($body));
            return;
        }
        $this->setKey('Body', $body);
    }
}
