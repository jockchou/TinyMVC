<!DOCTYPE html>
<html>
<head>
    <title>500</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <style>
        #wrap {
            margin: 50px auto;
        }

        #logo {
            height: 64px;
            background: url("/images/logo.png") center center no-repeat;
            text-indent: -90000px;
        }

        #content h2 {
            font-size: 28px;
            color: #333;
            text-align: center;
        }

        #errorWrap {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="wrap">
    <h1 id="logo">500</h1>

    <div id="main">
        <div id="content">
            <h2>500 Internal Server Error!</h2>
            <?php if(ENV != 'prd') {?>
            <div id="errorWrap">
                <p><strong>Line: </strong><?php echo $message->getLine(); ?></p>
                <p><strong>File: </strong><?php echo $message->getFile(); ?></p>
                <p><strong>Message: </strong><?php echo $message->getMessage(); ?></p>
            </div>
            <?php }?>
        </div>
    </div>
</div>
</body>
</html>