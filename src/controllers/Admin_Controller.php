<?php
class Admin_Controller extends Controller
{
     public function indexAction()
     {
          $product = $this->loadModel("product");
          $category = $this->loadModel("category");

          $this->loadView("admin", [
               "title" => "Admin",
               "page" => "admin",
               "info" => [
                    "productCount" => $product->getTotalProduct(),
                    "categoryCount" => $category->getTotalCategory()
               ]
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
               case 'edit':
                    $this->editProduct($id);
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

     public function editProduct($id)
     {
          $error = null;
          $_ = $GLOBALS["_"];
          $product = $this->loadModel("product");

          if (isset($_POST['submit'])) {
               include_once "{$_(PATH_APPLICATION)}/core/File_Upload.php";

               $imageUrl = "";
               $newImage = !empty($_FILES['picture']["name"]);

               if ($newImage) {
                    $imageFile = new File_Upload($_FILES['picture']);
                    $error = $imageFile->checkAll();

                    if ($error == "") {
                         $imageUrl = $imageFile->getFileURL();
                    }
               } else {
                    $error = "";
                    $imageUrl = $product->getProductById($id)["Picture"];
               }

               if ($error == "") {
                    $result = "";
                    $result = $product->editProduct($id, $_POST, $imageUrl);

                    if ($result != "done") {
                         $error = $result;
                    } else {
                         if ($newImage) $imageFile->upload();
                         header("location: /admin/product");
                         return;
                    }
               }
          }

          if ($id == -1) {
               header("location: /admin/product");
               return;
          }

          $category = $this->loadModel("category");

          $this->loadView("admin", [
               "title" => "Admin - Edit Product",
               "page" => "editProduct",
               "status" => $error,
               "productData" => $product->getProductById($id),
               "category" => $category->getCategory()
          ]);
     }
}
