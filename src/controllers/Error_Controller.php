<?php
class Error_Controller extends Controller
{
     public function __construct()
     {
          $verify = new Auth();
          $verify->authCookie();
     }

     public function indexAction($errCode = "404")
     {
          switch ($errCode) {
               case "404":
                    $this->loadView("e404", ["title" => "Lỗi"]);
                    break;
          }
     }
}
