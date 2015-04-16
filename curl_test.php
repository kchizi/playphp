<?php
    /**
     * curl 测试
     */
//    echo urldecode('Weike%5FUserhits%5F174241=1; Weike%5FUseradopt%5F174241%5F3=174241%5F3');
//    die;
    $data=array(
        'vodid' => '174241',
        'xiangmu' => '3',
        'nzz' => '46338479360565543'
    );
    $cookie = 'ASPSESSIONIDASSDSDCC=NCGsdfsdfECPIPCEFBDEPDBOAMD; Weike%5FUserhits%5F174241=1; Weike%5FUseradopt%5F174241%5F3=174241%5F3;';
    $url = 'http://weike.enetedu.com/js_support.asp?vodid=174241_5&xiangmu=3&nxxx=0.48726465459913015';
    $vote = 'http://weike.enetedu.com/js_useradopt.asp?vodid=174241&xiangmu=3&nzz=0.9455090945120901';
    $index = 'http://weike.enetedu.com/play.asp?vodid=174241&e=3';
    $ip_long = array(
        array('607649792', '608174079'), //36.56.0.0-36.63.255.255
        array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
        array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
        array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
        array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
        array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
        array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
        array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
        array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
        array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255
    );
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HEADER,1);//头文件以数据流输出
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回采集信息
    $rand_key = mt_rand(0, 9);
    $ip= long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip));  //构造IP
    curl_setopt($ch, CURLOPT_REFERER, "http://www.baidu.com/ ");   //构造来路
//    curl_setopt($ch,CURLOPT_COOKIE,$cookie);
    for($i=0;$i<1000;$i++){
        curl_setopt($ch,CURLOPT_URL,$index);
        curl_setopt($ch,CURLOPT_HTTPGET,1);
//    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_TIMEOUT,30);
        $str=curl_exec($ch);
    }
    if(curl_errno($ch)){
        echo curl_errno($ch);
        exit('curl 请求超时');
    }else{
//        echo $str;
    }
    curl_close($ch);
?>