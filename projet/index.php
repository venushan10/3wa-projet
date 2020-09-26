<?php

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]" ));

define('URL_PUBLIC', URL.'public/');


// CHARGEMENT AUTOMATIQUE DES CLASSES
spl_autoload_register(function($class) {
    $file = 'app/'.$class.'.php';
    if(file_exists($file)) {
        require_once($file);;
    }
});




$router = new Router;
$router->routeReq();
