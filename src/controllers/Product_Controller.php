<?php
class Product_Controller extends Controller
{
     public function indexAction($page = 1)
     {
          $product = $this->loadModel("product");

          $totalPage = $product->getTotalPage();

          if ($page > $totalPage) {
               $this->loadView("e404", ["title" => "Lỗi"]);
          } else {
               $this->loadView(
                    "product",
                    [
                         "title" => "Danh Sách Sản Phẩm",
                         "productData" => [
                              "page" => "list",
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

     public function detailAction($pid = -1)
     {
          $product = $this->loadModel("product");

          if ($pid > $product->getTotalProduct() || $pid < 1) {
               $this->loadView("e404", ["title" => "Lỗi"]);
          } else {
               $this->loadView(
                    "product",
                    [
                         "page" => "detail",
                         "product" =>  $product->getProductById($pid),
                         "title" => "Danh Sách Sản Phẩm"
                    ]
               );
          }
     }
}
