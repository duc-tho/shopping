<?php
class Router
{
     protected $controller = DEFAULT_CONTROLLER;
     protected $action = DEFAULT_ACTION;
     protected $param = [];


     public function __construct()
     {
          $_ = $GLOBALS['_'];
          $urlArr = $this->urlParse();

          if (empty($urlArr[0]) || $urlArr[0] == "#") {
               $this->controller = "home";
          }

          // Kiểm tra file Controller có tồn tại hay không
          if (file_exists("{$_(PATH_APPLICATION)}\controllers\\{$_(ucfirst(strtolower($urlArr[0])))}_Controller.php"))
               $this->controller = array_shift($urlArr);
          else $urlArr = null;

          // Định đạng lại tên của Contoller
          $this->controller = "{$_(ucfirst(strtolower($this->controller)))}_Controller";

          // Include và khởi tạo Controller
          include_once "{$_(PATH_APPLICATION)}\controllers\\{$this->controller}.php";
          $this->controller = new $this->controller;

          // Kiểm tra Action có tồn tại hay không
          if (isset($urlArr[0])) {
               if (method_exists($this->controller, "{$_(strtolower($urlArr[0]))}Action")) {
                    $this->action = array_shift($urlArr);
               } else {
                    $urlArr = null;
                    //include_once "{$_(PATH_APPLICATION)}\controllers\\Error_Controller.php";
                    //$this->controller = new Error_Controller;
               }
          }

          // định dạng tên Action
          $this->action = "{$_(strtolower($this->action))}Action";

          // Param
          $this->param = $urlArr ? array_values($urlArr) : [];

          // Gọi Action
          call_user_func_array([$this->controller, $this->action], $this->param);
     }

     public function urlParse()
     {
          if (isset($_GET['url'])) {
               return explode("/", $_GET['url']);
          }
     }
}
