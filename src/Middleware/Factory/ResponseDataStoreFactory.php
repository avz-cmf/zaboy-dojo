<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.01.17
 * Time: 14:49
 */

namespace zaboy\Middleware\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use zaboy\Middleware\ResponseDataStore;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ResponseDataStoreFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws \Exception
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        if (!$container->has(TemplateRendererInterface::class)) {
            throw new \Exception("Template renderer not found.");
        }
        return new ResponseDataStore($container->get(TemplateRendererInterface::class));
    }
}
