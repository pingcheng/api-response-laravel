<?php


namespace PingCheng\ApiResponse\ResponseType;


use Illuminate\Http\Response;

/**
 * Class ResponseBase
 * @package PingCheng\ApiResponse\ResponseType
 */
abstract class ResponseBase
{

    protected $responseCode = 200;
    protected $responseData;
    protected $headers = [];

    /**
     * generate the api response string
     * @return string
     */
    abstract public function stringify(): string ;

    /**
     * set a new http status code
     *
     * @param int $status_code
     *
     * @return $this
     */
    public function setCode(int $status_code): self
    {
        $this->responseCode = $status_code;
        return $this;
    }

    /**
     * set a new http response data
     * can be any data type
     * this field would be auto converted to json format
     *
     * @param $data
     *
     * @return ResponseBase
     */
    public function setData($data): self
    {
        $this->responseData = $data;
        return $this;
    }

    public function getDefaultHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     *
     * @return ResponseBase
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * generate the final api response in string
     * with correct status code and headers
     *
     * @return Response
     */
    public function output(): Response
    {
        return response($this->stringify(), $this->responseCode, $this->headers);
    }
}