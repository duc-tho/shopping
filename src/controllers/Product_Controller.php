<?php
class Product_Controller extends Controller
{
     public function indexAction($page = 1)
     {
          $product = $this->loadModel("product");

          $this->loadView(
               "product",
               [
                    "productData" => [
                         "productList" => $product->getProduct($page),
                         "totalPage" => $product->getTotalPage(),
                         "thisPage" => $page
                    ]
               ]
          );
     }

     public function listAction($page = 1)
     {
          $this->indexAction($page);
     }
}
