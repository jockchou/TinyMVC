<?php

class DefaultController extends Controller
{
    public function indexAction()
    {
        $userModel = $this->loadModel('UserModel');
        $userRow = $userModel->getUserByName('JockChou');

        $this->assign('title', 'TinyMVC Framework');
        $this->assign('content', 'Welcome to use TinyMVC framework!');
        $this->assign('user', $userRow);
    }
}