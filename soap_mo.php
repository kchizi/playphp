<?php
    include './smssoap.class.php';
	$subSoap=new smssoap('http://208.71.186.73/robi/services/notify/sms_mo.php','demo');
    $header=array('uri'=>'RequestSOAPHeader','namespace'=>'http://www.huawei.com.cn/schema/common/v2_1');
    $timeStamp=date('YmdHis',time()+3600*6);
    $user='200051';
    $pwd='Robi1234';
    $headerbody=array(
        'spId'=>$user,
        'spPassword'=>md5($user.$pwd.$timeStamp),
        'serviceId'=>'0305100002',
        'timeStamp'=>$timeStamp,
        'OA'=>'8801829509019',
        'FA'=>'8801829509019',
        'traceUniqueID'=>'12345678901111afdsadf',
//        'presentid'=>'22345678901113'
    );
    $param=array(
        'correlator'=>'tel:8801829509019',
        'message'=>array(
            'message'=>'UNLOCK V006 S001 1234 1 4753 EN 0',
            'senderAddress'=>'tel:8801829509019',
            'dateTime'=>uniqid(uniqid()),
        )
    );
    $method='notifySmsReception';
    $result=$subSoap->startSmsNotification($header,$headerbody,$param,$method);
    print_r($subSoap->soap_client);
//    var_dump($client);
//    $soap_w=new SoapClient('http://208.71.186.73/robi/services/notify/robiSMSNotify.wsdl',array('trace'=>true));
//    $header = new SOAPHeader('http://www.huawei.com.cn/schema/common/v2_1','RequestSOAPHeader', $headerbody);
//    $soap_w->__setSoapHeaders($header);
//    $soap_w->notifySmsDeliveryReceipt($param);
//    print_r($soap_w);
//    var_dump($soap_w->__getFunctions());
//    $soap_w->notifySmsDeliveryReceipt($param);
?>