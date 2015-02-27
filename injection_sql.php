<?php
//    $id=mysql_real_escape_string($_GET['id']);
    $id=$_GET['id'];
    $sql="select * from t1 where uname='{$id}'";
    echo $sql;
    echo '<br/>';
//    $sql=mysql_real_escape_string($sql);
    $con=mysql_connect('localhost','root','');
    if(!$con){
        echo mysql_error();
    }else{
//        echo 'success';
    }
    mysql_query('set names utf8');
    mysql_select_db('opmysql');
    $res=mysql_query($sql);
    var_dump($res);
    while($row=mysql_fetch_array($res)){
        $arr[]=$row;
    }
    print_r($arr);
    mysql_free_result($res);
?>