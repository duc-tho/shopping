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
          $this->loadView(
               "home",
               [
                    "product" => $product->getProduct()
               ]
          );
     }
}
