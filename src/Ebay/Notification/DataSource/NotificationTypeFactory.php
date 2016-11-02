<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.07.16
 * Time: 17:39
 */

namespace zaboy\ebay\Notification\DataSource;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class NotificationTypeFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $option = null)
    {
        $config = $container->get('config');
        $dataSourceConfig = $config['dataSource'][$requestedName];

        if (!isset($dataSourceConfig['dataStore'])) {
            throw  new \Exception("dataStore not set");
        }

        $allNotification = $container->get($dataSourceConfig['dataStore']);

        return new NotificationTypeDataSource($allNotification);
    }
}
