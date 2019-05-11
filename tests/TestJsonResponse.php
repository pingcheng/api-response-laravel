<?php


use PingCheng\ApiResponse\ResponseType\JsonResponse;
use Tests\TestCase;

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
}