<?php require(CONTROLLER_PATH . "base_controller.php");
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Exception\ClientException;
class ManagerController extends  BaseController
{
    public function __construct()
    {
        $this->folder = 'seller_manager';
    }
    public function checkCustomRequireLogin()
    {
        $modelAccount = $this->model("AccountModel");
        if (!$modelAccount->isUserLogin()) {
            header('Location: ' . LOGIN_URI);
        }
    }
    public function render($view, $data)
    {
        $view_file = VIEW_PATH . $this->folder . '/' . $view . '.php';
        $template = 'index';
        if (isset($data->template)) {
            $template = $data->template;
        }
        if (is_file($view_file)) {
            if (!is_null($data))
                extract($data);
            require_once(TEMPLATE_PATH . $template . '.phtml');
        } else {
            redirect_to(ERROR_URI);
        }
    }
    public function model($model)
    {
        require_once MODEL_PATH . $model . ".php";
        return new $model;
    }
    public function index()
    {   
        $this->checkCustomRequireLogin();
        $modelComment = $this->model("CommentModel");
        $comments = $modelComment->getCommentByStore()->getBody()->getContents();
        $this->render('store-comment',["template"=>"teamplate_store", "comments"=> json_decode($comments)]);
    }
    public function replyComment()
    {
        $this->checkCustomRequireLogin();
        if (is_post_request()){
            $comment_id=$_POST["comment_id"];
            $reply=$_POST["reply"];
            $modelComment = $this->model("CommentModel");
            $comments = $modelComment->replyComment($comment_id,$reply)->getBody()->getContents();
            header('Location: ' . STORE_COMMENT_URI);
        }
        
    }
    public function managerProduct()
    { 
        $goodsTypeModel = $this->model("GoodsTypeModel");
        $types = $goodsTypeModel->getTypes()->getBody()->getContents();
        $products = $goodsTypeModel->getProducts()->getBody()->getContents();
        $this->render('store-product',[
            "template"=>"teamplate_store", 
            "types"=>json_decode($types),
            "products"=>json_decode($products)
        ]);

    }
    public function createProduct()
    {
        $this->checkCustomRequireLogin();
        if (is_post_request()){
            $token = $_SESSION["token"];
            $headers = [
                "Authorization" => "Bearer " . $token
            ];
            
            $options = [
                'headers'=> $headers,
                'multipart' => [
                  [
                    'name' => 'name',
                    'contents' => $_POST['name']
                  ],
                  [
                    'name' => 'type',
                    'contents' => $_POST['type']
                  ],
                  [
                    'name' => 'price',
                    'contents' => $_POST['price']
                  ],
                  [
                    'name' => 'remains',
                    'contents' => $_POST['remains']
                  ],
                  [
                    'name' => 'picture',
                    'contents' => Utils::tryFopen($_FILES['picture']['tmp_name'],'r'),
                    'filename' => $_FILES['picture']['name'],
                    'headers' => array('Content-Type' => mime_content_type($_FILES['picture']['tmp_name']))   
                  ]
                ]
            ];
            $goodsTypeModel = $this->model("GoodsTypeModel");
            $result =  $goodsTypeModel->createGoods($options)->getBody()->getContents();
            print_r($result);
        }
    }
    // public function reArrayFiles(&$file_post) {

    //     $file_ary = array();
    //     $file_count = count($file_post['name']);
    //     $file_keys = array_keys($file_post);
    
    //     for ($i=0; $i<$file_count; $i++) {
    //         foreach ($file_keys as $key) {
    //             $file_ary[$i][$key] = $file_post[$key][$i];
    //         }
    //     }
    
    //     return $file_ary;
    // }

    // function register()
    // {
    //     if (is_post_request()){
    //         $file_ary = $this->reArrayFiles($_FILES['licenses']);
    //         $options = [
    //             'multipart' => [
    //               [
    //                 'name' => 'name',
    //                 'contents' => $_POST['name']
    //               ],
    //               [
    //                 'name' => 'email',
    //                 'contents' => $_POST['email']
    //               ],
    //               [
    //                 'name' => 'address',
    //                 'contents' => $_POST['address']
    //               ],
    //               [
    //                 'name' => 'phone',
    //                 'contents' => $_POST['phone']
    //               ],
    //               [
    //                 'name' => 'receptionist_name',
    //                 'contents' => $_POST['receptionist_name']
    //               ],
                 
    //               [
    //                 'name' => 'opening_time',
    //                 'contents' => $_POST['opening_time']
    //               ],
    //               [
    //                 'name' => 'closing_time',
    //                 'contents' => $_POST['closing_time']
    //               ],
    //               [
    //                 'name' => 'established_date',
    //                 'contents' => $_POST['established_date']
    //               ]

    //         ]];
    //         array_push($options['multipart'], [
    //             'name' => 'goods_type',
    //             'contents' => json_encode(explode(",",str_replace(' ', '', strtoupper($_POST['goods_type']))))
    //         ]);
            
    //         foreach ($file_ary as $file) {
    //             array_push($options['multipart'],[
    //                 'name' => 'licenses',
    //                 'contents' => Utils::tryFopen($file['tmp_name'],'r'),
    //                 'filename' => $file['name'],
    //                 'headers' => array('Content-Type' => mime_content_type($file['tmp_name']))
                    
    //               ]);
    //         }
    //         array_push($options['multipart'],[
    //             'name' => 'logo',
    //             'contents' => Utils::tryFopen($_FILES['logo']['tmp_name'],'r'),
    //             'filename' => $_FILES['logo']['name'],
    //             'headers'  => array('Content-Type' => mime_content_type($file['tmp_name']))
                
    //         ]);
    //         $productDetailModel = $this->model("ProfileModel");
    //         $result =  $productDetailModel->createProfile($options)->getBody()->getContents();
    //         print_r($result);
    //     }
    // }
}