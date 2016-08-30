![logo](./logo.png)

# TinyMVC

TinyMVC is a small PHP MVC framework

----------

## 1. 导入数据库 ##
将tiny.sql导入你的MySQL数据库中

## 2. 修改数据库配置 ##
将`/Config/dev/database.php`配置修改成你的数据库信息
```
$config['default']['dsn'] = 'mysql:host=localhost;port=3306;dbname=tiny;charset=utf8mb4';
$config['default']['username'] = 'root';
$config['default']['password'] = '123456';
```

## 3. 启动PHP内置服务器 ##
进入到`/Web/index.php`文件所在目录，`index.php`是框架入口文件，在`Web`目录执行以下命令启动php内置服务器
```
$ php -S localhost:8080
PHP 5.6.16 Development Server started at Tue Aug 30 13:53:56 2016
Listening on http://localhost:8080
```
此时服务器已经监听8080端口

## 4. 在浏览器中预览 ##
在浏览器地址栏输入地址:`http://localhost:8080`，出现以下内容说明运行成功
![logo](./TinyMVC.png)

## 5. 开发 ##
在浏览器地址栏输入地址:`http://localhost:8080/index.php?c=hello&m=greeting`观察输出页面，并阅读`App`目录下的MVC三个文件夹中的代码

```
.
├── App                            ##业务逻辑实现，MVC
│   ├── Controller                 ##控制器
│   │   └── DefaultController.php  ##默认控制器
│   ├── Model                      ##模型
│   └── View                       ##视图
│       └── 404.php
├── Config                         ##配置文件目录
│   ├── dev
│   └── prd
├── Core                           ##框架核心文件
│   ├── Controller.php
│   ├── Model.php
│   └── Template.php
├── LICENSE
├── README.md
└── Web                            ##网站根目录
    ├── css                        ##css文件目录
    ├── js                         ##js文件目录
    ├── images                     ##图片目录
	├── favicon.ico 
    └── index.php                  ##框架入口
```
## 6. 联系我 ##
你可以发邮件到：`jockchou@qq.com`.