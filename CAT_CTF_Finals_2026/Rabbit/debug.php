<?php

stream_wrapper_unregister('php');

function waf($file) {

    $parsed = parse_url($file);
    echo "var dump for paresed\n"; 
    var_dump($parsed);
    $path = $parsed['path'];

    if(!empty($path)){
        $realpath = realpath($path);
        echo "var dump for realpath\n"; 
        var_dump($realpath);
        if ( strstr($realpath, "flag") || strstr($file, ".") ) {
            return true; 
        }
        return false; 
    }
return true; 

}

$file = $argv[1];

if(!empty($file)){

    if(waf($file) !== false){
        echo "Restricted Access";
    }
    else{
        echo file_get_contents($file);
    }
}


?>
