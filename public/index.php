<?php
define("DS", DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define("APP", ROOT  . DS . 'app');
define("CONFIG", APP . DS . 'config');
define("CORE", APP . DS . 'core');
define("CONTROLLERS", APP . DS . 'controllers');
define("MODELS", APP . DS . 'models');
define("VIEWS", APP . DS . 'views' . DS);
// require_once(CORE . "/app.php");
//config
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");

define("DATABASE", "lms");
define("DATABASE_TYPE", "mysql");


define("DOMAIN_NAME", "http://mvc.test:8080/");

require_once("../vendor/autoload.php");


// echo "<pre>";
// echo CONFIG;
// echo $_SERVER['QUERY_STRING'];
// print_r($_SERVER);


$app = new MVC\core\app();
