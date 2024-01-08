<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

if (!function_exists('hasPermission')) {
    function hasPermission($permission)
    {
        $user = Auth::user();
        if ($user && $user->can($permission)) {
            return true;
        }
        throw new AuthorizationException('Sorry, you do not have permission to access this resource.');
    }
}