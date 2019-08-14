<?php

namespace Bigstylee\PrintNode\Response;

/**
 * Class AbstractResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
abstract class AbstractResponse
{
    /**
     * @var null|ResponseHeaders
     */
    protected $headers;

    /**
     * AbstractResponse constructor.
     * @param array $response
     * @param array|null $headers
     */
    public function __construct(iterable $response, iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        foreach ($response as $name => $value) {
            $method = 'set'.ucfirst($name);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return null|ResponseHeaders
     */
    public function getHeaders(): ?ResponseHeaders
    {
        return $this->headers;
    }
}