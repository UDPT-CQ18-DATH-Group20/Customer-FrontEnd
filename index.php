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
    'account' => array('index', 'login', 'register', 'sign-in', 'sign-up', 'logout'),
    'shopping' => array("index", "search", "test"),
    'product' => array('index', "add-to-cart"),
    'business' => array('index',"register", "loadProfiles", "loadProfileDetail"),
    'cart' => array('index', 'remove-item', "update-item"),
    'order' => array('checkOut', 'createOrder', 'loadOrdersOfCustomer', 'loadOrdersOfStore', 'updateOrderStatus', 'loadReadyToDelivery'),
    'manager' => array('index','reply-comment','manager-product','create-product')
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    redirect_to(ERROR_URI);
}

require(CONTROLLER_PATH . "{$controller}_controller.php");

$_class = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$method = str_replace('-', '', lcfirst((ucwords($action, '-'))));
$controller = new $_class;
$controller->$method();
