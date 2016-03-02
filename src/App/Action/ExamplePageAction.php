<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26.02.16
 * Time: 16:59
 */

namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Expressive\Template\TemplateRendererInterface;

class ExamplePageAction
{


    private $template;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->template = $renderer;
    }


    public function __invoke(Request $request, Response $response, callable $next = null)
    {

        $template = $request->getAttribute('example');

        $response->getBody()->write($this->template->render('example::' . $template));
        return $response->withHeader("Content-Type", 'text/html');
    }
}