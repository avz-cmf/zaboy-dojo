<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 09.10.16
 * Time: 3:20 PM
 */

namespace zaboy\RqlExample\Action;



use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Expressive\Template\TemplateRendererInterface;

class RqlExampleAction
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