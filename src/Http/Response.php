<?php

namespace Bilyiv\Restful\Http;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\{
    AccessDeniedHttpException,
    HttpException,
    NotFoundHttpException,
    UnauthorizedHttpException
};

/**
 * Class Response
 *
 * @package Bilyiv\Restful\Http
 */
class Response
{
    /**
     * Array of headers.
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Array of meta data.
     *
     * @var array
     */
    protected $meta = [];

    /**
     * Add an array of headers to the response.
     *
     * @param array $headers
     * @return $this
     */
    public function headers(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Add an array of meta data to the response.
     *
     * @param array $meta
     * @return $this
     */
    public function meta(array $meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Send unauthorized error.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorUnauthorized(string $message = 'Unauthorized'): HttpException
    {
        throw new UnauthorizedHttpException($message);
    }

    /**
     * Send access denied error.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorAccessDenied(string $message = 'Forbidden'): HttpException
    {
        throw new AccessDeniedHttpException($message);
    }

    /**
     * Send not found error.
     *
     * @param string $message
     * @return HttpException
     */
    public function errorNotFound(string $message = 'Not found'): HttpException
    {
        throw new NotFoundHttpException($message);
    }

    /**
     * Send an error.
     *
     * @param string $message
     * @param int $code
     * @return HttpException
     */
    public function error(string $message, int $code = 500): HttpException
    {
        throw new HttpException($code, $message);
    }

    /**
     * Send no content response.
     *
     * @return JsonResponse
     */
    public function noContent(): JsonResponse
    {
        return $this->send(null, 204);
    }

    /**
     * Send created response.
     *
     * @param array $data
     * @param string $location
     * @return JsonResponse
     */
    public function created(array $data, string $location): JsonResponse
    {
        $this->headers(['Location' => $location])->send($data, 201);
    }

    /**
     * Send a response.
     *
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    public function send(array $data = null, int $code = 200): JsonResponse
    {
        return new JsonResponse(['data' => $data], $code, $this->headers);
    }
}