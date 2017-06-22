<?php

namespace Bilyiv\Restful\Tests\Http;

use Bilyiv\Restful\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tests\TestCase;

/**
 * Class ResponseTest
 *
 * @package Bilyiv\Restful\Tests\Http
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class ResponseTest extends TestCase
{
    /**
     * Test adding data to the response.
     */
    public function testData()
    {
        $response = new Response();
        $result = $response->data('test')->send();

        $this->assertEquals($result, new JsonResponse(['data' => 'test'], 200));
    }

    /**
     * Test adding meta to the response.
     */
    public function testMeta()
    {
        $response = new Response();
        $result = $response->meta(['test'])->send();

        $this->assertEquals($result, new JsonResponse(['meta' => ['test']], 200));
    }

    /**
     * Test no content response.
     */
    public function testNoContent()
    {
        $response = new Response();
        $result = $response->noContent();

        $this->assertEquals($result, new JsonResponse([], 204));
    }

    /**
     * Test created response.
     */
    public function testCreated()
    {
        $response = new Response();
        $result = $response->created('test')->send();

        $this->assertEquals($result, new JsonResponse([], 201, ['Location' => 'test']));
    }

    /**
     * Test paginated response.
     */
    public function testPaginated()
    {
        // @todo
        $this->assertEquals(true, true);
    }

    /**
     * Test send response.
     */
    public function testSend()
    {
        $response = new Response();
        $result = $response->send();

        $this->assertEquals($result, new JsonResponse([], 200));
    }
}
