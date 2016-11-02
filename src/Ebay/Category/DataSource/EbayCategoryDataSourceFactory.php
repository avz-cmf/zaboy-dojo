<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.03.16
 * Time: 11:18
 */

namespace zaboy\Ebay\Category\DataSource;

use Interop\Container\ContainerInterface;

class EbayCategoryDataSourceFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get("config");

        return new EbayCategoryDataSource($config['ebay']);
    }
}
