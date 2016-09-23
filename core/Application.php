<?php
/**
 * @author    JockChou (http://jockchou.github.io)
 * @link      https://github.com/jockchou/TinyMVC
 * @copyright Copyright (c) 2016 JockChou
 * @license   https://raw.githubusercontent.com/jockchou/TinyMVC/master/LICENSE (Apache License)
 */
namespace TinyMVC\Core;

/**
 * Class Application
 * @package TinyMVC\Core
 */
class Application
{
    private $pathInfo = null;

    /**
     * @param string $path
     */
    function __construct($path)
    {
        $this->pathInfo = trim($path, '/');
    }

    public function run()
    {
        if (!empty($this->pathInfo)) {
            $pathArr = explode('/', $this->pathInfo);
            $action = strtolower((isset($pathArr[1]) ? $pathArr[1] : 'index'));

            $controller = ucfirst(strtolower($pathArr[0]));
            $controllerClass = NS_CTRL . $controller . C_SUFFIX;
            $controllerMethod = $action . M_SUFFIX;

            if (class_exists($controllerClass) && method_exists($controllerClass, $controllerMethod)) {
                try {
                    $controllerObject = new $controllerClass();
                    if ($controllerObject->$controllerMethod() !== false) {
                        $controllerObject->render(strtolower($controller) . APP_DS . $action);
                    }
                } catch (FrameworkException $e) {
                    Controller::show500($e);
                }
            } else {
                Controller::show404();
            }
        } else {
            Controller::welcome();
        }
    }
}