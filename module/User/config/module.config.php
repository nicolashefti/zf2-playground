<?php

return [
    'controllers' => [
        'invokables' => [
            'User\Controller\User' => 'User\Controller\UserController',
            'User\Controller\Auth' => 'User\Controller\AuthController',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'User\Service\AuthenticationService' => 'User\Service\AuthenticationServiceFactory',
            'User\Service\Acl' => 'User\Service\AclServiceFactory'
        ]
    ],
    'router' => [
        'routes' => [
            'user' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/user[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'User\Controller\User',
                        'action' => 'index',
                    ],
                ],
            ],
            'authentication' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/login',
                    'defaults' => [
                        'controller' => 'User\Controller\Auth',
                        'action' => 'login',
                    ],
                ],

            ],
            'logout' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => 'User\Controller\Auth',
                        'action' => 'logout',
                    ],
                ],

            ]
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'user' => __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => array(
        'invokables' => array(
            'authentication' => 'User\View\Helper\Authentication',
            'acl' => 'User\View\Helper\Acl'
        )
    ),
];