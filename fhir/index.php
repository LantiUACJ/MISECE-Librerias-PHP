<?php
spl_autoload_register(function ($class_name) {
    if(strpos($class_name,"Modulo\\Resource\\")!==false){
        $real_class_name = str_replace("Modulo\\Resource\\","",$class_name);
        include "resource/". $real_class_name . ".php";
    }
    elseif(strpos($class_name,"Modulo\\Element\\")!==false){
        $real_class_name = str_replace("Modulo\\Element\\","",$class_name);
        include "element/". $real_class_name . ".php";
    }
    elseif(strpos($class_name,"Modulo\\Exception\\")!==false){
        $real_class_name = str_replace("Modulo\\Exception\\","",$class_name);
        include "exception/". $real_class_name . ".php";
    }
});

include "testing.php";