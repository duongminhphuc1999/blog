<?php

namespace App\Http\Middleware;

use App\Exceptions\TokenInvalidException;
use Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    protected function authenticate($request, array $guards)
    {

        foreach ($guards as $guard) {
            if (!$this->auth->guard($guard)->check()) {
                continue;
            }

            if ($guard === 'admin-api' || $guard === 'api') {
                return $this->auth->shouldUse($guard);
            }
        }

        $this->unAuthenticate($guards);
    }

    protected function unAuthenticate(array $guards): void
    {
        throw new TokenInvalidException();
    }
}
