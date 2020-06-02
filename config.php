<?php
//Validamos que se inicie sesión de PHP
if ( strlen(session_id()) < 1){ //strlen = string lenght
    //Si no hay sesión, se inicializa
    session_start();
}
//Definimos variables globlales
define('LIBS', 'libs/');
define('TEMPLATE', 'templates/ceduc2020');
define ('URL', 'http://192.168.200.100/ceduc_web/');
