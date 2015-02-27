<?php
    include './db_session.class.php';
    $dbsession=new DbSession();
    session_start();
//    setcookie(session_name(),session_id(),time()+3600,'/');
    $_SESSION['age']='2500';
   echo session_id();
    print_r($_SESSION);
//    echo time();
?>