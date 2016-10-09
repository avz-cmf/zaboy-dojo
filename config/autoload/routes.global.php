<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            zaboy\App\Action\PingAction::class => zaboy\App\Action\PingAction::class,
        ],
        'factories' => [
            zaboy\App\Action\HomePageAction::class => zaboy\App\Action\HomePageFactory::class,
            zaboy\App\Action\ExamplePageAction::class => zaboy\App\Action\ExamplePageFactory::class,
            zaboy\rest\Pipe\RestRql::class => zaboy\RqlExample\DataStore\Pipes\Factory\RestPipeFactory::class,
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
            'name' => 'rest.api',
            'path' => '/rest[/{Resource-Name}[/{id}]]',
            'middleware' =>  zaboy\rest\Pipe\RestRql::class,
            'allowed_method' => ['GET', 'POST', 'DELETE', 'PUSH'],
        ],
        [
            'name' => 'example',
            'path' => '/{example:[a-zA-Z]{1,40}}',
            'middleware' => zaboy\App\Action\ExamplePageAction::class,
            'allowed_methods' => ['GET'],
        ]
    ],

    'dataStore' => [

        'testCsvBase' => [
            'class' => 'zaboy\rest\DataStore\CsvBase',
            //'filename' => __DIR__ . "data" . DIRECTORY_SEPARATOR . "" . DIRECTORY_SEPARATOR . 'users.csv',
            'filename' => sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'testCsvBase.tmp',
            'delimiter' => ';',
        ],
    ]
];
