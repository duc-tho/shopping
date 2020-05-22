<?php
class Auth_Controller extends Controller
{
     public function indexAction()
     {
          $this->loginAction();
     }

     public function loginAction($status = "")
     {
          $error = "";

          if (isset($_COOKIE['authKey'])) {
               $verify = new Auth();

               if ($verify->authCookie()) {
                    header("location: /");
                    return;
               }
          }

          if (isset($_POST['submit'])) {
               $user = $this->loadModel("user");
               $userData = "";

               $userData = $user->getUserByEmail($_POST['email']);

               if (empty($userData)) {
                    $error = "Sai Email hoặc Mật khẩu!";
               } else {
                    $password = $userData[0]['Password'];

                    if (password_verify($_POST["password"], $password)) {
                         setrawcookie("authKey", $userData[0]["UID"] . "." . password_hash(SECRET_KEY, PASSWORD_DEFAULT), time() + 14400, "/");

                         if (isset($_SERVER['HTTP_REFERER'])) {
                              header("location: " . $_SERVER['HTTP_REFERER']);
                         } else {
                              header("location: /");
                         }
                    } else {
                         $error = "Sai Email hoặc Mật khẩu!";
                    }
               }
          }

          $this->loadView("auth", [
               "title" => "Đăng nhập",
               "page" => "login",
               "error" => [
                    "info" => $error,
                    "data" => $_POST,
                    "status" => $status
               ]
          ]);
     }

     public function registerAction()
     {
          $status = "";
          $error = "";

          if (isset($_COOKIE['authKey'])) {
               $verify = new Auth();

               if ($verify->authCookie()) {
                    header("location: /");
                    return;
               }
          }

          if (isset($_POST['submit'])) {
               $user = $this->loadModel("user");

               if ($user->addUser($_POST)) {
                    $status = "Tạo tài khoản thành công. Hãy đăng nhập!";
               };
          }

          $this->loadView("auth", [
               "title" => "Đăng Ký",
               "page" => "register",
               "status" => $status
          ]);
     }

     public function logoutAction()
     {
          $verify = new Auth();
          $verify->destroyCookie();

          header("location: /");
     }
}
