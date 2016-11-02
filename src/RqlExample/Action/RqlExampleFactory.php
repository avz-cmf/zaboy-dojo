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
        if(!$container->has(TemplateRendererInterface::class)){
            throw new \Exception(TemplateRendererInterface::class . " not found in container");
        }
        $templater = $container->get(TemplateRendererInterface::class);
        return new RqlExampleAction($templater);
    }
}