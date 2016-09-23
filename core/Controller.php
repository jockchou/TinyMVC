<?php
/**
 * @author    JockChou (http://jockchou.github.io)
 * @link      https://github.com/jockchou/TinyMVC
 * @copyright Copyright (c) 2016 JockChou
 * @license   https://raw.githubusercontent.com/jockchou/TinyMVC/master/LICENSE (Apache License)
 */
namespace TinyMVC\Core;

/**
 * Class Controller
 * @package TinyMVC\Core
 */
class Controller
{
    protected $template;
    protected $tplData;
    protected $isRendered;
    protected $modelMap;

    function __construct()
    {
        $this->template = null;
        $this->tplData = [];
        $this->isRendered = false;
        $this->modelMap = [];
    }


    /**
     * @param string $name
     * @param mixed $value
     */
    public function assign($name, $value)
    {
        if (is_object($value)) {
            $this->tplData[$name] = $value->fill();
        } else {
            $this->tplData[$name] = $value;
        }
    }

    /**
     * @param string $viewName
     * @param null $viewData
     * @return bool
     * @throws Exception
     */
    public function render($viewName, $viewData = null)
    {
        if ($this->isRendered) {
            return false;
        }

        $viewFile = V_PATH . $viewName . '.php';

        if (file_exists($viewFile)) {
            $this->template = new Template($viewFile);
            if (is_array($viewData) && count($viewData) > 0) {
                $this->tplData = array_merge($this->tplData, $viewData);
            }
            foreach ($this->tplData as $key => $val) {
                $this->template->set($key, $val);
            }
            echo $this->template->fill();
        } else {
            throw new TinyException("Template file " . $viewFile . " is not exists!");
        }
        $this->isRendered = true;

        return false;
    }

    /**
     * @param string $modelName
     * @return bool
     * @throws Exception
     */
    public function loadModel($modelName)
    {
        if (isset($this->modelMap[$modelName])) {
            return $this->modelMap[$modelName];
        }
        $modelClass = NS_MODEL . $modelName;

        if (class_exists($modelClass)) {
            $model = new $modelClass();
            $this->modelMap[$modelName] = $model;

            return $model;
        } else {
            throw new TinyException("Model Class " . $modelClass . " is not exists!");
        }

        return false;
    }

    public static function show404($message = null)
    {
        ob_start();
        include(V_PATH . '404.php');
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
        exit(0);
    }

    public static function show500($message)
    {
        ob_start();
        include(V_PATH . '500.php');
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
        exit(0);
    }
}