<?php
date_default_timezone_set("PRC");

define('ENV', 'dev');
if (ENV == 'dev') {
    error_reporting(E_ALL);
} elseif (ENV == 'prd') {
    error_reporting(0);
} else {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}

define('WEB_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('APP_PATH', realpath('../App') . DIRECTORY_SEPARATOR);
define('CFG_PATH', realpath('../Config') . DIRECTORY_SEPARATOR);
define('CORE_PATH', realpath('../Core') . DIRECTORY_SEPARATOR);

define('C_PATH', realpath('../App/Controller') . DIRECTORY_SEPARATOR);
define('M_PATH', realpath('../App/Model') . DIRECTORY_SEPARATOR);
define('V_PATH', realpath('../App/View') . DIRECTORY_SEPARATOR);

define('C_SUFFIX', 'Controller');
define('M_SUFFIX', 'Action');

define('C_NAME', 'c');
define('M_NAME', 'm');

$c = 'Default';
$m = 'index';
if (isset($_SERVER['PATH_INFO'])) {
    $pathInfo = trim($_SERVER['PATH_INFO'], "/");
    if ($pathInfo !== '') {
        $pathArr = explode("/", $pathInfo);
        $c = ucfirst(strtolower($pathArr[0]));
        $m = strtolower((isset($pathArr[1]) ? $pathArr[1] : 'index'));
    }
} else {
    $c = ucfirst(strtolower((isset($_GET['C_NAME']) ? $_GET['C_NAME'] : 'Default')));
    $m = strtolower((isset($_GET['M_NAME']) ? $_GET['M_NAME'] : 'index'));
}

$controllerClass = $c . C_SUFFIX;
$controllerMethod = $m . M_SUFFIX;

$baseControllerClassFile = CORE_PATH . 'Controller.php';
$baseModelClassFile = CORE_PATH . 'Model.php';
$controllerClassFile = C_PATH . $controllerClass . '.php';

//load Controller class file
require_once($baseControllerClassFile);

//load Model class file
require_once($baseModelClassFile);

if (file_exists($controllerClassFile)) {
    //load user controller class file
    require_once($controllerClassFile);

    if (method_exists($controllerClass, $controllerMethod)) {
        //new Controller Object
        $controller = new $controllerClass();

        //run controller action method
        if ($controller->$controllerMethod() !== false) {
            $controller->render($c . DIRECTORY_SEPARATOR . $m);
        }
        exit(0);
    }
}

Controller::show404();


