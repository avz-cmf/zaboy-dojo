<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.07.16
 * Time: 15:43
 */

namespace zaboy\ebay\Notification\DataSource;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class NotificationDataSourceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $option = null)
    {
        $config = $container->get('config');
        $dataSourceConfig = $config['dataSource'][$requestedName];
        $regParserData = $dataSourceConfig['regParserData'];

        if (!isset($dataSourceConfig['dataStore'])) {
            throw  new \Exception("dataStore not set");
        }

        $allNotification = $container->get($dataSourceConfig['dataStore']);

        return new NotificationDataSource($allNotification, $regParserData);
    }
}
