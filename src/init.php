<?php
$GLOBALS["_"] = function ($param) {
     return $param;
};

//set time zone
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Database Param
define("DB_HOST", "localhost");
define("DB_USER", "ductho");
define("DB_PASS", "ngoductho18607095");
define("DB_DATABASE", "meishop");

// Defaut Param
define("DEFAULT_CONTROLLER", "Error");
define("DEFAULT_ACTION", "index");

// PATH
define("PATH_APPLICATION", __DIR__);
define("PATH_ROOT", $_SERVER['DOCUMENT_ROOT']);
define("PATH_PUBLIC", $_SERVER['DOCUMENT_ROOT'] . '/public');
