<?php

/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 09.10.16
 * Time: 3:18 PM
 */
namespace zaboy\RqlExample\DataStore\Pipes\Factory;

use Interop\Container\ContainerInterface;
use zaboy\Middleware\Factory\ResponseDataStoreFactory;
use zaboy\rest\Pipe\Factory\RestRqlFactory;

class RestPipeFactory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        $ResponceDataStoreFactory = new ResponseDataStoreFactory();
        $pipeFactory =  new RestRqlFactory([
            450 => $ResponceDataStoreFactory($container, $requestedName)
        ]);
        return $pipeFactory($container, $requestedName, []);
    }
}