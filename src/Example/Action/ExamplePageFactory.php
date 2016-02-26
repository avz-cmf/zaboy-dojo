<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.02.16
 * Time: 15:51
 */

namespace Example\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ExamplePageFactory
{

    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        return new ExamplePageAction($container->get(TemplateRendererInterface::class));
    }

}