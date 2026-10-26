<?php

declare(strict_types=1);

namespace PAMI\Message\Action;

/**
 * AMI MessageSend action.
 *
 * @see https://docs.asterisk.org/Latest_API/API_Documentation/AMI_Actions/MessageSend/
 */
class MessageSendAction extends ActionMessage
{
    /**
     * @param string               $to      Destination (e.g. pjsip:sipuser)
     * @param string               $body    Message body
     * @param array<string,string> $headers MESSAGE_DATA variables (SIP headers / Content-Type)
     */
    public function __construct(string $to, string $body, array $headers = [])
    {
        parent::__construct('MessageSend');
        $this->setKey('To', $to);
        $this->setKey('Body', $body);
        foreach ($headers as $name => $value) {
            $this->setVariable($name, (string) $value);
        }
    }
}
