<?php
class Database
{
     protected $conn;

     public function __construct()
     {
          $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

          if ($this->conn->connect_error) die("Kết nối đến database thất bai!\n{$this->conn->connect_error}");

          mysqli_query($this->conn, "SET NAMES 'utf8'");
     }

     public function __destruct()
     {
          $this->conn->close();
     }

     public function excuteQuery($query)
     {
          return $this->dataHandle($this->conn->query($query));
     }

     public function dataHandle($data)
     {

          if (isset($data->num_rows) && $data->num_rows > 0) {
               while ($row = $data->fetch_assoc()) {
                    $result[] = $row;
               }

               return $result;
          } else {
               return [];
          }
     }
}
