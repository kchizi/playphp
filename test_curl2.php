<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/7/3/15:31
 * Filename: test_curl2.php
 */
    require 'curl.class.php';
    $curl = new Aoccharge();
    $url = 'http://www.baidu.com';
    $fields =array(
        'wd' =>'php短链接',
        'f' =>'12'
    );
    $res = $curl->get($url,$fields);
    var_dump($res);
?>