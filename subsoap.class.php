<?php
    Class subsoap{
        private $location;
        private $uri;
        public  $soap_client;
        public  $results;
        public function __construct($location,$uri=''){
            $this->location=$location;
            $this->uri=$uri;
        }
        /**
         * @param string $header array() 提供文档中soap的header、namespace、key
         * @param $headerbody array() 提供文档中的header验证信息
         * @param $location 提供请求的url
         * @param $paramer 文档 subscription 需要的参数数组
         */
        public function subscription($header='',$headerbody,$paramer,$method='subscribeProductRequest'){
            try{
                $this->soap_client=new SoapClient(null,array(
                    'location'=>$this->location,//请求url
                    'uri'=>$this->uri,//server命名空间
                    'trace'=>1
                ));
                if(!empty($header)){
                    $headerbody=$this->arrayToobj($headerbody);
                    $soap_var=new SoapVar($headerbody,SOAP_ENC_OBJECT,$header['uri']);
                    $soap_header = new SOAPHeader($header['namespace'],$header['uri'], $soap_var);
                    $this->soap_client->__setSoapHeaders(array($soap_header));
                }
                $bodyArr=array();
                foreach($paramer as $key => $val){
                        $parObj=$this->arrayToobj($val);
                        $soap_var_b=new SoapVar($parObj,SOAP_ENC_OBJECT,$key);
                        $lastPar=new SoapParam($soap_var_b,$key);
                        array_push($bodyArr,$lastPar);
                }
                $result=$this->soap_client->__soapCall($method,$bodyArr,array('soapaction'=>'','uri'=>$this->uri));
                $this->results=$this->response($result);
                return $this->results;
            }catch (Exception $e){
                echo 'subscription异常,message:'.$e->getMessage();
            }
        }
        /*
         * unsubscription
         */
        public function unsubscription($header='',$headerbody,$paramer,$method='unsubscribeProduct'){
            return $this->subscription($header,$headerbody,$paramer,$method);
        }
        /*
        * getSubscriptionList
        */
        public function getSubscriptionList($header='',$headerbody,$paramer,$method='unsubscribeProduct'){
            return $this->subscription($header,$headerbody,$paramer,$method);
        }
        /**
         * @param $xml soap response
         * 处理server端返回的xml
         * @return array('result'=>状态码，'description'描述信息)
         */
        public function response($xml){
            $responseCode=array(
                '10001211'=>'The field in the request is incorrect.',
                '10001318'=>'An internal error occurs in the SDP: message fails to be sent between internal components.',
                '10002035'=>'An internal error occurs in the SDP: internal component process times out.',
                '22007006'=>'The version number is incorrect. A version number must contain 1 to 5 bytes.',
                '22007007'=>'The message ID is incorrect. A message ID must contain 1 to 40 bytes.',
                '22007008'=>'The user does not exist.',
                '22007013'=>'The fee deduction parameter is incorrect.',
                '22007014'=>'The user ID is invalid.',
                '22007034'=>'The user ID is invalid.',
                '22007038'=>' The user has no permission to subscribe to this product because the product is a gift product.',
                '22007044'=>' Notification of subscription relationships fails.',
                '22007053'=>'Configuration of this user is not found in the SDP system.',
                '22007071'=>'Subnet information cannot be found.',
                '22007201'=>'The product has been subscribed to.',
                '22007203'=>'The product does not exist.',
                '22007206'=>'The product is not in the validity period. The product may have expired or have not taken effect.',
                '22007208'=>'On-demand products cannot be subscribed to.',
                '22007210'=>'The user status is abnormal, that is, it is not defined in the system.',
                '22007211'=>'The user has been deregistered.',
                '22007220'=>'The notification fails to be sent to the SP.',
                '22007225'=>'The user is bonus points is insufficient for the subscription. ',
                '22007227'=>'The product does not support bonus point payment.',
                '22007230'=>'The product cannot be subscribed to by a third party.',
                '22007233'=>'Subscription is being confirmed.',
                '22007238'=>'The subscription relationship already exists. The product cannot be subscribed to again.',
                '22007268'=>'The user is credibility is insufficient and the user cannot subscribe to the product. ',
                '22007301'=>'The user is suspended.',
                '22007303'=>'The user is paused.',
                '22007304'=>'The user is subscription capability is suspended and the user cannot subscribe to the product.',
                '22007306'=>'The user is blacklisted and cannot subscribe to the product.',
                '22007322'=>'The promotional product fails to be subscribed to in the non-promotion period.',
                '22007330'=>'The account balance is insufficient.',
                '22007331'=>'The charged number is incorrect.',
                '22007332'=>'The external system charging times out.',
                '22007333'=>'Other errors occur during charging in the SDP.',
                '22007334'=>'The user information response from an external system times out. ',
                '22007363'=>'The user is graylisted and cannot subscribe to the product.',
                '22007505'=>'The channel is invalid. The value range of ChannelID in the request is invalid.',
                '22007629'=>'The user is locked.',
                '22007999'=>'Failure due to other causes.',
                '22999998'=>'The service returned by the external charging system is unavailable.',
                '22999999'=>'External system error.',
                'other'=>'An internal error occurs in the SDP.'
            );
            $json_arr=json_decode(json_encode($xml),true);
            $key=$json_arr['result'];
            $json_arr['errorCode']=($responseCode[$key])?$responseCode[$key]:$responseCode['other'];
            return $json_arr;
        }
        /**
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