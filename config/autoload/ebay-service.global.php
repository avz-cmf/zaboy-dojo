<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 01.11.16
 * Time: 5:25 PM
 */

return [
    'dataSource' => [
        'typeNotificationDataSource' => [
            'dataStore' => 'allNotification'
        ],
        'notificationDataSource' => [
            'dataStore' => 'allNotification'
        ]
    ],
    'tableGateway' => [
        'cds_table' => [
            'sql' => zaboy\rest\TableGateway\DbSql\MultiInsertSql::class
        ]
    ],
    'dataStore' => [
        'ebayNotification' => [
                'class' => zaboy\rest\DataStore\DbTable::class,
                'tableName' => 'ebay_notification'
        ],
        'allNotification' => [
            'tableName' => 'ebay_notification'
        ],
        'notificationCacheable' => [
            'dataSource' => 'notificationDataSource',
            'class' => zaboy\ebay\Notification\DataStore\NotificationCacheable::class
        ],
        # Notification CacheableDS
        'NotificationItemListed' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationType\ItemListedDataStore::class
        ],
        'NotificationAuctionCheckoutComplete' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationType\AuctionCheckoutCompleteDataStore::class
        ],
        'NotificationTypeNotification' => [
            'class' => zaboy\ebay\Notification\DataStore\NotificationType\TypeNotificationDataStore::class
        ],
        'typeNotification' => [
            'dataSource' => 'typeNotificationDataSource',
            'class' => zaboy\ebay\Notification\DataStore\NotificationCacheable::class
        ],
    ],
];