<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            zaboy\App\Action\PingAction::class => zaboy\App\Action\PingAction::class,
        ],
        'factories' => [
            zaboy\App\Action\HomePageAction::class => zaboy\App\Action\HomePageFactory::class,
            zaboy\App\Action\ExamplePageAction::class => zaboy\App\Action\ExamplePageFactory::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => zaboy\App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => zaboy\App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'example',
            'path' => '/{example:[a-zA-Z]{1,40}}',
            'middleware' => zaboy\App\Action\ExamplePageAction::class,
            'allowed_methods' => ['GET'],
        ]
    ],
];
