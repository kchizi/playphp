<?php
    $a = 10;
    $b = 0;
    $b = $a<15 ? 0 : $b<0 ? 1 : -1;
    echo $b;
    die;
    sleep(10);
    echo 'success';
    echo '<pre/>';
    print_r($_SERVER);
    /*
    var a = 10;
    var b =0;
    var b = a<15 ? 0 : b<0 ? 1 : -1;
    alert(b);
    */
?>
