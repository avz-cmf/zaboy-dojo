<?php
use zaboy\rest\DataStore\Aspect\Factory\AspectAbstractFactory;
use zaboy\rest\DataStore\Eav\EavAbstractFactory;
use zaboy\rest\DataStore\Factory\CacheableAbstractFactory;
use zaboy\rest\DataStore\Factory\CsvAbstractFactory;
use zaboy\rest\DataStore\Factory\DbTableAbstractFactory;
use zaboy\rest\DataStore\Factory\HttpClientAbstractFactory;
use zaboy\rest\DataStore\Factory\MemoryAbstractFactory;
use zaboy\rest\TableGateway\Factory\TableGatewayAbstractFactory;
use zaboy\rest\Middleware\Factory\DataStoreAbstractFactory as MiddlewareDataStoreAbstractFactory;
use Zend\Db\Adapter\AdapterAbstractServiceFactory;
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class => ApplicationFactory::class,
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,

        ],
        'abstract_factories' => [
            EavAbstractFactory::class,
            AspectAbstractFactory::class,
            MiddlewareDataStoreAbstractFactory::class,
            HttpClientAbstractFactory::class,
            DbTableAbstractFactory::class,
            CsvAbstractFactory::class,
            MemoryAbstractFactory::class,
            CacheableAbstractFactory::class,
            AdapterAbstractServiceFactory::class,
            TableGatewayAbstractFactory::class,

        ]
    ],
];
