![logo](./resource/logo.png)

## TinyMVC PHP Framework
TinyMVC is a small PHP MVC framework

[![Latest Stable Version](https://poser.pugx.org/jockchou/tinymvc/v/stable)](https://packagist.org/packages/jockchou/tinymvc)
[![Total Downloads](https://poser.pugx.org/jockchou/tinymvc/downloads)](https://packagist.org/packages/jockchou/tinymvc)
[![Latest Unstable Version](https://poser.pugx.org/jockchou/tinymvc/v/unstable)](https://packagist.org/packages/jockchou/tinymvc)
[![License](https://poser.pugx.org/jockchou/tinymvc/license)](https://packagist.org/packages/jockchou/tinymvc)


## Installation

It's recommended that you use [Composer](https://getcomposer.org/) to install this framework.

```bash
$ composer require jockchou/tinymvc
```

## How to run

```bash
$ cd /d/gitroot/TinyMVC/public
$ php -S localhost:9000
PHP 5.6.16 Development Server started at Fri Sep 23 16:33:52 2016
Listening on http://localhost:9000
Document root is D:\gitroot\TinyMVC\public
Press Ctrl-C to quit.
```

## Browse
Open browser, enter http://localhost:9000 in the address bar

![logo](./resource/TinyMVC.png)

## HelloWorld

import resource/tiny.sql file to your MySQL database, Modify /config/dev/database.php

```
$config['default']['dsn'] = 'mysql:host=localhost;port=3306;dbname=tiny;charset=utf8mb4';
$config['default']['username'] = 'root';
$config['default']['password'] = '123456';
```

open http://localhost:8080/index.php?c=hello&m=greeting on your browser, You can also use http://localhost:8080/hello/greeting.

## Structure

```
.
├── application                    ##业务逻辑实现，MVC
│   ├── controller                 ##控制器
│   │   └── DefaultController.php  ##默认控制器
│   ├── model                      ##模型
│   └── view                       ##视图
│       ├── 404.php
│       └── 500.php
├── config                         ##配置文件目录
│   ├── dev
│   └── prd
├── core                           ##框架核心文件
│   ├── Controller.php
│   ├── Model.php
│   └── Template.php
├── LICENSE
├── README.md
└── public                         ##网站根目录
    ├── css                        ##css文件目录
    ├── js                         ##js文件目录
    ├── images                     ##图片目录
	├── favicon.ico 
    └── index.php                  ##框架入口
```

## Contact

jockchou@qq.com