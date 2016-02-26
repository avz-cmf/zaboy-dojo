<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            App\Action\PingAction::class => App\Action\PingAction::class,
        ],
        'factories' => [
            App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
            Example\Action\ExamplePageAction::class => Example\Action\ExamplePageFactory::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/{example:[a-zA-Z]{1,40}}',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'example',
            'path' => '/example/',
            'middleware' => Example\Action\ExamplePageAction::class,
            'allowed_methods' => ['GET'],
        ]
    ],
];
