<?php
class Category_Model extends Database
{
     public function getCategory()
     {
          return $this->excuteQuery("SELECT * FROM category");
     }
}
