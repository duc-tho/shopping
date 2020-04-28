<?php
class Home_Controller extends Controller
{
     public function __construct()
     {
          echo "Home Controller";
     }

     public function indexAction()
     {
          $product = $this->loadModel("product");
          $category = $product->excuteQuery("SELECT * FROM category");
          print_r($category);

          $this->loadView(
               "home",
               [
                    "product" => $product->getProduct(),
                    "category" => $category
               ]
          );
     }
}
