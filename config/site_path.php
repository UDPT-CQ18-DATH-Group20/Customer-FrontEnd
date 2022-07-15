<?php
define("HOME_URI", 'index.php?controller=home&action=index');
define("ERROR_URI", 'index.php?controller=error&action=index');
define("LOGIN_URI", 'index.php?controller=account&action=login');
define("REGISTER_URI", 'index.php?controller=account&action=register');
define("LOGOUT_URI", 'index.php?controller=account&action=logout');
define("SHOPPING_URI", "index.php?controller=shopping&action=search");
define("PRODUCT_URI", "index.php?controller=product&action=index");
define("ADD_TO_CART_URI", "index.php?controller=product&action=add-to-cart");
define("GET_CART_URI", "index.php?controller=cart&action=index");

define('PUBLIC_URI', 'public/');
define('STYLE_SHEET_URI', PUBLIC_URI . 'css/');
define('SCRIPT_URI', PUBLIC_URI . 'js/');
define('IMAGE_URI', PUBLIC_URI . 'images/');
