<?php
session_start();
require 'vendor/autoload.php';

require('./config/file_path.php');
require(CONFIG_PATH . 'site_path.php');
require(LIB_PATH . 'helpers.php');

if (isset($_GET["controller"])) {
    $controller = $_GET["controller"];
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } else $action = "index";
} else {
    redirect_to(HOME_URI);
}


$controllers = array(
    'home' => array('index'),
    'account' => array('index','login','register','sign-in','sign-up','logout'),
    'product_detail' => array( 'index' )
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    redirect_to(ERROR_URI);
}

require(CONTROLLER_PATH . "{$controller}_controller.php");

$_class = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$method = str_replace('-', '', lcfirst((ucwords($action, '-'))));
$controller = new $_class;
$controller->$method();
