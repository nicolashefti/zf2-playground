<?php

return [
    'controllers' => [
        'invokables' => [
            'Album\Controller\User' => 'Album\Controller\UserController',
        ],
    ],
    'router' => [
        'routes' => [
            'album' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/user[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'User\Controller\User',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];