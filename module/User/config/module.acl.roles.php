<?php

return [
    'guest' => [
        'Application\Controller\Index\index',
        'Album\Controller\Album\index',
        'User\Controller\User\index',
        'User\Controller\Auth\login',
        'User\Controller\Auth\logout',
    ],
    'editor' => [
    ],
    'admin' => [
        'Application\Controller\Index\index',
        'User\Controller\User\index',
        'User\Controller\User\edit',
        'User\Controller\User\delete',
        'User\Controller\Auth\login',
        'User\Controller\Auth\logout',
    ]
];
