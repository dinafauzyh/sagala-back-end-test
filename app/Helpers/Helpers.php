<?php

if (!function_exists("setResponse")) {
    function setResponse($request)
    {
        $response = array();
        if (array_key_exists('status_code', $request)) {
            $response['status_code'] = $request['status_code'];
        }

        if (array_key_exists('message', $request)) {
            $response['message'] = $request['message'];
        }

        if (array_key_exists('errors', $request)) {
            $response['errors'] = $request['errors'];
        }

        if (array_key_exists('data', $request)) {
            $response['data'] = $request['data'];
        }

        return response()->json($response)->setStatusCode($response['status_code']);
    }
}