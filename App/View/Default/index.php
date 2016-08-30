<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
<h1>
    <?php echo $content; ?>
</h1>

<p>
    TinyMVC is created by <i><?php echo $user['username']; ?></i>,
    you can email <strong><?php echo $user['email'] ?></strong>.
</>
</body>
</html>