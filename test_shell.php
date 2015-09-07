<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/12/11:29
 * Filename: test_shell.php
 */
    $shell_php = system('/usr/bin/whereis php-cgi');
    var_dump($shell_php);
?> 