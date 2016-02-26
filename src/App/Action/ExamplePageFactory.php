<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.02.16
 * Time: 16:59
 */

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ExamplePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ExamplePageAction($container->get(TemplateRendererInterface::class));
    }

}