<?php

namespace Bilyiv\Restful\Tests\Exceptions;

use Bilyiv\Restful\Exceptions\UnprocessableEntityHttpException;
use Tests\TestCase;

/**
 * Class UnprocessableEntityHttpExceptionTest
 *
 * @package Bilyiv\Restful\Tests\Exceptions
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class UnprocessableEntityHttpExceptionTest extends TestCase
{
    /**
     * @var UnprocessableEntityHttpExceptionTest
     */
    protected $exception;

    /**
     * UnprocessableEntityHttpExceptionTest constructor.
     */
    public function __construct()
    {
        $this->exception = new UnprocessableEntityHttpException('Test');
    }

    /**
     * Test exception status code.
     */
    public function testExceptionStatusCode()
    {
        $this->assertEquals($this->exception->getStatusCode(), 422);
    }

    /**
     * Test exception message.
     */
    public function testExceptionMessage()
    {
        $this->assertEquals($this->exception->getMessage(), 'Test');
    }
}
