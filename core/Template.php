<?php
/**
 * @author    JockChou (http://jockchou.github.io)
 * @link      https://github.com/jockchou/TinyMVC
 * @copyright Copyright (c) 2016 JockChou
 * @license   https://raw.githubusercontent.com/jockchou/TinyMVC/master/LICENSE (Apache License)
 */
namespace TinyMVC\Core;

/**
 * Class Template
 * @package TinyMVC\Core
 */
class Template
{
    protected $file;
    protected $vars;

    /**
     * @param string $file
     */
    function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @param $name
     * @param $value
     */
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
        extract($this->vars, EXTR_SKIP);
        ob_start();
        include($this->file);
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}