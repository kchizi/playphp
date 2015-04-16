<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once 'subsoap.class.php';
    $subSoap=new subsoap('http://208.71.186.73/robi/services/notify/subscription.php','http://www.csapi.org/wsdl/parlayx/subscribe/manage/v1_0');
    $header=array('uri'=>'RequestSOAPHeader','namespace'=>'http://www.huawei.com.cn/schema/common/v2_1');
    $timeStamp=date('YmdHis',time()+3600*6);
    $user='200051';
    $pwd='Robi1234';
    $headerbody=array(
        'spId'=>$user,
        'spPassword'=>md5($user.$pwd.$timeStamp),
        'timeStamp'=>$timeStamp
    );
    $param=array(
            'userID'=>array('id'=>'8613012312123','type'=>'0'),
            array('spId'=>'20051'),
            array('productID'=>'0300400004'),
            array('serviceID'=>'0305100003'),
            array('serviceList'=>'0305100003'),
            array('updateType'=>'2'),
            array('updateTime'=>'20150401015453'),
            array('updateDesc'=>'Deletion'),
            array('effectiveTime'=>'20150331101953'),
            array('expiryTime'=>'20150401015453'),
            'extensionInfo'=>array(
                array('key'=>'accessCode','value'=>'21206'),
                array('key'=>'chargeMode','value'=>'19'),
                array('key'=>'MDSPSUBEXPMODE','value'=>'1')
            )
    );
//    $bodytype='subscribeProductReq';
    $method='SyncOrderRelation';
    $results=$subSoap->subscription($header,$headerbody,$param,$method);
//    echo 'abc';
    print_r($subSoap->soap_client);
//    echo '<br/>';
//echo '<hr/>';
//    echo $subSoap->soap_client->__getLastRequest();
?>