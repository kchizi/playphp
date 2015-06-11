<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/9/11:41
 * Filename: test_refresh.php
 */
    session_start();
//    print_r($_GET);
//    session_destroy();
//    $_SESSION['12345345634a'] = 'abc';
//    $_SESSION[456] = 'abc';
//    $_SESSION[7889] = 'abc';
    print_r($_SESSION);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .refresh{
            width: 120px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            background: #0088ff;
            display: block;
        }
    </style>
</head>
<body>
    <a href="./http_refresh.php"class="refresh" target="_blank">
        测试refresh
    </a>
</body>
</html>