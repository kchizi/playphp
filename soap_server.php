<?php
    function sendSms($req,$req2){
//        return $req;
//        $response='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:loc="http://www.csapi.org/schema/parlayx/data/sync/v1_0/local"><soapenv:Header/><soapenv:Body><loc:syncOrderRelationResponse><loc:result>0</loc:result><loc:resultDescription>OK</loc:resultDescription></loc:syncOrderRelationResponse></soapenv:Body></soapenv:Envelope>';
//        return $response;
        $arr=arrayToobj(array('result'=>'0','resultDescription'=>'ok'));
//        $par=new SoapParam($var,null);
        $par1=new SoapParam('0','result');
        $par2=new SoapParam('ok','resultDescription');
        $var=new SoapVar($arr,SOAP_ENC_OBJECT,'result');
        $par=new SoapParam($arr,'sendSmsRespons');
//        file_put_contents('./test.php',print_r($par,1));
        return $par1;
    }
    function arrayToobj($arr){
            if(!is_array($arr)) return $arr;
            foreach($arr as $key=>$val){
                if(is_array($val)){
                    $arr[$key]=$this->arrayToobj($val);
                }
            }
            return (object)$arr;
    }
    $server=new SoapServer(null,array('uri'=>'demo'));
    $server->addFunction('sendSms');
    $server->handle();
?>