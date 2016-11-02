<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 02.11.16
 * Time: 1:58 PM
 */

namespace zaboy\ebay\Notification\DataStore\Factory;


use Interop\Container\ContainerInterface;
use Xiag\Rql\Parser\Node\Query\ScalarOperator\EqNode;
use Xiag\Rql\Parser\Query;
use zaboy\ebay\Notification\DataSource\NotificationDataSource;
use zaboy\ebay\Notification\DataStore\NotificationDbTable;
use zaboy\rest\DataStore\DataStoreException;
use zaboy\rest\DataStore\Factory\CacheableAbstractFactory;
use zaboy\rest\DataStore\Interfaces\DataStoresInterface;

class NotificationCacheableFactory extends CacheableAbstractFactory
{

    protected static $KEY_IN_CANCREATE = 0;
    protected static $KEY_IN_CREATE = 0;

    const NOTIFICATION_CACHEABLE = 'notificationCacheable';

    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if ($this::$KEY_IN_CANCREATE){
            return false;
        }
        $this::$KEY_IN_CANCREATE = 1;
        /**@var DataStoresInterface $ebayAllNotification */
        $ebayAllNotification = $container->get('ebayAllNotification');
        $query = new Query();
        $query->setQuery(new EqNode(NotificationDbTable::KEY_EBAY_NOTIFICATION_TYPE, $requestedName));
        $result = $ebayAllNotification->query($query);

        $this::$KEY_IN_CANCREATE = 0;
        return count($result) > 0;
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        if ($this::$KEY_IN_CREATE) {
            throw new DataStoreException("Create will be called without pre call canCreate method");
        }
        $this::$KEY_IN_CREATE = 1;
        $serviceConfig = $container->get('config')[self::KEY_CLASS][self::NOTIFICATION_CACHEABLE];

        $requestedClassName = $serviceConfig[self::KEY_CLASS];

        if (isset($serviceConfig[self::KEY_DATASOURCE])) {
            if ($container->has($serviceConfig[self::KEY_DATASOURCE])) {
                $getAll = $container->get($serviceConfig[self::KEY_DATASOURCE]);
                if($getAll instanceof NotificationDataSource){
                    $getAll->setNotificationType($requestedName);
                }
            } else {
                throw new DataStoreException(
                    'There is DataSource not created ' . $requestedName . 'in config \'dataStore\''
                );
            }
        } else {
            throw new DataStoreException(
                'There is DataSource for ' . $requestedName . 'in config \'dataStore\''
            );
        }
        $serviceConfig[self::KEY_CACHEABLE] = ucfirst($requestedName);

        if ($container->has($serviceConfig[self::KEY_CACHEABLE])) {
            $cashStore = $container->get($serviceConfig[self::KEY_CACHEABLE]);
        } else {
            throw new DataStoreException(
                'There is DataSource for ' . $serviceConfig[self::KEY_CACHEABLE] . 'in config \'dataStore\''
            );
        }

        $this::$KEY_IN_CREATE = 0;
        return new $requestedClassName($getAll, $cashStore);

    }
}

