<?php

    spl_autoload_register(function($classAdd){
        $filename = "class".DIRECTORY_SEPARATOR.$classAdd.".php";
            if (file_exists($filename)){
                require_once($filename);
            }
    });

?>