<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class ProductModel
{
    public $client;

    function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://host.docker.internal']);
    }
    public function getProductById($id)
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $request = new Request('GET', '/api/goods/' . $id, $headers);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }

    public function addToCart($id, $token)
    {
        $headers = [
            "Authorization" => "Bearer " . $token
        ];
        $quantity = $_POST["quantity"];
        $promise =
            $this->client->requestAsync(
                "POST",
                "/api/goods/cart/{$id}",
                ["headers" => $headers, "query" => ["quantity" => $quantity]]
            );

        $response = $promise->wait();
        if ($response->getStatusCode() === 200) {
            return true;
        } else {
            return false;
        }
    }
}
