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
composer create-project jockchou/tinymvc
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
Open browser, enter ***http://localhost:9000*** in the address bar

![logo](./resource/TinyMVC.png)

## HelloWorld

import ***resource/tiny.sql*** file to your MySQL database, Modify ***/config/dev/database.php***

```
$config['default']['dsn'] = 'mysql:host=localhost;port=3306;dbname=tiny;charset=utf8mb4';
$config['default']['username'] = 'root';
$config['default']['password'] = '123456';
```

open ***http://localhost:9000/index.php?c=hello&m=greeting*** on your browser, You can also use ***http://localhost:9000/hello/greeting***

## Structure

```
.
|-- LICENSE
|-- README.md
|-- application
|   |-- controller
|   |   |-- DefaultController.php
|   |   `-- HelloController.php
|   |-- model
|   |   `-- UserModel.php
|   `-- view
|       |-- 404.php
|       |-- 500.php
|       |-- Default
|       |   `-- index.php
|       `-- Hello
|           `-- greeting.php
|-- composer.json
|-- composer.lock
|-- config
|   |-- dev
|   |   `-- database.php
|   `-- prd
|       `-- database.php
|-- core
|   |-- Controller.php
|   |-- Model.php
|   |-- Template.php
|   `-- TinyException.php
|-- public
|   |-- css
|   |   `-- normalize.css
|   |-- favicon.ico
|   |-- images
|   |   `-- logo.png
|   |-- index.php
|   `-- js
|       `-- zepto.min.js
|-- resource
|   |-- TinyMVC.png
|   |-- logo.png
|   `-- tiny.sql
`-- runtime
    `-- logs
        `-- error.log
```

## Contact

jockchou@qq.com