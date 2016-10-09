<?php

/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 09.10.16
 * Time: 3:18 PM
 */
namespace zaboy\RqlExample\DataStore\Pipes\Factory;

use Interop\Container\ContainerInterface;
use zaboy\rest\Pipe\Factory\RestRqlFactory;

class RestPipeFactory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        $pipeFactory =  new RestRqlFactory();
        return $pipeFactory($container, $requestedName, []);
    }
}