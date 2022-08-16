<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use JsonResponser;

    public function login(Request $request)
    {
        $token = Auth::attempt($request->only('email', 'password'));
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        return $this->successResponse([
            'type' => 'bearer',
            'token' => $token
        ]);
    }

    public function register(Request $request)
    {

        $this->userService->create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return $this->successResponse();
    }

    public function logout()
    {
        Auth::logout();
        return $this->successResponse('Successfully logged out');
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
