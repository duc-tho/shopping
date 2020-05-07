<?php
class Product_Model extends Database
{
     protected $itemPerPage = 16;

     public function getProduct($page, $itemPerPage = null)
     {
          if ($itemPerPage == null) $itemPerPage = $this->itemPerPage;

          $startItem = ($page - 1) * $itemPerPage;
          //$endItem = $startItem + $this->itemPerPage;

          return $this->excuteQuery("SELECT * FROM `product` ORDER BY ProductID DESC LIMIT {$startItem}, $this->itemPerPage");
     }

     public function getProductById($id = -1)
     {
          return $this->excuteQuery("SELECT * FROM `product` WHERE ProductID = {$id}")[0];
     }

     public function getProductsByCategory($id = -1, $page, $itemPerPage = null)
     {
          if ($itemPerPage == null) $itemPerPage = $this->itemPerPage;

          $startItem = ($page - 1) * $itemPerPage;
          return $this->excuteQuery("SELECT * FROM `product` WHERE CateID = {$id} ORDER BY ProductID DESC LIMIT {$startItem}, $this->itemPerPage");
     }

     public function getRelateProduct($pid = -1, $cid, $itemPerPage = 4)
     {
          return $this->excuteQuery("SELECT * FROM `product` WHERE CateID = {$cid} AND ProductID != {$pid} ORDER BY ProductID DESC LIMIT 0, {$itemPerPage}");
     }

     public function getTotalProductByCategory($id = -1)
     {
          return $this->excuteQuery("SELECT COUNT(*) FROM `product` WHERE CateID = {$id}")[0]['COUNT(*)'];
     }

     public function getTotalProductPageByCategory($cid)
     {
          return ceil($this->getTotalProductByCategory($cid) / $this->itemPerPage);
     }

     public function getTotalProduct()
     {
          return $this->excuteQuery("SELECT COUNT(*) FROM product")[0]["COUNT(*)"];
     }

     public function getTotalPage()
     {
          return ceil($this->getTotalProduct() / $this->itemPerPage);
     }

     public function addProduct($data, $picture)
     {
          $id = $this->getTotalProduct() + 1;
          $name = $data["name"];
          $cateId = $data["cateId"];
          $quantily = $data["quantily"];
          $description = str_replace("\\n", "\\\\n", $data["description"]);
          $price = $data["price"];
          $rating = $data["rating"];
          $discount = $data["discount"];

          $this->excuteQuery("INSERT INTO product (ProductID, ProductName, CateID, Quantily, Description, Price, Picture, Rating, Discount) values ({$id}, '{$name}', {$cateId}, {$quantily}, '{$description}', {$price}, '{$picture}', {$rating}, {$discount});");
     }
}
