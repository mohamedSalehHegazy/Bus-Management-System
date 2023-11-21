<?php

use App\Models\ExceptionLog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

if (!function_exists('apiResponse')) {
    /**
     * Unified Api Response
     * @param $success
     * @param $message
     * @param null $data
     * @return json
     */
    function apiResponse($success, $message, $statusCode, $data = null)
    {
        $response =  [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode);
    }
}
