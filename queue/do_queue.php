<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/9/17:56
 * Filename: do_queue.php
 */
    $task = '/var/www/html/playphp/index.php';
    $param = array(
        'username' => 'zhiqiang.cao',
        'status' => 1,
        'info' => array(
            'age' => 18,
            'label' => 'php,javascript'
        )
    );
    $param_str = serialize($param);
    echo $param_str;
//    echo escapeshellarg($task);
    echo escapeshellarg($param_str);
?> 