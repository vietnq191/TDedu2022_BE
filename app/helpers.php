<?php
use Illuminate\Support\Facades\Auth;

if(!function_exists('isSuperAdmin')){
    function isSuperAdmin(){
        $user =  Auth::guard('api')->user();
        if(in_array('Super Admin', $user->role->toArray())){
            return true;
        }

        return false;
    }
}

if(!function_exists('isLecturer')){
    function isLecturer(){
        $user =  Auth::guard('api')->user();
        if(in_array('Lecturer', $user->role->toArray())){
            return true;
        }

        return false;
    }
}

if(!function_exists('unsetDataUserProfile')){
    function unsetDataUserProfile(&$attributes){
        unset($attributes['username'], $attributes['role'], $attributes['status']);
    }
}