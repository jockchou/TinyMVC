<?php
require_once "../vendor/autoload.php";

use TinyMVC\Core\Controller;
use TinyMVC\Core\TinyException;

date_default_timezone_set("PRC");

define('APP_DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__DIR__) . APP_DS);
define('WEB_PATH', __DIR__ . APP_DS);
define('APP_PATH', realpath('../application') . APP_DS);
define('CFG_PATH', realpath('../config') . APP_DS);
define('RUN_PATH', realpath('../runtime') . APP_DS);
define('CORE_PATH', realpath('../core') . APP_DS);
define('C_PATH', realpath('../application/controller') . APP_DS);
define('M_PATH', realpath('../application/model') . APP_DS);
define('V_PATH', realpath('../application/view') . APP_DS);
define('NS_CTRL', "TinyMVC\\App\\Controller\\");
define('NS_MODEL', "TinyMVC\\App\\Model\\");

define('ENV', 'prd');
define('C_SUFFIX', 'Controller');
define('M_SUFFIX', 'Action');
define('C_NAME', 'c');
define('M_NAME', 'm');

if (ENV == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
} elseif (ENV == 'prd') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', RUN_PATH . APP_DS . 'logs' . APP_DS . 'error.log');
}

$c = 'Default';
$m = 'index';

if (isset($_SERVER['PATH_INFO'])) {
    $pathInfo = trim($_SERVER['PATH_INFO'], '/');

    if ($pathInfo !== '') {
        $pathArr = explode('/', $pathInfo);
        $c = ucfirst(strtolower($pathArr[0]));
        $m = strtolower((isset($pathArr[1]) ? $pathArr[1] : 'index'));
    }
} else {
    $c = ucfirst(strtolower((isset($_GET['C_NAME']) ? $_GET['C_NAME'] : 'Default')));
    $m = strtolower((isset($_GET['M_NAME']) ? $_GET['M_NAME'] : 'index'));
}

$controllerClass = NS_CTRL . $c . C_SUFFIX;
$controllerMethod = $m . M_SUFFIX;

if (class_exists($controllerClass, true) && method_exists($controllerClass, $controllerMethod)) {
    try {
        $controller = new $controllerClass();
        if ($controller->$controllerMethod() !== false) {
            $controller->render($c . DIRECTORY_SEPARATOR . $m);
        }
    } catch (TinyException $tinyError) {
        Controller::show500($tinyError);
    }
    exit(0);
}

Controller::show404();
