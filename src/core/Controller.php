<?php
class Controller
{
     public function loadModel($model)
     {
          $_ = $GLOBALS["_"];
          $modelName = "{$_(ucfirst(strtolower($model)))}_Model";

          if (file_exists("{$_(PATH_APPLICATION)}\models\\{$modelName}.php")) {
               include_once "{$_(PATH_APPLICATION)}\models\\{$modelName}.php";
               return new $modelName;
          } else {
               echo "File {$modelName} not found";
          }
     }

     public function loadView($view, $data = [])
     {
          $_ = $GLOBALS["_"];
          $viewName = "{$_(ucfirst(strtolower($view)))}_View";

          if (file_exists("{$_(PATH_APPLICATION)}\\views\\{$viewName}.php")) {
               include_once "{$_(PATH_APPLICATION)}\\views\\{$viewName}.php";
          } else {
               echo "File {$viewName} not found";
          }
     }
}
