<?php

class HelloController extends Controller
{
    public function greetingAction()
    {
        $userModel = $this->loadModel('UserModel');
        $userRow = $userModel->getUserByName('JockChou');

        $this->assign('title', 'TinyMVC framework');
        $this->assign('words', 'Hello World');
        $this->assign('user', $userRow);

        $this->render('Hello\greeting');
    }
}