<?php
require 'config.php';

spl_autoload_register('Preload::init');

class Preload {
    static function init($class){
        ini_set("register_global", "1");
        date_default_timezone_set("America/Santiago");
        if(stripos($class, "_") != ""){
            $class = str_replace("_", "/", $class);
        }

        $file = LIBS . $class .".php";

        if (file_exists($file)) {
            include $file;
        }
    }
}
$bootstrap = new Bootstrap();
$bootstrap->init();