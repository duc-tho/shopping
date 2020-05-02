<?php
class Product_Controller extends Controller
{
     public function indexAction($page = 1)
     {
          $product = $this->loadModel("product");

          $totalPage = $product->getTotalPage();

          if ($page > $totalPage) {
               $this->loadView("e404");
          } else {
               $this->loadView(
                    "product",
                    [
                         "productData" => [
                              "productList" => $product->getProduct($page),
                              "totalPage" => $totalPage,
                              "thisPage" => $page
                         ]
                    ]
               );
          }
     }

     public function listAction($page = 1)
     {
          $this->indexAction($page);
     }
}
