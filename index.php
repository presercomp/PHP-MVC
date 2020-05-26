<?php
require 'config.php';

spl_autoload_register(function($class){
    ini_set("register_global", "1");
    date_default_timezone_set("America/Santiago");
    if (strpos($class, "_") != "") {
        $class = str_replace("_", "/", $class);
    }
    require LIBS . "${class}.php";
});
$bootstrap = new Bootstrap();
$bootstrap->init();