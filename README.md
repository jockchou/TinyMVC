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
[root@localhost public]# php -S localhost:9000
PHP 7.0.11 Development Server started at Fri Sep 23 09:52:14 2016
Listening on http://localhost:9090
Document root is /var/tinymvc/public
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

open ***http://localhost:9000/hello/greeting*** on your browser

## Structure

```
.
├── application
│   ├── controller
│   │   └── HelloController.php
│   ├── model
│   │   └── UserModel.php
│   └── view
│       ├── 404.php
│       ├── 500.php
│       ├── Hello
│       │   └── greeting.php
│       └── welcome.php
├── composer.json
├── composer.lock
├── config
│   ├── dev
│   │   └── database.php
│   └── prd
│       └── database.php
├── core
│   ├── Application.php
│   ├── Controller.php
│   ├── FrameworkException.php
│   ├── Model.php
│   └── Template.php
├── LICENSE
├── public
│   ├── css
│   │   └── normalize.css
│   ├── favicon.ico
│   ├── images
│   │   └── logo.png
│   ├── index.php
│   └── js
│       └── zepto.min.js
├── README.md
├── resource
│   ├── logo.png
│   ├── TinyMVC.png
│   └── tiny.sql
└── runtime
    └── logs
```

## Nginx
```
server {
        listen       80;
        server_name  tinymvc.anole.me;
        root         /var/tinymvc/public;
        charset      utf8;

        access_log  logs/tinymvc.access.log  main;
        error_log  logs/tinymvc.error.log;

        location / {
            try_files $uri /index.php$is_args$args;
        }

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        location ~ ^/index\.php(/|$) {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include        fastcgi_params;
        }

        location ~ \.php$ {
            return 404;
        }
}
```
## Contact

jockchou@qq.com