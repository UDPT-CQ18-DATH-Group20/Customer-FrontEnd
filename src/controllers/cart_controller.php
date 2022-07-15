<?php
require(CONTROLLER_PATH . "base_controller.php");
require(MODEL_PATH . "CartModel.php");

use GuzzleHttp\Exception\ClientException;

class CartController extends  BaseController
{
    public function __construct()
    {
        $this->folder = 'cart';
    }

    public function index()
    {
        $cartModel = new CartModel();
        $cart = $cartModel->getCart($_SESSION["token"]);

        $data = get_object_vars($cart);

        $this->render("index", $data);
    }
}
