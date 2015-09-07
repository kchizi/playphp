<?php
    $client=new SoapClient('http://webservice.webxml.com.cn/WebServices/MobileCodeWS.asmx?wsdl',array('trace'=>true));
    $ret=$client->getMobileCodeInfo(array('mobileCode'=>'15031595889','userID'=>''));
    print_r($ret);
print_r($client);

//    $client=new SoapClient(null,
//        array(
//            'uri'=>'http://WebXml.com.cn/',
//            'location'=>'http://webservice.webxml.com',
//            'style'    => SOAP_DOCUMENT,
//            'use'      => XSD_NAMESPACE,
//            'trace'=>true
//        )
//    );
//    $arr=array('mobileCode'=>'15031595889','userID'=>'');
//    $v1=new SoapParam('15031595889','mobileCode');
//    $v2=new SoapParam('','userID');
//    $var=new SoapVar($arr,SOAP_ENC_OBJECT,'hehe');
//    $v3=new SoapParam($var,'getMobileCodeInfo');
//    $client->getMobileCodeInfo(array('mobileCode'=>'13623226876','userID'=>''));
//    $ret=$client->__soapCall('getMobileCodeInfo',$arr,array(
//        'soapaction'=>'http://WebXml.com.cn/getMobileCodeInfo',
//    ));
//    var_dump($client);
?>
