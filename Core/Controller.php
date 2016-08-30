<?php

//load Template class file
require_once(CORE_PATH . 'Template.php');

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


    public function assign($name, $value)
    {
        if (is_object($value)) {
            $this->tplData[$name] = $value->fill();
        } else {
            $this->tplData[$name] = $value;
        }
    }

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
            throw new Exception("Template file " . $viewFile . " is not exists!");
        }
        $this->isRendered = true;

        return false;
    }

    public function loadModel($modelName)
    {
        if (isset($this->modelMap[$modelName])) {
            return $this->modelMap[$modelName];
        }
        $modelFile = M_PATH . $modelName . '.php';
        if (file_exists($modelFile)) {
            require_once($modelFile);
            $model = new $modelName;
            $this->modelMap[$modelName] = $model;

            return $model;
        } else {
            throw new Exception("Model file " . $modelFile . " is not exists!");
        }

        return false;
    }

    public static function show404()
    {
        ob_start();
        include(V_PATH . '404.php');
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
        exit(0);
    }
}