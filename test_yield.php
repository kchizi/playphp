<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/5/13/10:11
 * Filename: test_yield.php
 */

    function xrange($start,$limit,$step){
        for($i=$start;$i<$limit;$i+=$step){
            yield $i;
        }
    }
    foreach(range(0,900,1) as $num) {
        echo $num.'<br/>';
        echo memory_get_usage();
    }
//php iterator
?>