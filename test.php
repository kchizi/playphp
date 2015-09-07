<?php
    /*
    $a = 10;
    $b = 0;
    $b = $a<15 ? 0 : $b<0 ? 1 : -1;
    echo $b;
    die;
    sleep(10);
    echo 'success';
    echo '<pre/>';
    print_r($_SERVER);
    */
    /*
    var a = 10;
    var b =0;
    var b = a<15 ? 0 : b<0 ? 1 : -1;
    alert(b);
    */
    $data = array(
        'action'=>'check',
        'password'=>'521314Gm',
        'username'=>'zhiqiang.cao'
    );
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_HEADER,0);//头文件以数据流输出
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回采集信息
    //curl_setopt($ch,CURLOPT_URL,'http://mis.com/attendance/employee_attendance_data_print.php?action=generate_print_data&e=1&year=2015&month=6');
    curl_setopt($ch,CURLOPT_URL,'https://mis.bei.gameloft.org/login.php');
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch,CURLOPT_TIMEOUT,30);
    $str = curl_exec($ch);
    if(curl_errno($ch)){
        mail('zhiqiang.cao@gameloft.com',__FILE__.':notifySmsReception curl请求超时','param1:'.print_r($data,1).'par1:'.curl_errno($ch));
        exit('curl 请求超时');
    }
    curl_close($ch);
    var_dump($str);
    echo $str;
?>
