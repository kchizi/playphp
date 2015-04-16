<?php
    function autoReq($class){
        $arr = explode('\\',$class);
        $class = is_array($arr)?array_pop($arr):$class;
        if(substr($class,-5) == 'Model'){
           $path = W_PATH.'/model/';
        }else if(substr($class,-10) == 'Controller'){
            $path = W_PATH.'/controller/';
        }else{
            $path = W_PATH.'/common/';
        }
        if(file_exists($path.$class.'.class.php')){
            require $path.$class.'.class.php';
        }else{
            exit($path.$class.'.class.php is not exists!');
        }
    }
    spl_autoload_register('autoReq');
?>