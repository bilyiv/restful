<?php

namespace Bilyiv\Restful\Http;

use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 *
 * @package Bilyiv\Restful\Http
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class Controller extends BaseController
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * Controller constructor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}