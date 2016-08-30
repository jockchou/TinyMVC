<?php

class HelloController extends Controller
{
    public function greetingAction()
    {
        $userModel = $this->loadModel('UserModel');
        $user = $userModel->getUserByName('Tiny');

        $this->assign('title', 'Hello World');
        $this->assign('user', $user);

        $this->render('Hello\greeting');
    }
}