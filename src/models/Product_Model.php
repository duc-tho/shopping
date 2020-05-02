<?php
class Product_Model extends Database
{
     protected $itemPerPage = 20;

     public function getProduct($page)
     {
          $startItem = ($page - 1) * $this->itemPerPage;
          //$endItem = $startItem + $this->itemPerPage;

          return $this->excuteQuery("SELECT * FROM `product` ORDER BY ProductID DESC LIMIT {$startItem}, $this->itemPerPage");
     }

     public function getProductById($id = -1)
     {
          return $this->excuteQuery("SELECT * FROM `product` WHERE ProductID = {$id}")[0];
     }

     public function getTotalProduct()
     {
          return $this->excuteQuery("SELECT COUNT(*) FROM product")[0]["COUNT(*)"];
     }

     public function getTotalPage()
     {
          return ceil($this->getTotalProduct() / $this->itemPerPage);
     }

     public function addProduct($data)
     {
          $id = $this->getTotalProduct() + 1;
          $name = $data["name"];
          $cateId = $data["cateId"];
          $quantily = $data["quantily"];
          $description = $data["description"];
          $price = $data["price"];
          $picture = $data["picture"];
          $rating = $data["rating"];
          $discount = $data["discount"];

          $this->excuteQuery("INSERT INTO product (ProductID, ProductName, CateID, Quantily, Description, Price, Picture, Rating, Discount) values ({$id}, '{$name}', {$cateId}, {$quantily}, '{$description}', {$price}, '{$picture}', {$rating}, {$discount});");
     }
}
