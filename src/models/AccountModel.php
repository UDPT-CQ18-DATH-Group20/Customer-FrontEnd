<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class AccountModel{
    public $client;

    function __construct(){
        $this->client = new Client(['base_uri' => 'http://host.docker.internal:3000']);
    }

    public function signUp(){
        $username=$_POST['username'];
		$password=$_POST['password'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $name=$_POST['name'];
        
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "username": "'.$username.'",
            "password": "'.$password.'",
            "phone": "'.$phone.'",
            "email": "'.$email.'",
            "name": "'.$name.'"
        }';
        $request = new Request('POST', '/users/signup', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
    public function signIn(){
        $username=$_POST['username'];
		$password=$_POST['password'];
        
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "username": "'.$username.'",
            "password": "'.$password.'"
        }';
        $request = new Request('POST', '/users/login', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
}
