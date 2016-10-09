<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 09.10.16
 * Time: 3:20 PM
 */

namespace zaboy\RqlExample\Action;


use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class RqlExampleFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RqlExampleAction($container->get(TemplateRendererInterface::class));
    }
}