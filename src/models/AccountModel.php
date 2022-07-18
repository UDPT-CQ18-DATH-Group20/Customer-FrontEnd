<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class AccountModel
{
    public $client;
    private $key= "secretKey";
    function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://host.docker.internal/api/']);
    }

    public function signUp()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "username": "' . $username . '",
            "password": "' . $password . '",
            "phone": "' . $phone . '",
            "email": "' . $email . '",
            "name": "' . $name . '"
        }';
        $request = new Request('POST', 'users/signup', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
    public function signIn()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "username": "' . $username . '",
            "password": "' . $password . '"
        }';
        $request = new Request('POST', 'users/login', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }

    public function isUserLogin()
    {
        return isset($_SESSION["token"]) ? true : false;
    }

    public function redirect(){
        if(isset($_SESSION["token"])){
            $token  = $_SESSION["token"];
            $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
            if($decoded->user_type == 1){
                redirect_to(HOME_URI);
            }
            if($decoded->user_type == 2){
                redirect_to(STORE_ORDER_URI);
            }
            if($decoded->user_type == 3){
                redirect_to(DELIVERY_URI);
            }
            if($decoded->user_type == 4){
                redirect_to(HOME_URI);
            }
        }
       
    }
}
