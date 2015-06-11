<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/9/14:47
 * Filename: http_refresh_2.php
 */
    session_start();
    $_SESSION[mt_rand(1000,1000000).'test'] = 'test';
    sleep(10);
?> 