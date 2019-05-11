<?php

namespace PingCheng\ApiResponse;

use Illuminate\Http\Response;
use PingCheng\ApiResponse\ResponseType\JsonResponse;
use PingCheng\ApiResponse\ResponseType\ResponseBase;
use PingCheng\ApiResponse\Traits\ResponseGeneratable;

/**
 * Class ApiResponse
 */
class ApiResponse
{

    use ResponseGeneratable;

    /**
     * default output format
     * @var string
     */
    protected static $outputFormat = 'json';

    protected static $outputClasses = [
        'json' => JsonResponse::class,
    ];

    /**
     * generate an api message
     *
     * @param int $status_code
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function message(int $status_code, $data, array $headers = []): Response
    {
        $response_class = self::$outputClasses[self::$outputFormat];

        /** @var ResponseBase $response */
        $response = new $response_class;

        $response_headers = $response->getDefaultHeaders();
        $response_headers = array_merge($headers, $response_headers);

        $response->setCode($status_code)->setData($data)->setHeaders($response_headers);
        return $response->output();
    }
}