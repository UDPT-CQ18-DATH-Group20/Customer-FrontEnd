<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class ProductDetailModel{
    public $client;

    function __construct(){
        $this->client = new Client(['base_uri' => 'http://localhost:3001']);
    }
    public function getProductById($id){
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $request = new Request('GET', '/api/goods/'.$id, $headers);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
}
?>