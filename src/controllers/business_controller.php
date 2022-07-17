<?php
require(CONTROLLER_PATH . "base_controller.php");
use GuzzleHttp\Psr7\Utils;

class BusinessController extends BaseController
{
    public function __construct()
    {
        //$_SESSION['token'] = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MmIzNzJlMWIwOWQ0YjYyN2M3NDQyZDciLCJ1c2VyX3R5cGUiOjEsImFjY291bnRfaW5mbyI6IjYyYjM3MmUxYjA5ZDRiNjI3Yzc0NDJkNiIsImlhdCI6MTY1NjE0MTkzMX0.DuwmatBqWytxvo5G3EnVNC7hWtPCM58_1YewHVdy8HU';
        $this->folder = 'business';
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
        //redirect_to("register-seller");
        $this->render('profile', [
            "template"=> "template_buiness"
        ]);
    }
    public function reArrayFiles(&$file_post) {
 
            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);
        
            for ($i=0; $i<$file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }
        
            return $file_ary;
          

    }

    public function loadProfiles()
    {
      $businessModel = $this->model("BusinessModel");
      $result = $businessModel->getValidatingProfiles();
        //redirect_to("register-seller");
        $this->render('profile', [
            "template"=> "template_buiness",
            "response"=> json_decode($result)
        ]);
    }

    public function register() 
    {
        if (is_get_request()){
            $this->render('register-seller', [
                "template"=> "template_buiness"
            ]);
        }
        if (is_post_request()){
            $file_ary = $this->reArrayFiles($_FILES['licenses']);
            $options = [
                'multipart' => [
                  [
                    'name' => 'username',
                    'contents' => $_POST['username']
                  ],
                  [
                    'name' => 'password',
                    'contents' => $_POST['password']
                  ],
                  [
                    'name' => 'name',
                    'contents' => $_POST['name']
                  ],
                  [
                    'name' => 'email',
                    'contents' => $_POST['email']
                  ],
                  [
                    'name' => 'address',
                    'contents' => $_POST['address']
                  ],
                  [
                    'name' => 'phone',
                    'contents' => $_POST['phone']
                  ],
                  [
                    'name' => 'receptionist_name',
                    'contents' => $_POST['receptionist_name']
                  ],
                 
                  [
                    'name' => 'opening_time',
                    'contents' => $_POST['opening_time']
                  ],
                  [
                    'name' => 'closing_time',
                    'contents' => $_POST['closing_time']
                  ],
                  [
                    'name' => 'established_date',
                    'contents' => $_POST['established_date']
                  ]

            ]];
            array_push($options['multipart'], [
                'name' => 'goods_type',
                'contents' => $_POST['goods_type']
            ]);
            
            foreach ($file_ary as $file) {
                array_push($options['multipart'],[
                    'name' => 'licenses',
                    'contents' => Utils::tryFopen($file['tmp_name'],'r'),
                    'filename' => $file['name'],
                    'headers' => array('Content-Type' => mime_content_type($file['tmp_name']))
                    
                  ]);
            }
            array_push($options['multipart'],[
                'name' => 'logo',
                'contents' => Utils::tryFopen($_FILES['logo']['tmp_name'],'r'),
                'filename' => $_FILES['logo']['name'],
                'headers'  => array('Content-Type' => mime_content_type($file['tmp_name']))
                
            ]);
            $businessModel = $this->model("BusinessModel");
            $result =  $businessModel->createProfile($options)->getBody()->getContents();
            print_r($result);
        }
    }

    
}
