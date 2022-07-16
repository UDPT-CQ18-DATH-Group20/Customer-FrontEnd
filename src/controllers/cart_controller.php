<?php
require(CONTROLLER_PATH . "base_controller.php");
require(MODEL_PATH . "CartModel.php");

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

    public function removeItem()
    {
        $good_id = $_GET["good_id"];
        $cartModel = new CartModel();
        $result = $cartModel->removeItem($_SESSION["token"], $good_id);
        $result = json_encode($result);

        print_r($result);
    }

    public function updateItem()
    {
        $good_id = $_GET["good_id"];
        $quantity = $_GET["quantity"];
        $cartModel = new CartModel();
        $result = $cartModel->updateItem($_SESSION["token"], $good_id, $quantity);
        $result = json_encode($result);

        print_r($result);
    }
}
