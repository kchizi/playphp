<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/8/3/14:37
 * Filename: wechat.php
 */
    $total_money = 100;
    $total_stu = 8;
    $min_money = 1;
    /**
     * 微信红包分配算法的分析与(js/php)实现
     * 1、保证其他人有红包可拿，第一个人红包金额范围为:1 --- 100-7*1
     * 2、第二个人红包范围是，100-第一个人红包-6*1
     * 3、第三个人红包范围，100-第一个人红包-第二个人红包-5*1
     * ......
     * 最后一个人获得剩余金额
    */
    function luckyMoney($total_money,$total_stu,$min_money=1){
        $money_array = array();
        for($i=1;$i<=$total_stu;$i++){
            if($i != $total_stu){
                $surplus = $total_money-array_sum($money_array)-($total_stu-$i)*$min_money;
                $surplus = ceil($surplus/($total_stu-$i));
                $money_array[$i] = mt_rand($min_money,$surplus);
            }else{
                //最后一个人
                $money_array[$i] = $total_money-array_sum($money_array);
            }
        }
        if(array_sum($money_array)==$total_money&&count($money_array)==$total_stu){
            return $money_array;
        }else{
            return -1;
        }
    }
    print_r(luckyMoney(60,8));
?> 