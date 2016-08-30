<?php

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->assign('title', 'TinyMVC Framework');
        $this->assign('content', 'Welcome to use TinyMVC framework!');
    }
}