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
        setlocale(LC_MONETARY,"en_US");
        $id = $_GET['id'];
        $productDetailModel = $this->model("ProductDetailModel");
        $result = $productDetailModel->getProductById($id);
        $product = json_decode($result->getBody()->getContents());
        $this->render('index', ["product"=> $product]);
    }

    
}