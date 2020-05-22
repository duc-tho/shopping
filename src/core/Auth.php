<?php
class Auth
{
     public function authCookie()
     {
          if (isset($_COOKIE['authKey'])) {
               $token = explode(".", $_COOKIE['authKey']);
               array_shift($token);

               $token = implode(".", $token);

               if (!password_verify(SECRET_KEY, $token)) {
                    $this->destroyCookie();
                    return false;
               }

               return true;
          }
     }

     public function destroyCookie()
     {
          setcookie("authKey", "", time() - 3600, "/");
     }
}
