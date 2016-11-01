<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 01.11.16
 * Time: 4:15 PM
 */

namespace zaboy\Ebay\Trading\Action;

use Interop\Container\ContainerInterface;

class GetItemTransactionsFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $credentials = $config['ebay']['credentials'];
        $eBayAuthToken = $config['ebay']['eBayAuthToken'];
        return new GetItemTransactionsAction($credentials, $eBayAuthToken);
    }
}