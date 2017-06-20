<?php

namespace Bilyiv\Restful\Tests\Traits;

use Bilyiv\Restful\Traits\HttpExceptions;
use Symfony\Component\HttpKernel\Exception\{
    AccessDeniedHttpException,
    BadRequestHttpException,
    ConflictHttpException,
    HttpException,
    NotFoundHttpException,
    UnauthorizedHttpException
};
use Tests\TestCase;

/**
 * Class HttpExceptionsTest
 *
 * @package Bilyiv\Restful\Tests\Traits
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class HttpExceptionsTest extends TestCase
{
    use HttpExceptions;

    /**
     * Test bad request http exception.
     */
    public function testErrorBadRequest()
    {
        $this->expectException(BadRequestHttpException::class);

        $this->errorBadRequest();
    }

    /**
     * Test unauthorized http exception.
     */
    public function testErrorUnauthorized()
    {
        $this->expectException(UnauthorizedHttpException::class);

        $this->errorUnauthorized();
    }

    /**
     * Test access denied http exception.
     */
    public function testErrorAccessDenied()
    {
        $this->expectException(AccessDeniedHttpException::class);

        $this->errorAccessDenied();
    }

    /**
     * Test not found http exception.
     */
    public function testErrorNotFound()
    {
        $this->expectException(NotFoundHttpException::class);

        $this->errorNotFound();
    }

    /**
     * Test conflict http exception.
     */
    public function testErrorConflict()
    {
        $this->expectException(ConflictHttpException::class);

        $this->errorConflict();
    }

    /**
     * Test http exception.
     */
    public function testError()
    {
        $this->expectException(HttpException::class);

        $this->error();
    }
}
