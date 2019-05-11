<?php


namespace PingCheng\ApiResponse\ResponseType;


/**
 * Class JsonResponse
 * @package PingCheng\ApiResponse\ResponseType
 */
class JsonResponse extends ResponseBase
{

    protected $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * generate the api response string
     * @return string
     */
    public function stringify(): string
    {
        return json_encode([
            'status_code' => $this->responseCode,
            'data' => $this->responseData,
        ]);
    }
}