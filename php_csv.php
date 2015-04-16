<?php
    $contents=file_get_contents('./msin.txt');
    $arr=array_unique(explode("|",$contents));
    $idArr=array_filter($arr,function($val){
       if($val){
           return true;}
    });
    echo '<pre/>';
    print_r($idArr);
    die;
    /*
    $i=0;
    $newStr='';
    while($i<count($idArr)){
        $newStr.=implode(',',array_slice($idArr,$i,100));
        $newStr.='|';
        $i+=100;
    }
    if(file_put_contents('./msin.txt',$newStr)){
        echo 'success';
    }
    */
//    echo $newStr;
?>