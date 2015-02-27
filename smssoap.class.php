<?php
    Class smssoap{
        private $location;
        private $uri;
        public  $soap_client;
        public  $results;
        public  $error;
        public function __construct($location,$uri=''){
            $this->location=$location;
            $this->uri=$uri;
        }
        /**
         * @param string $header array() 提供文档中soap的header、namespace、key
         * @param $headerbody array() 提供文档中的header验证信息
         * @param $paramer 文档 startSmsNotification 需要的参数数组
         */
        public function startSmsNotification($header='',$headerbody,$paramer,$method='startSmsNotification'){
            try{
                $this->soap_client=new SoapClient(null,array(
                    'location'=>$this->location,//请求url
                    'uri'=>$this->uri,//server命名空间
                    'trace'=>1
                ));
                if(!empty($header)){
                    $headerbody=$this->arrayToobj($headerbody);
                    $soap_var=new SoapVar($headerbody,SOAP_ENC_OBJECT,$header['uri']);
                    $soap_header = new SOAPHeader($header['namespace'],$header['uri'], $headerbody);
                    $this->soap_client->__setSoapHeaders(array($soap_header));
                }
                $bodyArr=array();
                foreach($paramer as $key => $val){
                    if(is_array($val)){
                        $parObj=$this->arrayToobj($val);
                        $soap_var_b=new SoapVar($parObj,SOAP_ENC_OBJECT,$key);
                        $lastPar=new SoapParam($soap_var_b,$key);
                    }else{
                        $lastPar=new SoapParam($val,$key);
                    }
                    array_push($bodyArr,$lastPar);
                }
                $this->results=$this->soap_client->__soapCall($method,$bodyArr,array('soapaction'=>'','uri'=>$this->uri));
                return $this->results;
            }catch (Exception $e){
                $this->error['error']='sms异常,message:'.$e->getMessage();
            }
        }
        /*
         * stopSmsNotification
         */
        public function stopSmsNotification($header='',$headerbody,$paramer,$method='stopSmsNotification'){
            return $this->startSmsNotification($header,$headerbody,$paramer,$method);
        }
        /*
         * sendSms
         * return string '100001200501141210063648965551100001200501141210063648965551'
         */
        public function sendSms($header='',$headerbody,$paramer,$method='sendSms'){
            $result=$this->startSmsNotification($header,$headerbody,$paramer,$method);
            return $result;
        }
        /*
         * getSmsDeliveryStatus
         */
        public function getSmsDeliveryStatus($header='',$headerbody,$paramer,$method='sendSms'){
            $result=$this->startSmsNotification($header,$headerbody,$paramer,$method);
            return $this->response($result);
        }
        /**
         * @param $xml soap response
         * 处理server端返回的xml
         */
        public function response($xml){
            $json_arr=json_decode(json_encode($xml),true);
            return $json_arr;
        }        /**
         * 数组转换对象
         * @param $arr
         * @return object
         */
        public function arrayToobj($arr){
            if(!is_array($arr)) return $arr;
            foreach($arr as $key=>$val){
                if(is_array($val)){
                    $arr[$key]=$this->arrayToobj($val);
                }
            }
            return (object)$arr;
        }
    }
?>