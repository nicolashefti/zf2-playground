<?php

return [
    'guest' => [
        'Application\Controller\Index::index',
        'Album\Controller\Album::index',
        'User\Controller\User::index',
        'User\Controller\Auth::login',
        'User\Controller\Auth::logout',
    ],
    'editor' => [
    ],
    'admin' => [
        'Application\Controller\Index::index',
        'Album\Controller\Album::index',
        'Album\Controller\Album::add',
        'Album\Controller\Album::edit',
        'Album\Controller\Album::delete',
        'User\Controller\User::index',
        'User\Controller\User::add',
        'User\Controller\User::edit',
        'User\Controller\User::delete',
        'User\Controller\Auth::login',
        'User\Controller\Auth::logout',
    ]
];
