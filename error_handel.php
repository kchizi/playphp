<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/4/8/17:44
 * Filename: error_handel.php
 */
/*
 * 原作者给出了两点需要注意的地方，我也放出来吧，希望引起广大同胞们的注意：

E_ERROR、E_PARSE、E_CORE_ERROR、E_CORE_WARNING、 E_COMPILE_ERROR、E_COMPILE_WARNING是不会被这个句柄处理的，也就是会用最原始的方式显示出来。不过出现这些错误都是编 译或PHP内核出错，在通常情况下不会发生。
使用set_error_handler()后，error_reporting ()将会失效。也就是所有的错误（除上述的错误）都会交给自定义的函数处理。
 */
    set_error_handler('myErrorHandler');
    function myErrorHandler($errno, $errstr, $errfile, $errline,$errtext)
    {
        global $email, $debug,$admin;
        if (!(error_reporting() & $errno)) {
            // This error code is not included in error_reporting
            return;
        }
        $message='';
        switch ($errno) {
            case E_USER_ERROR:
                $message.= "<b>My ERROR</b> [$errno] $errstr<br />\n";
                $message.= "Fatal error on line $errline in file $errfile";
                $message.= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
                $message.=  "vars:".print_r($errtext,1);
                break;
            case E_USER_WARNING:
                $message.= "<b>My WARNING</b> [$errno] $errstr<br />\n";
                break;
            case E_USER_NOTICE:
                $message.= "<b>My NOTICE</b> [$errno] $errstr<br />\n";
                break;
            default:
                $message.= "Unknown error type: [$errno] $errstr in file $errfile<br />\n";
                break;
        }
        if ($debug) {
            echo "<div class='error'>$message</div>";
            debug_print_backtrace();
        } else {
            /*
             * send message if 是管理员身份或者指定ip
             */
            if($admin){
                error_log($message,1,$email);
            }
        }
    }
//    mysql_connect('localhsot:3306','root','');
//    $con->test();

?>