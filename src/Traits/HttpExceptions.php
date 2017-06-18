<?php

namespace Bilyiv\Restful\Traits;

use Symfony\Component\HttpKernel\Exception\{
    AccessDeniedHttpException,
    BadRequestHttpException,
    ConflictHttpException,
    HttpException,
    NotFoundHttpException,
    UnauthorizedHttpException
};

/**
 * Trait HttpExceptions
 *
 * @package Bilyiv\Restful\Traits
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
trait HttpExceptions
{
    /**
     * Throw bad request http exception.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorBadRequest(string $message = 'Bad request'): HttpException
    {
        throw new BadRequestHttpException($message);
    }

    /**
     * Throw unauthorized http exception.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorUnauthorized(string $message = 'Unauthorized'): HttpException
    {
        throw new UnauthorizedHttpException($message);
    }

    /**
     * Throw access denied http exception.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorAccessDenied(string $message = 'Forbidden'): HttpException
    {
        throw new AccessDeniedHttpException($message);
    }

    /**
     * Throw not found http exception.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorNotFound(string $message = 'Not found'): HttpException
    {
        throw new NotFoundHttpException($message);
    }

    /**
     * Throw conflict http exception.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorConflict(string $message = 'Conflict'): HttpException
    {
        throw new ConflictHttpException($message);
    }

    /**
     * Throw http exception.
     *
     * @param string $message
     * @param int $code
     * @return HttpException
     */
    public function error(string $message, int $code = 500): HttpException
    {
        throw new HttpException($code, $message);
    }
}