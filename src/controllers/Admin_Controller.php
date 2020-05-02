<?php
class Admin_Controller extends Controller
{
     public function indexAction()
     {
          echo "ADMIN INDEX";
     }

     public function addProductAction()
     {
          $status = 0;
          // 0 null - 1 success - -1 error

          if (isset($_POST['submit'])) {
               $product = $this->loadModel("product");
               $product->addProduct($_POST);
               $status = 1;
          }

          $category = $this->loadModel("category");

          $this->loadView("admin", [
               "page" => "addProduct",
               "status" => $status,
               "category" => $category->getCategory()
          ]);
     }
}
