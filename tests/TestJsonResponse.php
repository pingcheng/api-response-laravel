<?php


use PHPUnit\Framework\TestCase;
use PingCheng\ApiResponse\ResponseType\JsonResponse;

class TestJsonResponse extends TestCase
{
    public function testStringResponse(): void
    {
        $response = new JsonResponse();
        $response->setCode(200)->setData('hello');
        $this->assertEquals(
            '{"status_code":200,"data":"hello"}',
            $response->stringify()
        );
    }

    public function testIntegerResponse(): void
    {
        $response = new JsonResponse();
        $response->setCode(200)->setData(1000);
        $this->assertEquals(
            '{"status_code":200,"data":1000}',
            $response->stringify()
        );
    }

    public function testArrayResponse(): void
    {
        $response = new JsonResponse();
        $response->setCode(200)->setData([
            'id' => 1,
        'name' => 'hello',
        ]);
        $this->assertEquals(
            '{"status_code":200,"data":{"id":1,"name":"hello"}}',
            $response->stringify()
        );
    }

    public function testObjectResponse(): void
    {
        $response = new JsonResponse();
        $response->setCode(200)->setData((object) [
            'id' => 1,
            'name' => 'hello',
        ]);
        $this->assertEquals(
            '{"status_code":200,"data":{"id":1,"name":"hello"}}',
            $response->stringify()
        );
    }

    public function testGetDefaultHeaders(): void
    {
        $response = new JsonResponse();
        $default_headers = $response->getHeaders();
        $this->assertArrayHasKey('Content-Type', $default_headers);
        $this->assertEquals('application/json', $default_headers['Content-Type']);
    }

    public function testSetHeader(): void
    {
        $response = new JsonResponse();
        $response->setHeader('X-Custom-Header', 'Testing');

        $headers = $response->getHeaders();
        $this->assertArrayHasKey('X-Custom-Header', $headers);
        $this->assertEquals('Testing', $headers['X-Custom-Header']);
    }

    public function testSetHeaders(): void
    {
        $extra_headers = [
            'h1' => 'v1',
            'h2' => 'v2',
        ];
        $response = new JsonResponse();
        $default_headers = $response->getHeaders();

        $response->setHeaders($extra_headers);
        $new_headers = $response->getHeaders();

        $merged_headers = array_merge($default_headers, $extra_headers);
        $this->assertEquals($merged_headers, $new_headers);

    }
}