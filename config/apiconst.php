<?php

return [
    'SUPER_ADMIN' => [
        'VALIDATE_ROLE' => 'required|in:Lecturer,Student',
        'ALLOW_ROLES' => ['Lecturer', 'Student'],
        'VALIDATE_STATUS' => 'required|in:Active,Inactive,Banned',
        'VALIDATE_BAN' => 'required_if:status,Banned|in:,5m,10m,15m,30m,1hours,until_update',
    ],
    
    'LECTURER' => [
        'VALIDATE_ROLE' => 'required|in:Student',
        'ALLOW_ROLES' => ['Student'],
        'VALIDATE_STATUS' => 'required|in:Active,Inactive,Banned',
        'VALIDATE_BAN' => 'required_if:status,Banned|in:,5m,10m,15m,30m,1hours,until_update',
    ],
    'time_login_fail' => 3,
];