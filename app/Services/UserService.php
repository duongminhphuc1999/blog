<?php

namespace App\Services;

use App\Exceptions\User\FalseToUpdatedProfileException;
use App\Http\Resources\User\ProfileResource;
use App\Models\User;
use App\Services\BaseModelService;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService extends BaseModelService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function updateProfile(User $user, array $userData): bool
    {
        try {
            return (bool) DB::transaction(function () use ($user, $userData) {
                $userDetail = $user?->userDetail;
                if (isset($userData['username'])) {
                    $this->update($user, ['username' => $userData['username']]);
                    unset($userData['username']);
                }
                if (!is_null($userDetail)) {
                    $this->update($user, $userData);
                }

                return true;
            });
        } catch (Exception $th) {
            throw (new FalseToUpdatedProfileException());
        }
    }

    public function getProfile(User $user)
    {
        $userProfile = $user?->userDetail;
        if (!is_null($userProfile)) {
            $userProfile->email = $user->email;
            $userProfile->username = $user->username;
            $user = $userProfile;
        }

        return new ProfileResource($user);
    }
}
