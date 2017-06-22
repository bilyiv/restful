<?php

namespace Bilyiv\Restful\Tests\Traits;

use Bilyiv\Restful\Traits\HttpResponseData;
use Tests\TestCase;

/**
 * Class HttpResponseDataTest
 *
 * @package Bilyiv\Restful\Tests\Traits
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class HttpResponseDataTest extends TestCase
{
    use HttpResponseData;

    /**
     * Test setting http status code of the response.
     */
    public function testStatus()
    {
        $this->status(204);

        $this->assertEquals($this->code, 204);
    }

    /**
     * Test adding http header to the response.
     */
    public function testHeader()
    {
        $this->header('header', 'stub');
        $this->header('other', 'stub');

        $this->assertEquals($this->headers, ['header' => 'stub', 'other' => 'stub']);
    }

    /**
     * Test adding a data to the response with specify key.
     */
    public function testAdd()
    {
        $this->add('data', 'stub');
        $this->add('meta', 'stub');

        $this->assertEquals($this->data, ['data' => 'stub', 'meta' => 'stub']);
    }
}
