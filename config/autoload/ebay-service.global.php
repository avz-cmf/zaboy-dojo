<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 01.11.16
 * Time: 5:25 PM
 */

return [
    'dataSource' => [
        #notification Configure
        'notificationTypeDataSource' => [
            'dataStore' => 'allEbayNotification'
        ],
        'notificationDataSource' => [
            'dataStore' => 'allEbayNotification',
            'regParserData' => [
                'ItemListed' => [
                    'item_id' => '/\<ItemID\>([0-9]+)\<\/ItemID\>/',
                ]
            ]
        ],

        #category configure
        'ebayCategoryDataSource' => [
            'class' => zaboy\Ebay\Category\DataSource\EbayCategoryDataSource::class
        ],
    ],
    'tableGateway' => [
        'cds_table' => [
            'sql' => zaboy\rest\TableGateway\DbSql\MultiInsertSql::class
        ]
    ],
    'dataStore' => [
        #Notification configure
        'allEbayNotification' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationDbTable::class,
            'tableName' => zaboy\ebay\Notification\DataStore\NotificationDbTable::EBAY_NOTIFICATION_TABLE_NAME
        ],
        'notificationCacheable' => [
            'dataSource' => 'notificationDataSource',
            'class' => zaboy\ebay\Notification\DataStore\NotificationCacheable::class
        ],

        #Notification CacheableDS
        'notificationItemListed' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationType\ItemListedDataStore::class
        ],
        'notificationAuctionCheckoutComplete' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationType\AuctionCheckoutCompleteDataStore::class
        ],
        'notificationTypes' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationType\NotificationTypeDataStore::class
        ],


        #category configure
        'categoryMem' => [
            'class' => zaboy\rest\DataStore\Memory::class
        ],
        'ebayCategory' => [
            'class' =>  zaboy\rest\DataStore\Cacheable::class,
            'dataSource' => 'ebayCategoryDataSource',
            'cacheable' => 'categoryMem'
        ]

    ],
    'factories' => [
        'notificationDataSource' => zaboy\ebay\Notification\DataSource\NotificationDataSourceFactory::class,
        'notificationTypeDataSource' => zaboy\ebay\Notification\DataSource\NotificationTypeFactory::class,
        'notificationTypeCacheable' => zaboy\ebay\Notification\DataStore\Factory\NotificationTypeCacheableFactory::class,
    ],
    'abstract_factories' => [
        zaboy\ebay\Notification\DataStore\Factory\NotificationCacheableFactory::class,
    ]
];