<?php
/**
 * charge class for aoc
 * Class Aoccharge
 */
Class Aoccharge{
    public $error=array();
    public function __construct(){
    }
    /**
     * @param type $method 请求方式
     * @param type $url 地址
     * @param type $fields 附带参数，可以是数组，也可以是字符串
     * @param type $userAgent 浏览器UA
     * @param type $httpHeaders header头部，数组形式
     * @return boolean
     */
    protected function _curl($method, $url, $fields = '', $cookie='',$userAgent = '', $httpHeaders = '') {
        $ch = curl_init();
        if (false === $ch) {
            return false;
        }
        if (is_string($url) && strlen($url)) {
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            return false;
        }
        //是否显示头部信息
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $method = strtolower($method);
        if ('post' == $method) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }else{
            curl_setopt($ch,CURLOPT_HTTPGET,1);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); //设置curl超时秒数
        if(strlen($cookie)){
            curl_setopt($ch,CURLOPT_COOKIE,$cookie);
        }
        if (strlen($userAgent)) {
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        }
        if (is_array($httpHeaders)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeaders);
        }
        $ret = curl_exec($ch);
        if (curl_errno($ch)) {
            curl_close($ch);
            $this->error = array(curl_error($ch), curl_errno($ch));
            return false;
        } else {
            curl_close($ch);
            if (!is_string($ret) || !strlen($ret)) {
                $this->error = array('curl response is null!');
                return false;
            }
            return $ret;
        }
    }
    /**
     * GET
     * @param type $url 地址
     * @param type $userAgent 浏览器UA
     * @param type $httpHeaders header头部，数组形式
     * @param type $username 用户名
     * @param type $password 密码
     * @return boolean
     */
    public function get($url, $fields=array(),$cookie='',$userAgent = '', $httpHeaders = '') {
        if (is_array($fields)) {
            $sets = array();
            foreach ($fields AS $key => $val) {
                $sets[] = $key . '=' . urlencode($val);
            }
            $url .= '?'.implode('&', $sets);
        }
        $ret = $this->_curl('GET', $url, $cookie,$userAgent, $httpHeaders);
        if (false === $ret) {
            return false;
        }
        if (is_array($ret)) {
            return false;
        }
        return $ret;
    }
    /**
     * 发送POST请求
     * @param type $url 地址
     * @param type $fields 附带参数，可以是数组，也可以是字符串
     * @param type $userAgent 浏览器UA
     * @param type $httpHeaders header头部，数组形式
     * @param type $username 用户名
     * @param type $password 密码
     * @return boolean
     */
    public function post($url, $fields, $cookie='',$userAgent = '', $httpHeaders = '') {
        $ret = $this->_curl('POST', $url, $fields,$cookie,$userAgent, $httpHeaders);
        if (false === $ret) {
            return false;
        }
        if (is_array($ret)) {
            return false;
        }
        return $ret;
    }
}
?>