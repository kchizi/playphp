<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/4/14/9:41
 * Filename: index.php
 */
//defined some define
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    define('MVC',true);
    define('W_PATH',getcwd());
    require W_PATH.'/config/config.ini.php';
    $i = new \mvc\controller\IndexController();
    $m = new \mvc\model\IndexModel();
    $i->index();
    $i->p($_SERVER);
    sleep(10);
    echo 'test';
//    $m->index();
?>