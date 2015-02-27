<?php
    include './smssoap.class.php';
	$subSoap=new smssoap('http://10.209.8.211/test/soap_server.php','demo');
    $header=array('uri'=>'RequestSOAPHeader','namespace'=>'http://www.huawei.com.cn/schema/common/v2_1');
    $timeStamp=date('YmdHis',time()+3600*6);
    $user='200051';
    $pwd='Robi1234';
    $headerbody=array(
        'spId'=>$user,
        'spPassword'=>md5($user.$pwd.$timeStamp),
        'serviceId'=>'0305100002',
        'timeStamp'=>$timeStamp,
        'OA'=>'8801865555622',
        'FA'=>'8801865555622'
//        'linkid'=>'12345678901111',
//        'presentid'=>'22345678901113'
    );
    $param=array(
        'addresses'=>'tel:8801865555622',
        'senderName'=>'21206',
        'message'=>'hello,world',
        'receiptRequest'=>array(
            'endpoint'=>'http://208.71.186.73/robi/services/notify/sms_dr.php',
            'interfaceName'=>'notifySmsDeliveryReceipt',
            'correlator'=>uniqid(uniqid()),
            'test'=>array(
                'abc'=>'abc'
            )
        )
    );
    $method='sendSms';
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