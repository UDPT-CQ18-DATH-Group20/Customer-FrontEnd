<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class CartModel
{
    public $client;
    function __construct()
    {
        $this->client = new Client(["base_uri" => "http://host.docker.internal/api/cart"]);
    }
    public function createCart($token)
    {
        $headers = [
            "Authorization" => "Bearer " . $token
        ];
        try {
            $this->client->requestAsync("POST", "", ["headers" => $headers])->wait();
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
