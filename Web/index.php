<?php
date_default_timezone_set("PRC");

define('ENV', 'dev');

define('WEB_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('APP_PATH', realpath('../App') . DIRECTORY_SEPARATOR);
define('CFG_PATH', realpath('../Config') . DIRECTORY_SEPARATOR);
define('CORE_PATH', realpath('../Core') . DIRECTORY_SEPARATOR);

define('C_PATH', realpath('../App/Controller') . DIRECTORY_SEPARATOR);
define('M_PATH', realpath('../App/Model') . DIRECTORY_SEPARATOR);
define('V_PATH', realpath('../App/View') . DIRECTORY_SEPARATOR);

define('C_SUFFIX', 'Controller');
define('M_SUFFIX', 'Action');

$c = (isset($_GET['c']) ? $_GET['c'] : 'Default');
$m = (isset($_GET['m']) ? $_GET['m'] : 'index');

$controllerClass = $c . C_SUFFIX;
$controllerMethod = $m . M_SUFFIX;

$baseControllerClassFile = CORE_PATH . 'Controller.php';
$baseModelClassFile = CORE_PATH . 'Model.php';
$controllerClassFile = C_PATH . $controllerClass . '.php';

//load Controller class file
require_once($baseControllerClassFile);

//load Model class file
require_once($baseModelClassFile);

//load user controller class file
require_once($controllerClassFile);

//new Controller Object
$controller = new $controllerClass();

//run controller action method
if ($controller->$controllerMethod() !== false) {
    $controller->render($c . DIRECTORY_SEPARATOR . $m);
}