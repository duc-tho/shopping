<?php
class Cart_Controller extends Controller
{
     public function indexAction()
     {
          $productList = [];
          $product = $this->loadModel("product");

          foreach ($_SESSION['cart_items'] as $item) {
               $tmpProduct = $product->getProductById($item['id']);
               $tmpProduct["count"] = $item['count'];
               $tmpProduct["time"] = $item['time'];
               array_push($productList, $tmpProduct);
          }

          $this->loadView("cart", [
               "title" => "Giỏ hàng",
               "productList" => $productList
          ]);
     }

     public function getAction()
     {
          // session_destroy();
          // return;

          if (!isset($_SESSION["cart_items"]) || empty($_SESSION["cart_items"])) {
               echo json_encode(array_values([]));
          } else {
               echo json_encode(array_values($_SESSION['cart_items']));
          }
     }

     public function setAction($id = -1)
     {
          if ($_SERVER['REQUEST_METHOD'] != 'POST') die("Bad Request");
          if ($id == -1) die("Bad Request");
          if (!isset($_SESSION["cart_items"]) || empty($_SESSION["cart_items"])) $_SESSION["cart_items"] = [];

          $dataExist = false;

          foreach ($_SESSION["cart_items"] as $item) {
               if ($id == $item["id"]) {
                    $dataExist = true;
                    break;
               }
          }

          if (!$dataExist) {
               $product = $this->loadModel("product");
               $productData = $product->getProductById($id);

               $data = [];

               $data['count'] = 1;
               $data['time'] = date('d-m-Y h:i:s', time());
               $data["name"] = $productData["ProductName"];
               $data["price"] = $productData["Price"];
               $data["image"] = $productData["Picture"];
               $data["id"] = $id;

               array_push($_SESSION['cart_items'], $data);
          } else {
               for ($i = 0; $i < count($_SESSION["cart_items"]); $i++) {
                    if ($id == $_SESSION["cart_items"][$i]['id']) {
                         $_SESSION["cart_items"][$i]["count"]++;
                         break;
                    }
               }
          }
     }

     public function deleteAction($id = -1)
     {

          if ($_SERVER['REQUEST_METHOD'] != 'POST') die("Bad Request :(");
          if ($id == -1) die("Bad Request :(");
          if (!isset($_SESSION["cart_items"]) || empty($_SESSION["cart_items"])) $_SESSION["cart_items"] = [];

          for ($i = 0; $i < count($_SESSION["cart_items"]); $i++) {
               if ($id == $_SESSION["cart_items"][$i]['id']) {
                    unset($_SESSION["cart_items"][$i]);
                    break;
               }
          }

          $_SESSION["cart_items"] = array_values($_SESSION["cart_items"]);

          if ($_SERVER['HTTP_REFERER'] == "http://localhost/cart") {
               echo "needReload";
          }
     }
}
