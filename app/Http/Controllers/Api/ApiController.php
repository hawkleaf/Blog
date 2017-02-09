<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;
    protected $payload;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }

    //Standard Response format for data
    public function respond($headers= [])
    {
        return Response::json($this->payload, $this->getStatusCode(), $headers);
    }

    //Standard Response for absent data
    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    //Standard Response for Succesfull Operation
    public function respondWithSuccess($message = 'Operation excecuted succesfully.')
    {
        return $this->setPayload($message)->respond();
    }
    
    //Standard Response for failed Operation
    public function respondWithError($message)
    {
        return $this->setPayload([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ])->respond();
    }
}
