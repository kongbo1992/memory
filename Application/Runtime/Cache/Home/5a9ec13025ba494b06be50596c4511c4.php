<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="/Public/css/sitecss/reset.css">
        <link rel="stylesheet" href="/Public/css/sitecss/supersized.css">
        <link rel="stylesheet" href="/Public/css/sitecss/style.css">
        <script src="__JS_/sitejs/jquery-1.8.2.min.js"></script>
        <script src="__JS_/sitejs/supersized.3.2.7.min.js"></script>
        <script src="__JS_/sitejs/supersized-init.js"></script>
        <script src="__JS_/sitejs/scripts.js"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="" method="post">
                <input type="text" name="username" class="username" placeholder="用户名">
                <input type="password" name="password" class="password" placeholder="密码">
                <button type="submit">登&nbsp;录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <!--<div align="center">Collect from <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></div>-->

        <!-- Javascript -->


    </body>

</html>