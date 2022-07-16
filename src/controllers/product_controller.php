<?php require(CONTROLLER_PATH . "base_controller.php");

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'product';
    }
    public function model($model)
    {
        require_once MODEL_PATH . $model . ".php";
        return new $model;
    }
    public function index()
    {
        //product +store detial
        $id = $_GET['id'];
        $productDetailModel = $this->model("ProductModel");
        $result = $productDetailModel->getProductById($id);
        $product = $result->getBody()->getContents();
        //get comment
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $commentModel = $this->model("CommentModel");
        $comments = $commentModel->getCommentByProduct($id,$page)->getBody()->getContents();
        //render
        $this->render('index', ["product" => json_decode($product), "comments" => json_decode($comments)]);
    }
    public function addToCart()
    {
        if (is_post_request()) {
            if ($_SESSION["token"]) {
                // $uri = $_SERVER['REQUEST_URI'];
                // $paths = explode('/', $uri);
                // $id = $paths[sizeof($paths) - 2];
                $id = $_GET["id"];
                $token = $_SESSION["token"];
                $productModel = $this->model("ProductModel");
                $result = $productModel->addToCart($id, $token);

                redirect_to(PRODUCT_URI . "&id=" . $id);
            } else {
                $_SESSION["back-url"] = $_SERVER['HTTP_REFERER'];
                redirect_to(LOGIN_URI);
            }
        }
    }
}