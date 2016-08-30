<?php

class DefaultController extends Controller
{
    public function indexAction()
    {
        $userArr = [
            'username' => 'JockChou',
            'email' => 'jockchou@qq.com'
        ];

        $this->assign('title', 'TinyMVC Framework');
        $this->assign('content', 'Welcome to use TinyMVC framework!');
        $this->assign('user', $userArr);
    }
}