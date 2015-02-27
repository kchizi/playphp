<?php
    /**
     * curl 测试
     */
    $data=array(
        'name'=>'zhiqiangbuxi',
        'age'=>'nan',
        'hobby'=>array(
            'good'=>'reader',
            'bad'=>'none'
        )
    );
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_HEADER,1);//头文件以数据流输出
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回采集信息
    curl_setopt($ch,CURLOPT_URL,'http://10.209.8.212/test/curl_server.php');
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch,CURLOPT_TIMEOUT,30);
    $str=curl_exec($ch);
    if(curl_errno($ch)){
        exit('curl 请求超时');
    }
//    echo $str;
?>