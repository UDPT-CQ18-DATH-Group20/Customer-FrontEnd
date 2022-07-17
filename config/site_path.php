<?php
define("HOME_URI", 'index.php?controller=home&action=index');
define("ERROR_URI", 'index.php?controller=error&action=index');
define("LOGIN_URI", 'index.php?controller=account&action=login');
define("REGISTER_URI", 'index.php?controller=account&action=register');
define("LOGOUT_URI", 'index.php?controller=account&action=logout');
define("SHOPPING_URI", "index.php?controller=shopping&action=search");
define("PRODUCT_URI", "index.php?controller=product&action=index");
define("BUSINESS_URI", "index.php?controller=business&action=index");
define("ADD_TO_CART_URI", "index.php?controller=product&action=add-to-cart");
define("GET_CART_URI", "index.php?controller=cart&action=index");
define("CHECK_OUT_URI", "index.php?controller=order&action=checkOut");
define("STORE_COMMENT_URI", "index.php?controller=manager&action=index");
define("STORE_REPLY_COMMENT_URI", "index.php?controller=manager&action=reply-comment");
define("STORE_PRODUCT_URI", "index.php?controller=manager&action=manager-product");
define("STORE_CREATE_PRODUCT_URI", "index.php?controller=manager&action=create-product");
define("DELIVERY_URI", "index.php?controller=order&action=loadReadyToDelivery");
define("STORE_ORDER_URI", "index.php?controller=order&action=loadOrdersOfStore");
// define("STORE_CREATE_PRODUCT_URI", "index.php?controller=manager&action=create-product");
// define("STORE_CREATE_PRODUCT_URI", "index.php?controller=manager&action=create-product");


define('PUBLIC_URI', 'public/');
define('STYLE_SHEET_URI', PUBLIC_URI . 'css/');
define('SCRIPT_URI', PUBLIC_URI . 'js/');
define('IMAGE_URI', PUBLIC_URI . 'images/');
