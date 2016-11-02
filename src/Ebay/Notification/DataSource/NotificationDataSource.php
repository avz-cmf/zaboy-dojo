<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25.07.16
 * Time: 17:45
 */

namespace zaboy\ebay\Notification\DataSource;

use Xiag\Rql\Parser\Node\Query\ScalarOperator\EqNode;
use Xiag\Rql\Parser\Query;
use zaboy\ebay\Notification\DataStore\Factory\AllNotificationDataStoreFactory;
use zaboy\ebay\Notification\DataStore\NotificationDbTable;
use zaboy\rest\DataStore\Interfaces\DataSourceInterface;
use zaboy\rest\DataStore\Interfaces\DataStoresInterface;

class NotificationDataSource implements DataSourceInterface
{
    /** @var  DataStoresInterface */
    protected $dataStore;

    protected $notificationType;

    protected $regParserData;

    public function __construct(DataStoresInterface $dataStore, $notificationType = null, array $regParserData)
    {
        $this->dataStore = $dataStore;
        $this->notificationType = $notificationType;
        $this->regParserData = $regParserData;
    }

    /**
     * @param null $notificationType
     */
    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;
    }

    public function getAll()
    {
        if ($this->notificationType === null) {
            throw new \Exception("Not set notification Type");
        }
        $query = new Query();
        $query->setQuery(new EqNode(NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE, $this->notificationType));

        return $this->dataByType($this->dataStore->query($query));
    }

    protected function dataByType($data)
    {
        foreach ($data as &$item) {
            $result = [];
            foreach ($this->regParserData[$this->notificationType] as $filedName => $pattern){
                if (preg_match($pattern, $item['data'], $result)) {
                    if(isset($result[1])){
                        $item[$filedName] = $result[1];
                    }
                }
            }
        }
        return $data;
    }
}
