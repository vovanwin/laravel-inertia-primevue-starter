<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function sendError($data = [], $http_code_response = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $data,
            'data' => [],
        ], $http_code_response);
    }

    public function sendSuccess($data = [], $http_code_response = 200)
    {
        if ('string' == gettype($data)) {
            return response()->json([
                'success' => true,
                'message' => $data,
                'data' => $data,
            ], $http_code_response);
        }

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $data,
        ], $http_code_response);
    }
}
