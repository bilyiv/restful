<?php

namespace Bilyiv\Restful\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class UnprocessableEntityHttpException
 *
 * @package Bilyiv\Restful\Exceptions
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class UnprocessableEntityHttpException extends HttpException
{
    /**
     * Constructor.
     *
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param int        $code     The internal exception code
     */
    public function __construct($message = null, \Exception $previous = null, $code = 0)
    {
        parent::__construct(422, $message, $previous, array(), $code);
    }
}
