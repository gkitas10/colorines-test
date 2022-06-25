<?php
$__url=explode("/", $_SERVER['REQUEST_URI']);

if(isset($__url[2]) && isset($__url[3])) {
    $__controller = ucwords($__url[2]) . 'Controller';
    $__method = explode("?", $__url[3])[0];
}else {
    $__controller = 'LoginController';
    $__method = 'index';
}

require_once 'controllers/' . $__controller . '.php';
$__objController = new $__controller();
$__objController->$__method();
?>