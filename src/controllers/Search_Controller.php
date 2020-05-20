<?php
class Search_Controller extends Controller
{
     public function indexAction($keyword = "")
     {
          $this->getAction($keyword);
     }

     public function getAction($keyword = "")
     {
          if ($_SERVER['REQUEST_METHOD'] != 'POST') die("Bad Request :(");
          if ($keyword == "") die("Bad Request :(");

          $product = $this->loadModel("product");
          echo json_encode($product->getProductsByName($keyword));
     }
}
