<?php
require_once "../vendor/autoload.php";

use TinyMVC\Core\Application;

date_default_timezone_set("PRC");
define('ENV', 'dev');
define('APP_DS', "/");
define('ROOT_PATH', str_replace('\\', '/', dirname(__DIR__)) . APP_DS);
define('WEB_PATH', ROOT_PATH . 'public' . APP_DS);
define('APP_PATH', ROOT_PATH . 'application' . APP_DS);
define('CFG_PATH', ROOT_PATH . 'config' . APP_DS);
define('RUN_PATH', ROOT_PATH . 'runtime' . APP_DS);
define('CORE_PATH', ROOT_PATH . 'core' . APP_DS);
define('C_PATH', ROOT_PATH . 'application/controller' . APP_DS);
define('M_PATH', ROOT_PATH . 'application/model' . APP_DS);
define('V_PATH', ROOT_PATH . 'application/view' . APP_DS);
define('NS_CTRL', "TinyMVC\\App\\Controller\\");
define('NS_MODEL', "TinyMVC\\App\\Model\\");
define('C_SUFFIX', 'Controller');
define('M_SUFFIX', 'Action');

if (ENV == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
} elseif (ENV == 'prd') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', RUN_PATH . 'logs/error.log');
}

$app = new Application(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null);
$app->run();

