<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            zaboy\App\Action\PingAction::class => zaboy\App\Action\PingAction::class,
        ],
        'factories' => [
            zaboy\App\Action\HomePageAction::class => zaboy\App\Action\HomePageFactory::class,
            zaboy\RqlExample\Action\RqlExampleAction::class => zaboy\RqlExample\Action\RqlExampleFactory::class,
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
            'name' => 'api.rest',
            'path' => '/api/v1/rest[/{resourceName}[/{id}]]',
            'middleware' => 'api-rest',
            'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'],
        ],

       [
            'name' => 'api.v1.ping',
            'path' => '/api/v1/ping',
            'middleware' => zaboy\App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'example',
            'path' => '/{example:[a-zA-Z0-9]{1,40}}',
            'middleware' => zaboy\RqlExample\Action\RqlExampleAction::class,
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
