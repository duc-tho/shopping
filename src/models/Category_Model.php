<?php
class Category_Model extends Database
{
     public function getCategory()
     {
          return $this->excuteQuery("SELECT * FROM category");
     }

     public function getCategoryById($id)
     {
          return $this->excuteQuery("SELECT * FROM `category` WHERE CateID = {$id}")[0];
     }

     public function getTotalCategory()
     {
          return $this->excuteQuery("SELECT COUNT(*) FROM category")[0]["COUNT(*)"];
     }
}
