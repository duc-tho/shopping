<?php
class Cart_Controller extends Controller
{
     public function indexAction()
     {
          $this->loadView("cart", ["title" => "Giỏ hàng"]);
     }

     public function getAction()
     {
          if (!isset($_SESSION["cart_items"]) || empty($_SESSION["cart_items"])) {
               echo json_encode(array_values([]));
          } else {
               echo json_encode(array_values($_SESSION['cart_items']));
          }
     }

     public function setAction()
     {
          $data = (array) json_decode(file_get_contents('php://input'));

          if (!isset($_SESSION["cart_items"]) || empty($_SESSION["cart_items"])) {
               $_SESSION["cart_items"] = [];
               $data['count'] = 1;
               $data['time'] = date('d-m-Y h:i:s', time());
               array_push($_SESSION['cart_items'], $data);
          } else {
               foreach ($_SESSION["cart_items"] as $value) {
                    if (!$data["id"] == $value["id"]) {
                         $value['count'] = 1;
                         $value['time'] = date('d-m-Y h:i:s', time());
                         array_push($_SESSION['cart_items'], $data);
                    } else {
                         $value['count']++;
                    };
               }
          }
     }
}
