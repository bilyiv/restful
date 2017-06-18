<?php

namespace Bilyiv\Restful\Http;

use Bilyiv\Restful\Traits\{HttpExceptions, HttpResponseData};
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Response
 *
 * @package Bilyiv\Restful\Http
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class Response
{
    use HttpExceptions, HttpResponseData;

    /**
     * Add an array of data with data key to the response.
     *
     * @param mixed $data
     * @return $this
     */
    public function data($data)
    {
        $this->add('data', $data);

        return $this;
    }

    /**
     * Add an array of meta data with meta key to the response.
     *
     * @param array $meta
     * @return $this
     */
    public function meta(array $meta)
    {
        $this->add('meta', $meta);

        return $this;
    }

    /**
     * Return no content response.
     *
     * @return JsonResponse
     */
    public function noContent()
    {
        return $this->status(204)->send();
    }

    /**
     * Return created response.
     *
     * @param string $location
     * @return JsonResponse
     */
    public function created(string $location)
    {
        return $this->status(201)->header('Location', $location)->send();
    }

    /**
     * Return paginated response.
     *
     * @param Paginator $paginator
     * @return JsonResponse
     */
    public function paginated(Paginator $paginator)
    {
        return $this->data($paginator->items())
            ->add('links', [
                'self' => Request::fullUrl(),
                'next' => $paginator->nextPageUrl(),
                'prev' => $paginator->previousPageUrl()
            ])
            ->meta([
                'count' => $paginator->count()
            ])
            ->send();
    }

    /**
     * Return a json response.
     *
     * @return JsonResponse
     */
    public function send()
    {
        return new JsonResponse($this->data, $this->code, $this->headers);
    }
}
