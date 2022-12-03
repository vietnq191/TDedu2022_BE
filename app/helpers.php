<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        $user =  Auth::guard('api')->user();
        if(!$user) {
            abort(response()->json(['error' => 'Unauthorized'], 401));
        }
        if (in_array('Super Admin', $user->role->toArray())) {
            return true;
        }

        return false;
    }
}

if (!function_exists('isLecturer')) {
    function isLecturer()
    {
        $user =  Auth::guard('api')->user();
        if(!$user) {
            abort(response()->json(['error' => 'Unauthorized'], 401));
        }

        if (in_array('Lecturer', $user->role->toArray())) {
            return true;
        }

        return false;
    }
}

if (!function_exists('unsetDataUserProfile')) {
    function unsetDataUserProfile(&$attributes)
    {
        unset($attributes['username'], $attributes['role'], $attributes['status'], $attributes['duration'], $attributes['reason_ban']);
    }
}

if (!function_exists('convertCharToGender')) {
    function convertCharToGender($character)
    {
        switch ($character) {
            case 'M':
                return 'Male';
                break;
            case 'F':
                return 'Female';
                break;
            case 'U':
                return 'Unknow';
                break;
            default:
                return '';
                break;
        }
    }
}

if (!function_exists('formatDate')) {
    function formatDate($stringDate)
    {
        return date_format(date_create($stringDate), 'Y-m-d');
    }
}

if (!function_exists('convertDurationBan')) {
    function convertDurationBan($time)
    {
        switch ($time) {
            case "5m":
                return '+5 minute';
            case "10m":
                return '+10 minute';
            case "15m":
                return '+15 minute';
            case "30m":
                return '+30 minute';
            case "1hours":
                return '+1 hour';
                break;
            default:
                return null;
        }
    }
}

if (!function_exists('convertDurationToSave')) {
    function convertDurationToSave($time)
    {
        switch ($time) {
            case "5m":
                return '5 minutes';
            case "10m":
                return '10 minutes';
            case "15m":
                return '15 minutes';
            case "30m":
                return '30 minutes';
            case "1hours":
                return '1 hours';
                break;
            default:
                return 'Until updated';
        }
    }
}

if (!function_exists('textDisplayBan')) {
    function textDisplayTimeBan($time, $time_remaining)
    {
        return "You have banned in " . $time . ", you shall able to login in next " . $time_remaining . " minutes";
    }
}

if (!function_exists('sendNotificationToTelegram')) {
    function sendNotificationToTelegram($message){
        $apiToken = "5835143920:AAFspV9E7O_Aw89tg4CKZ3nLbVBZ1FizmuY";
        $data = [
            'chat_id' => '@cdptw2', 
            'text' => $message
        ];
        file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));    
    }
}

if (!function_exists('getCurrentUserLogin')) {
    function getCurrentUserLogin()
    {
        $user =  Auth::guard('api')->user();
        if(!$user) {
            abort(response()->json(['error' => 'Unauthorized'], 401));
        }

        return $user;
    }
}