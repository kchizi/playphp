<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/6/5/14:41
 * Filename: xsdata.php
 */
    require './xunsearch/lib/XS.php';
    $data = array(
        'id' => 1, // 此字段为主键，必须指定
        'username' => '周杰伦',
        'intro' => '周杰伦参见第四季中国好声音！',
    );
    $xs = new XS('demo');
    // 创建文档对象
    $doc = new XSDocument;
    $doc->setFields($data);
    $index = $xs->index;
    $return = $index->add($doc);
    var_dump($return);
?>