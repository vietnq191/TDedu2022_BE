<?php

return [
    'SUPER_ADMIN' => [
        'VALIDATE_ROLE' => 'required|in:Lecturer,Student',
        'ALLOW_ROLES' => ['Lecturer', 'Student'],
    ],
    
    'LECTURER' => [
        'VALIDATE_ROLE' => 'required|in:Student',
        'ALLOW_ROLES' => ['Student'],
    ],
    
];