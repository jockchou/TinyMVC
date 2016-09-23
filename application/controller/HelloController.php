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
 * Class HelloController
 * @package TinyMVC\App\Controller
 */
class HelloController extends Controller
{
    public function greetingAction()
    {
        $userModel = $this->loadModel('UserModel');
        $user = $userModel->getUserByName('Tiny');

        $this->assign('title', 'Hello World');
        $this->assign('user', $user);

        $this->render('Hello/greeting');
    }
}