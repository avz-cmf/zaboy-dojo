<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 02.11.16
 * Time: 1:43 PM
 */

namespace zaboy\ebay\Notification\DataStore;


use zaboy\rest\DataStore\DbTable;

class NotificationDbTable extends DbTable
{
    const EBAY_NOTIFICATION_TABLE_NAME = 'ebay_notification';

    const KEY_EBAY_NOTIFICATION_TYPE = 'type';

    const KEY_EBAY_NOTIFICATION_ADD_DATE = 'add_date';

    const KEY_EBAY_NOTIFICATION_DATA = 'data';
}