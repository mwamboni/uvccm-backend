<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data, $message = null)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function error($message, $statusCode = JsonResponse::HTTP_UNAUTHORIZED || null)
    {
        return response()->json([
            'status'   => false,
            'message'   => $message,
            'status'    => $statusCode,
        ], $statusCode);
    }

    public static function validationError($errors)
    {
        return response()->json([
            'status' => false,
            'message' => 'Validation errors',
            'errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
