<?php
class User_Model extends Database
{
     public function getUserByEmail($email)
     {
          return $this->excuteQuery("SELECT * FROM user WHERE email = '{$email}'");
     }

     public function getLastUser()
     {
          return $this->excuteQuery("SELECT * FROM user ORDER BY UID DESC LIMIT 0, 1")[0];
     }

     public function getUserById($id)
     {
          return $this->excuteQuery("SELECT * FROM user WHERE UID = '{$id}'")[0];
     }

     public function addUser($data)
     {
          $id = $this->getLastUser()['UID'] + 1;
          $email = $data['email'];
          $username = $data['username'];
          $password = password_hash($data['password'], PASSWORD_DEFAULT);
          $avatar = "none";
          $name = $data['name'];
          $access = 0; //$data['access'];

          if ($this->excuteQuery("INSERT INTO `user` (`UID`, `Email`, `Username`, `Password`, `Avatar`, `Name`, `access`) VALUES ('{$id}', '{$email}', '{$username}', '{$password}', '{$avatar}', '{$name}', {$access});") != "fail") {
               return true;
          }

          return false;
     }
}
