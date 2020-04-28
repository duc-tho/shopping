<?php
class News_Controller
{
     public function __construct()
     {
          echo "News Controller";
     }

     public function indexAction()
     {
          echo "News Index Action";
     }

     public function showAction($name = "", $old = "")
     {
          echo "News Show Action - " . $name . " - " . $old;
     }
}
