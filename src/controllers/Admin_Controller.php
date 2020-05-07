<?php
class Admin_Controller extends Controller
{
     public function indexAction()
     {
          $this->loadView("admin", [
               "title" => "Admin",
               "page" => "admin"
          ]);
     }

     public function addProductAction()
     {
          $error = null;
          $_ = $GLOBALS["_"];

          if (isset($_POST['submit'])) {
               include_once "{$_(PATH_APPLICATION)}/core/File_Upload.php";
               $imageFile = new File_Upload($_FILES['picture']);
               $error = $imageFile->upload();

               if ($error == "") {
                    $imageUrl = $imageFile->getFileURL();
                    $product = $this->loadModel("product");
                    $product->addProduct($_POST, $imageUrl);
               }
          }

          $category = $this->loadModel("category");

          $this->loadView("admin", [
               "title" => "Admin - Add Product",
               "page" => "addProduct",
               "status" => $error,
               "category" => $category->getCategory()
          ]);
     }
}
