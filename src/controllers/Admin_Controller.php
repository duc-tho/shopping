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

     public function productAction($action = null, $id = -1)
     {
          $product = $this->loadModel("product");

          switch ($action) {
               case 'add':
                    $this->addProduct();
                    break;
               case 'delete':
                    $product->deleteProduct($id, $product->getProductById($id)['Picture']);

                    $this->loadView("admin", [
                         "title" => "Admin - Quản lý Sản phẩm",
                         "page" => "manageProduct",
                         "product" => $product->getProduct(1)
                    ]);

                    break;
               default:
                    $this->loadView("admin", [
                         "title" => "Admin - Quản lý Sản phẩm",
                         "page" => "manageProduct",
                         "product" => $product->getProduct(1)
                    ]);
                    break;
          }
     }

     public function addProduct()
     {
          $error = null;
          $_ = $GLOBALS["_"];

          if (isset($_POST['submit'])) {
               include_once "{$_(PATH_APPLICATION)}/core/File_Upload.php";
               $imageFile = new File_Upload($_FILES['picture']);
               $error = $imageFile->checkAll();

               if ($error == "") {
                    $imageUrl = $imageFile->getFileURL();
                    $product = $this->loadModel("product");

                    $result = "";
                    $result = $product->addProduct($_POST, $imageUrl);

                    if ($result != "done") {
                         $error = $result;
                    } else {
                         $imageFile->upload();
                         header("location: /admin/product");
                         return;
                    }
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
