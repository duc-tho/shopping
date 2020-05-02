<?php
class Home_Controller extends Controller
{
     public function __construct()
     {
     }

     public function indexAction($page = 1)
     {
          $product = $this->loadModel("product");
          $category = $this->loadModel("category");

          $this->loadView(
               "home",
               [
                    "title" => "Trang Chủ",
                    "productData" => [
                         "productList" => $product->getProduct($page),
                         "totalPage" => $product->getTotalPage(),
                         "thisPage" => $page
                    ],
                    "category" => $category->getCategory()
               ]
          );
     }
}
