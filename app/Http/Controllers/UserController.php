<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\JsonResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    use JsonResponser;
    public function __construct(protected UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $this->userService->create($request->all());
        return $this->successResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile(User $user)
    {
        $userData = $this->userService->getProfile($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfileRequest $request, User $user)
    {
        $this->userService->updateProfile($user, $request->all());

        return $this->successResponse('Success update profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return $this->successResponse('Success delete user');
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
    }
}
