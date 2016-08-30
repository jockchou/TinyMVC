<?php

class Template
{
    protected $file;
    protected $vars;

    function __construct($file)
    {
        $this->file = $file;
    }

    public function set($name, $value)
    {
        if (is_object($value) && method_exists($value, 'fill')) {
            $this->vars[$name] = $value->fill();
        } else {
            $this->vars[$name] = $value;
        }
    }

    public function fill()
    {
        extract($this->vars);
        ob_start();
        include($this->file);
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}