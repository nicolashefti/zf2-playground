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
        'Album\Controller\Album\edit',
        'User\Controller\User\index',
        'User\Controller\User\add',
        'User\Controller\User\edit',
        'User\Controller\User\delete',
        'User\Controller\Auth\login',
        'User\Controller\Auth\logout',
    ]
];
