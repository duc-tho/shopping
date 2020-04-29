<?php
class Product_Model extends Database
{
     protected $itemPerPage = 20;

     public function getProduct($page)
     {
          $startItem = ($page - 1) * $this->itemPerPage;
          $endItem = $startItem + $this->itemPerPage;

          return $this->excuteQuery("SELECT * FROM product WHERE ProductID >= {$startItem} AND ProductID <= {$endItem}");
     }

     public function getTotalProduct()
     {
          return $this->excuteQuery("SELECT COUNT(*) FROM product")[0]["COUNT(*)"];
     }

     public function getTotalPage()
     {
          return ceil($this->getTotalProduct() / $this->itemPerPage);
     }
}
