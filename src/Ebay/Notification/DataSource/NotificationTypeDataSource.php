<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.07.16
 * Time: 17:27
 */

namespace zaboy\ebay\Notification\DataSource;

use Xiag\Rql\Parser\Query;
use zaboy\ebay\Notification\DataStore\Factory\AllNotificationDataStoreFactory;
use zaboy\ebay\Notification\DataStore\NotificationDbTable;
use zaboy\rest\DataStore\Interfaces\DataSourceInterface;
use zaboy\rest\DataStore\Interfaces\DataStoresInterface;

class NotificationTypeDataSource implements DataSourceInterface
{
    protected $dataStore;

    const KEY_COUNT_NOTIFICATION_TYPE = 'count';

    public function __construct(DataStoresInterface $dataStores)
    {
        $this->dataStore = $dataStores;
    }

    /**
     * @return array Return data of DataSource
     */
    public function getAll()
    {
        $formatedData = [];
        $data = $this->dataStore->query(new Query());
        foreach ($data as $item){
            if(isset($formatedData[$item[NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE]])){
                $formatedData[$item[NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE]] += 1;
            }else {
                $formatedData[$item[NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE]] = 1;
            }
        }
        $notificationType= [];

        $i = 0;
        foreach ($formatedData as $key => $value){
            $notificationType[] = [
                'id' => $i,
                NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE => $key,
                self::KEY_COUNT_NOTIFICATION_TYPE => $value,
            ];
            $i++;
        }

        return $notificationType;
    }
}
