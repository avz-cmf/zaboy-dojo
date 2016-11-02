<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.03.16
 * Time: 11:14
 */

namespace zaboy\Ebay\Category\DataSource;

use DTS\eBaySDK\Shopping\Services;
use DTS\eBaySDK\Shopping\Types;
use zaboy\rest\DataStore\Interfaces\DataSourceInterface;

class EbayCategoryDataSource implements DataSourceInterface
{
    /**
     * @var Services\ShoppingService $services
     */
    private $services;

    private $rootCategoryId;

    public function __construct($ebayConfig)
    {
        $this->rootCategoryId = $ebayConfig['categoryRootId'];
        $this->services = new Services\ShoppingService([
            'credentials' => $ebayConfig['credentials']
        ]);
    }

    protected function getCategoryTree($id)
    {

        $categoryList = [];

        $req = new Types\GetCategoryInfoRequestType([
            'CategoryID' => $id,
            'IncludeSelector' => "ChildCategories"
        ]);

        $resp = $this->services->getCategoryInfo($req);

        $categoryArray = $resp->CategoryArray->toArray();

        if (count($categoryArray["Category"]) < 2 && count($categoryArray["Category"]) > 0) {
            return $categoryArray["Category"][0];
        } else {
            foreach ($categoryArray["Category"] as $category) {
                if ($category["CategoryID"] == $id) {
                    $categoryList[] = $category;
                } else {
                    $categoryList[] = $this->getCategoryTree($category["CategoryID"]);
                }
            }
            return $categoryList;
        }
    }

    protected function getCategoryList($id)
    {

        $categoryList = [];

        $req = new Types\GetCategoryInfoRequestType([
            'CategoryID' => $id,
            'IncludeSelector' => "ChildCategories"
        ]);

        $resp = $this->services->getCategoryInfo($req);

        $categoryArray = $resp->CategoryArray->toArray();

        if (count($categoryArray["Category"]) < 2 && count($categoryArray["Category"]) > 0) {
            return $categoryArray["Category"][0];
        } else {
            foreach ($categoryArray["Category"] as $category) {
                if ($category["CategoryID"] == $id) {
                    $categoryList[] = $category;
                } else {
                    //$categoryList[] = $this->getCategoryList($category["CategoryID"]);
                    $temp = $this->getCategoryList($category["CategoryID"]);
                    if (!isset($temp["CategoryID"])) {
                        foreach ($temp as $item) {
                            $categoryList[] = $item;
                        }
                    } else {
                        $categoryList[] = $temp;
                    }
                }
            }
            return $categoryList;
        }
    }

    /**
     * return
     * @return mixed
     */
    public function getAll()
    {
        $category = [];
        $categoryList = $this->getCategoryList($this->rootCategoryId);
        foreach ($categoryList as $item) {
            $temp['id'] = $item["CategoryID"];
            $temp['name'] = $item["CategoryName"];
            $temp['parentID'] = $item["CategoryParentID"];
            $temp['level'] = $item["CategoryLevel"];
            $temp['leafCategory'] = $item["LeafCategory"];
            $temp['idPath'] = $item["CategoryIDPath"];
            $category[] = $temp;
        }
        return $category;
    }
}

