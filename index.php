<?php
$test=array("1","2","3");
foreach($test as &$value){
//    echo $value;
}
//$test1=implode(",",$test);
//echo $value;
foreach($test as $value){var_dump($value);}
//$test1=implode(",",$test);
//echo $test1;
die;
    session_start();
    $_SESSION['test'] = 'zhangzhiming';
    var_dump($_SESSION);
//    $a=array();
//    var_dump(empty($a));
?>