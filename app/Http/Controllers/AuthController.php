<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\JsonResponser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use JsonResponser;

    public function __construct(protected UserService $userService)
    {
    }

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

    public function logout()
    {
        Auth::logout();
        return $this->successResponse('Successfully logged out');
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'type' => 'bearer',
            'token' => Auth::refresh(),
        ]);
    }


    public function register(CreateUserRequest $request)
    {
        $this->userService->createUser($request->all());
        return $this->successResponse();
    }

    public function sendVerifyEmailMail(Request $request, User $user)
    {
    }
}
