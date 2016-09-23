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
            $clazz = ucfirst(strtolower($pathArr[0]));
            $controllerClass = NS_CTRL . $clazz . C_SUFFIX;
            $controllerMethod = $action . M_SUFFIX;

            if (class_exists($controllerClass) && method_exists($controllerClass, $controllerMethod)) {
                try {
                    $controller = new $controllerClass();
                    if ($controller->$controllerMethod() !== false) {
                        $controller->render(strtolower($clazz) . APP_DS . strtolower($action));
                    }
                } catch (TinyException $tinyError) {
                    Controller::show500($tinyError);
                }
            } else {
                Controller::show404();
            }
        } else {
            Controller::welcome();
        }
    }
}