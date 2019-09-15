<?php

namespace App\Http\Controllers\Traits;

use Symfony\Component\HttpFoundation\Response as FoundationResponse;
use Response;

trait ApiResponse
{
    /**
     * @var int
     */
    protected $statusCode = FoundationResponse::HTTP_OK;
    protected $code = FoundationResponse::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->code = $statusCode;

        if($statusCode > 600){
            $this->statusCode = 200;
        }else{
            $this->statusCode = $statusCode;
        }

        return $this;
    }

    /**
     * @param $data
     * @param array $header
     * @return mixed
     */
    public function respond($data, $header = [])
    {
        return Response::json($data, $this->statusCode, $header);
    }

    /**
     * @param $status
     * @param array $data
     * @param null $code
     * @return mixed
     */
    public function status($status, array $data, $code = null)
    {

        if ($code) {
            $this->setStatusCode($code);
        }

        $status = [
            'status' => $status,
            'code' => $this->code
        ];

        $data = array_merge($status, $data);
        return $this->respond($data);

    }

    /**
     * @param $message
     * @param string $status
     * @return mixed
     */
    public function message($message, $status = "success")
    {

        return $this->status($status, [
            'message' => $message
        ]);
    }

    /**
     * @param $message
     * @param int $code
     * @param string $status
     * @return mixed
     */
    public function failed($message, $code = FoundationResponse::HTTP_OK, $status = 'error')
    {

        return $this->setStatusCode($code)->message($message, $status);
    }


    /**
     * @param $data
     * @param string $status
     * @return mixed
     * @code 200
     */
    public function success($data = [], $message = "success", $status = "success")
    {

        $data = is_array($data) ? $data : compact('data');
        $data = array_merge($data,[
            'message' => $message
        ]);
        return $this->status($status, $data);
    }

    /**
     * @param string $message
     * @return mixed
     * @code 201
     */
    public function created($message = "created")
    {
        return $this->setStatusCode(FoundationResponse::HTTP_CREATED)->message($message);
    }


    /**
     * @param string $message
     * @return mixed
     * @code 400
     */
    public function badRequest($message = "Arguments Error")
    {
        return $this->failed($message, FoundationResponse::HTTP_BAD_REQUEST);
    }


    /**
     * @param string $message
     * @return mixed
     * @code 403
     */
    public function forbidden($message = "Access Forbidden")
    {

        return $this->failed($message, FoundationResponse::HTTP_FORBIDDEN);
    }

    /**
     * @param $message
     * @return mixed
     * @code 401
     */
    public function unauthorized($message = 'unauthorized')
    {
        return $this->failed($message, FoundationResponse::HTTP_UNAUTHORIZED);
    }

    /**
     * @param string $message
     * @return mixed
     * @code 404
     */
    public function notFound($message = 'Not Found!')
    {
        return $this->failed($message, Foundationresponse::HTTP_NOT_FOUND);
    }

    /**
     * @param string $message
     * @return mixed
     * @code 500
     */
    public function internalError($message = "Internal Error!")
    {
        return $this->failed($message, FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
    }


    /**
     * @param string $message
     * @return mixed
     * @code 500
     */
    public function SaveDataError($message = "Save Data Error")
    {
        return $this->failed($message, 603);
    }

    /**
     * @param array $data
     * @param string $status
     * @return mixed
     * @code 204
     */
    public function noMoreData($data = [], $status = 'success')
    {
        return $this->status($status, compact('data'),204);
    }

}
