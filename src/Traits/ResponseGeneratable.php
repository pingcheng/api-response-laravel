<?php


namespace PingCheng\ApiResponse\Traits;


use Illuminate\Http\Response;
use PingCheng\ApiResponse\ResponseType\ResponseBase;

trait ResponseGeneratable
{
    /**
     * 200
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function ok($data, array $headers = []): Response
    {
        return self::message(200, $data, $headers);
    }

    /**
     * 400
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function badRequest($data, array $headers = []): Response
    {
        return self::message(400, $data, $headers);
    }

    /**
     * 401
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function unauthorized($data, array $headers = []): Response
    {
        return self::message(401, $data, $headers);
    }

    /**
     * 403
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function forbidden($data, array $headers = []): Response
    {
        return self::message(403, $data, $headers);
    }

    /**
     * 404
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function notFound($data, array $headers = []): Response
    {
        return self::message(404, $data, $headers);
    }

    /**
     * 500
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function internalServerError($data, array $headers = []): Response
    {
        return self::message(500, $data, $headers);
    }

    /**
     * 503
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public static function serviceUnavailable($data, array $headers = []): Response
    {
        return self::message(503, $data, $headers);
    }
}