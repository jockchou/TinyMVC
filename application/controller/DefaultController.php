<?php
/**
 * @author    JockChou (http://jockchou.github.io)
 * @link      https://github.com/jockchou/TinyMVC
 * @copyright Copyright (c) 2016 JockChou
 * @license   https://raw.githubusercontent.com/jockchou/TinyMVC/master/LICENSE (Apache License)
 */
namespace TinyMVC\App\Controller;

use TinyMVC\Core\Controller;

/**
 * Class DefaultController
 * @package TinyMVC\App\Controller
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $userInfo = [
            'username' => 'JockChou',
            'email' => 'jockchou@qq.com'
        ];

        $this->assign('title', 'TinyMVC Framework');
        $this->assign('content', 'Welcome to use TinyMVC framework!');
        $this->assign('user', $userInfo);
    }
}