<?php
require(CONTROLLER_PATH . "base_controller.php");

class ShoppingController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'shopping';
    }

    public function index()
    {
        redirect_to(SHOPPING_URI);
    }

    public function search()
    {
        $this->render('search', null);
    }
}
