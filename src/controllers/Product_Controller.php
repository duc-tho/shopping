<?php
class Product_Controller extends Controller
{
     public function indexAction($page = 1)
     {
          $product = $this->loadModel("product");

          $totalPage = $product->getTotalPage();

          if ($page > $totalPage || $page < 1) {
               $this->loadView("e404", ["title" => "Lỗi"]);
          } else {
               $this->loadView(
                    "product",
                    [
                         "title" => "Danh Sách Sản Phẩm",
                         "page" => "list",
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
                         "title" => "Chi tiết Sản Phẩm"
                    ]
               );
          }
     }

     public function categoryAction($cid = -1, $pid = 1)
     {
          $product = $this->loadModel("product");
          $category = $this->loadModel("category");
          $productData =  $product->getProductsByCategory($cid, $pid);

          if ($cid > $category->getTotalCategory() || $cid < 1) {
               $this->loadView("e404", ["title" => "Lỗi"]);
          } else {
               if ($pid > $product->getTotalProductPageByCategory($cid) || $pid < 1) {
                    $this->loadView("e404", ["title" => "Lỗi"]);
               } else {
                    $this->loadView(
                         "product",
                         [
                              "page" => "category",
                              "title" => $category->getCategoryById($cid)["CategoryName"],
                              "productData" => [
                                   "productList" => $productData,
                                   "totalPage" => $product->getTotalProductPageByCategory($cid),
                                   "thisPage" => $pid,
                                   "thisCategory" => $cid
                              ],
                              "category" => $category->getCategory()
                         ]
                    );
               }
          }
     }
}
