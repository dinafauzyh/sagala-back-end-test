<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $response = [];

    protected function appendDataToResponse($data)
    {
        $this->response['data'] = $data;
        return $this;
    }

    protected function setMessageToResponse($message)
    {
        $this->response['message'] = $message;
        return $this;
    }

    protected function setStatusCodeResponse($data)
    {
        $this->response['status_code'] = $data;
        return $this;
    }
}
