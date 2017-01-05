<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.01.17
 * Time: 14:37
 */

namespace zaboy\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use zaboy\rest\RestException;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Escaper\Escaper;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Stratigility\MiddlewareInterface;

class ResponseDataStore implements MiddlewareInterface
{

    /** @var TemplateRendererInterface */
    protected $templateRenderer;


    public function __construct(TemplateRendererInterface $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    /**
     * Process an incoming request and/or response.
     *
     * Accepts a server-side request and a response instance, and does
     * something with them.
     *
     * If the response is not complete and/or further processing would not
     * interfere with the work done in the middleware, or if the middleware
     * wants to delegate to another process, it can use the `$out` callable
     * if present.
     *
     * If the middleware does not return a value, execution of the current
     * request is considered complete, and the response instance provided will
     * be considered the response to return.
     *
     * Alternately, the middleware may return a response instance.
     *
     * Often, middleware will `return $out();`, with the assumption that a
     * later middleware will return a response.
     *
     * @param Request $request
     * @param Response $response
     * @param null|callable $out
     * @return null|Response
     */
    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        //todo: query filter to dojo grid
        $responseBody = $request->getAttribute('Response-Body');
        $accept = $request->getHeaderLine('Accept');
        if (isset($accept) && preg_match('#^application/([^+\s]+\+)?json#', $accept)) {
            $status = $response->getStatusCode();
            $headers = $response->getHeaders();
            $response = new JsonResponse($responseBody, $status, $headers);
        } else {
            $twig = $this->templateRenderer->render('app::dataStoreView', [
                "url" => $request->getUri()->getPath(),
            ]);
            $response = new HtmlResponse($twig, $response->getStatusCode(), $response->getHeaders());
        }

        if ($out) {
            return $out($request, $response);
        }

        return $response;
    }
}
