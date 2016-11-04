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
            zaboy\rest\Pipe\RestRql::class => zaboy\rest\Pipe\Factory\RestRqlFactory::class,
            zaboy\Ebay\Trading\Action\GetItemTransactionsAction::class => zaboy\Ebay\Trading\Action\GetItemTransactionsFactory::class,
            zaboy\Ebay\Notification\Action\NotificationAction::class => \zaboy\Ebay\Notification\Action\NotificationFactory::class,
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
            'name' => 'api.v1.ping',
            'path' => '/api/v1/ping',
            'middleware' => zaboy\App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.v1.rest',
            'path' => '/api/v1/rest[/{Resource-Name}[/{id}]]',
            'middleware' =>  zaboy\rest\Pipe\RestRql::class,
            'allowed_method' => ['GET', 'POST', 'DELETE', 'PUSH'],
        ],
        [
            'name' => 'api.v1.ebay.',
            'path' => '/api/v1/ebay/findItem',
            'middleware' => zaboy\Ebay\Finding\Action\FindItemsIneBayStoreAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.v1.ebay',
            'path' => '/api/v1/ebay/itemTransactions',
            'middleware' => zaboy\Ebay\Trading\Action\GetItemTransactionsAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.v1.ebay',
            'path' => '/api/v1/ebay/notification',
            'middleware' => zaboy\Ebay\Notification\Action\NotificationAction::class,
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
