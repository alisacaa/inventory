<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function success($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'status'  => 'success',
            'data'    => $data,
            'message' => $message,
        ], $code);
    }

    public function error($message = 'Error', $code = 500)
    {
        return response()->json([
            'status'  => 'error',
            'data'    => null,
            'message' => $message,
        ], $code);
    }
}