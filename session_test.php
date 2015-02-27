<?php
    session_start();
    //$_SESSION['name']='zhiqiangbuxi';
    //$_SESSION['test']='test';
//    unset($_SESSION['test']);
   // session_destroy();
    print_r(session_get_cookie_params());
    print_r($_SESSION);
?>