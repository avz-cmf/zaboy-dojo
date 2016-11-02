<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 02.11.16
 * Time: 1:40 PM
 */

namespace zaboy\Ebay\Notification\Example;


use zaboy\ebay\Notification\DataStore\NotificationDbTable;
use zaboy\rest\TableGateway\TableManagerMysql as TableManager;

class Notification
{

    public static $develop_tables_config = [
        NotificationDbTable::EBAY_NOTIFICATION_TABLE_NAME => [
            NotificationDbTable::DEF_ID => [
                TableManager::FIELD_TYPE => 'Integer',
                TableManager::FIELD_PARAMS => [
                    'options' => ['autoincrement' => true]
                ]
            ],
            NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE => [
                TableManager::FIELD_TYPE => 'Varchar',
                TableManager::FIELD_PARAMS => [
                    'length' => 255,
                    'nullable' => false,
                ],
            ],
            NotificationDbTable::KEY_EBAY_NOTIFICATION_ADD_DATE => [
                TableManager::FIELD_TYPE => 'Datetime',
                TableManager::FIELD_PARAMS => [
                    'nullable' => false,
                ],
            ],
            NotificationDbTable::KEY_EBAY_NOTIFICATION_DATA => [
                TableManager::FIELD_TYPE => 'Blob',
                TableManager::FIELD_PARAMS => [
                    'nullable' => false,
                ],
            ]
        ]
    ];
}