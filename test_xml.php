<?php
$xml ='<?xml version="1.0" encoding="utf-8" ?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><soapenv:Body><soapenv:Fault><faultcode>SVC0905</faultcode><faultstring>OA 8 is invaild!</faultstring><detail><ns1:ServiceException xmlns:ns1="http://www.csapi.org/schema/parlayx/common/v2_1"><messageId>SVC0905</messageId><text>OA 8 is invaild!</text><variables>8</variables></ns1:ServiceException></detail></soapenv:Fault></soapenv:Body></soapenv:Envelope>';
$dom = new DomDocument;
 $dom->loadXML($xml);
 $params = $dom->getElementsByTagName('faultcode');
 print_r($params);
 foreach ($params as $key => $value) {
 	echo $value->nodeValue;
 }
?>