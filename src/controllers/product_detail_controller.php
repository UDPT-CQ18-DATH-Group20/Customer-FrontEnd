<?php require(CONTROLLER_PATH . "base_controller.php");

class ProductDetailController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'product-detail';
    }
    public function model($model){
        require_once MODEL_PATH.$model.".php";
        return new $model;
    }
    public function index()
    {
        $id = $_GET['id'];
        $productDetailModel = $this->model("ProductDetailModel");
        $result = $productDetailModel->getProductById($id);
        $product = $result->getBody()->getContents(); 
        $this->render('index', ["product"=> json_decode($product)]);
    }
}
