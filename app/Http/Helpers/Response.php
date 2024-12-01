<?php

namespace App\Http\Helpers;

use Illuminate\Http\JsonResponse;

class Response
{
    public static function success($message, $data = []): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response);
    }

    public static function fail($message, $data = []): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response);
    }

    public static function error($message, $data = []): JsonResponse
    {
        $response = [
            'is_error' => true,
            'message' => $message,
        ];

        if ($data) {
            $response['errors'] = $data;
        }

        return response()->json($response, 403);
    }
}
