<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/4/2/20:32
 * Filename: require.php
 */
require_once './test.php';
Class test2{
    public function test(){
        $test=new test();
        $test->demo();
    }
}
$demo = new test2();
$demo->test();