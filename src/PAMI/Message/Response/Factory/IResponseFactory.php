<?php

declare(strict_types=1);

namespace PAMI\Message\Response\Factory;

use PAMI\Exception\PAMIException;
use PAMI\Message\Response\Response;

interface IResponseFactory
{
    /**
     * This is our factory method.
     *
     * @param string $responseMessage Literal message as received from ami.
     * @param \PAMI\Message\OutgoingMessage|null $requestMessage
     *
     * @return Response
     * @throws PAMIException
     */
    public function createFromRaw(string $responseMessage, ?\PAMI\Message\OutgoingMessage $requestMessage = null): Response;
}
