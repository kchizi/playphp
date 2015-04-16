<?php
    /*验证微信接口*/
   define('CODE','weixin');
    Class wxInterface{
        public function __construct(){
            //微信微信加密签名
            $signature=$_GET['signature'];
            //微信时间戳
            $timestamp=$_GET['timestamp'];
            //微信随机数
            $nonce=$_GET['nonce'];
            //手动设置识别码
            $token="02a2dfc41df8168a8000c481af9f939f";
            //将token、timestamp、nonce三个参数进行字典序排序并对字符串年进行加密
            $xyarr=array($token,$timestamp,$nonce);
            sort($xyarr);
            $xystr=sha1(implode($xyarr));
            if($xystr==$signature){
                echo $_GET['echostr'];
            }else{
                exit('非法验证！');
            }
        }
    }
    $wx=new wxInterface();
?>