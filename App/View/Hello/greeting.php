<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="/css/normalize.css" rel="stylesheet" media="all">
    <style>
        #wrap {
            width: 680px;
            margin: 100px auto;
        }

        #logo {
            height: 64px;
            background: url("/images/logo.png") center center no-repeat;
            text-indent: -90000px;
        }

        #main {
            font-size: 28px;
            color: #333;
            text-align: center;
        }

        #comment {
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div id="wrap">
    <h1 id="logo"><?php echo $title; ?></h1>

    <div id="main">
        <p id="content">
            <?php echo $words; ?>, <?php echo $user['username']; ?>!
        </p>

        <p id="comment">
            TinyMVC is created by <i>JockChou</i>, you can email <strong>jockchou@qq.com</strong>.
        </p>
    </div>
</div>
</body>
</html>