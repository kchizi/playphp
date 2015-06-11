<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/9/13:54
 * Filename: http_refresh.php
 */
    $test = time();
    $html = <<<EOF
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="refresh" content="3; url=./http_refresh_2.php">
        <title>Document</title>
    </head>
    <body>
        <P style="line-height:40px;text-align:center;">
        Please wait, subscribe in processing...........
        </p>
    </body>
    </html>
EOF;
    session_start();
    $_SESSION['demo'] = 'demo';
    if(isset($_SESSION['req_time']) && time()-$_SESSION['req_time'] > 3){
        echo 'stop refesh<br/>';
        print_r($_SESSION);
    }else{
        $_SESSION['req_time'] = time();
//        echo $html;
        print_r($_SESSION);
    }
?>