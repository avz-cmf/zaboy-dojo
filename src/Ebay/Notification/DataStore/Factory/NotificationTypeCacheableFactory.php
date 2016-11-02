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
use zaboy\rest\DataStore\Cacheable;
use zaboy\rest\DataStore\DataStoreException;
use zaboy\rest\DataStore\Factory\CacheableAbstractFactory;
use zaboy\rest\DataStore\Interfaces\DataStoresInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class NotificationTypeCacheableFactory implements FactoryInterface
{
    const NOTIFICATION_TYPE_CACHEABLE = 'notificationTypeCacheable';

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dataSource = $container->get('notificationTypeDataSource');
        $dataStore = $container->get('notificationTypes');
        return new Cacheable($dataSource, $dataStore);
    }
}