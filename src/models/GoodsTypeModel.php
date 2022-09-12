<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class GoodsTypeModel
{
    public $client;
    function __construct()
    {
        $this->client = new Client(["base_uri" => "http://host.docker.internal"]);
    }
    public function getTypes()
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];
        try {
            return $this->client->requestAsync("GET", "/api/goods/type", ["headers" => $headers])->wait();
        } catch (ClientException  $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                echo "{$response->getStatusCode()}: {$response->getReasonPhrase()}";
                http_response_code($response->getStatusCode);
                die();
            }
        }
    }
    public function getProducts()
    {
        $token = $_SESSION['token'];
        $headers = [
            'Content-Type' => 'application/json',
            "Authorization" => "Bearer " . $token
        ];
        try {
            return $this->client->requestAsync("GET", "/api/store/goods", ["headers" => $headers])->wait();
        } catch (ClientException  $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                echo "{$response->getStatusCode()}: {$response->getReasonPhrase()}";
                http_response_code($response->getStatusCode);
                die();
            }
        }
    }
    public function createGoods($options)
    {

        try {
            $request = new Request('POST', '/api/store/create/goods');
            $res = $this->client->sendAsync($request, $options)->wait();
            return $res;
        } catch (ClientException  $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                echo "{$response->getStatusCode()}: {$response->getReasonPhrase()}";
                http_response_code($response->getStatusCode);
                die();
            }
        }
    }
}
