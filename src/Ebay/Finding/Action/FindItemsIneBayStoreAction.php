<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 01.11.16
 * Time: 4:12 PM
 */

namespace zaboy\Ebay\Finding\Action;


use DTS\eBaySDK\Finding\Services\FindingService;
use DTS\eBaySDK\Finding\Types\FindItemsIneBayStoresRequest;
use DTS\eBaySDK\Finding\Types\SearchItem;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response\JsonResponse;


class FindItemsIneBayStoreAction
{
    /** @var  FindingService */
    private $service;

    public function __construct(array $credentials)
    {
        $this->service = new FindingService($credentials
            /*[
            'credentials' => [
                'appId' => '',
                'certId' => '',
                'devId' => '',
            ]
        ]*/);
    }
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $query = $request->getQueryParams();
        $storeName = $query['storeName'];
        $keywords = $query['keywords'];

        $findingRequest = new FindItemsIneBayStoresRequest([
            'storeName' => $storeName,
            'keywords' => $keywords
        ]);
        $report = [];
        $report['time']['start'] = new \DateTime();
        $findingResponse = $this->service->findItemsIneBayStores($findingRequest);
        $report['time']['end'] = new \DateTime();
        $report['ack'] = $findingResponse->ack;
        $report['error'] = $findingResponse->errorMessage;
        $report['itemSearchURL'] = $findingResponse->itemSearchURL;
        /** @var SearchItem $item */
        if ($findingResponse->searchResult->count > 0) {
            $report['searchResult']['count'] = $findingResponse->searchResult->count;
            foreach ($findingResponse->searchResult->item as $item) {
                $temp['id'] = $item->itemId;
                $temp['title'] = $item->title;
                $temp['subtitle'] = $item->title;
                $temp['productId'] = $item->productId;
                $report['searchResult']['items'][] = $temp;
            }
        }
        return new JsonResponse($report);
    }
}