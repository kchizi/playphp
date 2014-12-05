<?php
    require_once 'includes/header.inc.php';
    require_once 'includes/subsoap.class.php';
    $subSoap=new subsoap('http://10.16.100.194:8310/SubscribeManageService/services/SubscribeManage','http://www.csapi.org/wsdl/parlayx/subscribe/manage/v1_0');
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
            'subscribeProductReq'=>array(
                'userID'=>array('id'=>'8613012312123','type'=>'0'),
                'subInfo'=>array('productID'=>'0300399132','operCode'=>'zh','isAutoExtend'=>'0','channelID'=>'1')
            ),
        'hello'=>array(
            'name'=>'helloe',
            'kind'=>'helloe'
        )
    );
//    $bodytype='subscribeProductReq';
    $method='subscribeProductRequest';
    $results=$subSoap->subscription($header,$headerbody,$param,$method);
//    echo 'abc';
    print_r($results);
//    echo '<br/>';
echo '<hr/>';
    echo $subSoap->soap_client->__getLastRequest();
?>