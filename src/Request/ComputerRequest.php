<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\ComputerResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ComputerRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerRequest extends AbstractRequest
{
    /**
     * @param integer $computer
     * @return ComputerResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse(int $computer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('computers/%d', $computer)));

        return new ComputerResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}