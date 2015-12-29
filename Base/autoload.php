<?php
/**
 * This is the autoload the file script
 */
spl_autoload_register(function($file) {
    if(strstr('Controller',$file)) {
        $file = BASE_PATH.$file;
        if(file_exists($file)) {
            include_once $file;
        } else {
            throw new Exception('找不到'.$file);
        }
    }
});