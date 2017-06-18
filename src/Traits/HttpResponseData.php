<?php

namespace Bilyiv\Restful\Traits;

/**
 * Trait HttpResponseData
 *
 * @package Bilyiv\Restful\Traits
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
trait HttpResponseData
{
    /**
     * A http status code.
     *
     * @var int
     */
    protected $code = 200;

    /**
     * Array of response headers.
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Array of response data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Set http status code of the response.
     *
     * @param int $code
     * @return $this
     */
    public function status(int $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Add a header to the response.
     *
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function header(string $name, string $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * Add an array of data to the response with specify key.
     *
     * @param string $key
     * @param array $data
     * @return $this
     */
    public function add(string $key, array $data)
    {
        $this->data[$key] = $data;

        return $this;
    }
}
