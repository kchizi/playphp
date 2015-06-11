<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/3/11:12
 * Filename: xunsearch.php
 */
    require './xunsearch/lib/XS.php';
    $xs = new XS('demo');
    $search = $xs->search;
    $index = $xs->index;
    $res = $search->search('中国好声音');
    $count = $search->count('中国好声音');
    echo '<pre/>';
    print_r($count);
    print_r($res);
?>