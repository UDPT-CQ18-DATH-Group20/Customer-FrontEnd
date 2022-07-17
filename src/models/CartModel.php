<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class CartModel
{
    public $client;
    function __construct()
    {
        $this->client = new Client(["base_uri" => "http://host.docker.internal:3002/api/cart/"]);
    }

    public function getCart($token)
    {
        $headers = [
            "Authorization" => "Bearer " . $token
        ];

        try {
            $res = $this->client->requestAsync("GET", "", ["headers" => $headers])->wait();
        } catch (ClientException  $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                echo "{$response->getStatusCode()}: {$response->getReasonPhrase()}";
                http_response_code($response->getStatusCode);
                die();
            }
        }
        $content = $res->getBody()->getContents();
        $cart = json_decode($content);
        return $cart;
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
                echo "{$response->getStatusCode()}: {$response->getReasonPhrase()})";
                http_response_code($response->getStatusCode);
                die();
            }
        }
    }

    public function removeItem($token, $good_id)
    {
        $headers = [
            "Authorization" => "Bearer " . $token
        ];
        try {
            $res = $this->client->request("DELETE", "items/" . $good_id, ["headers" => $headers]);
            $result = $res->getBody()->getContents();
            return ["status" => $res->getStatusCode(), "message" => $result];
        } catch (ClientException  $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
            }
            echo "{$response->getStatusCode()}: {$response->getReasonPhrase()}";
            http_response_code($response->getStatusCode);
            die();
        }
    }

    public function updateItem($token, $good_id, $quantity)
    {
        $headers = [
            "Authorization" => "Bearer " . $token
        ];
        try {
            $res = $this->client->request("PATCH", "items/" . $good_id . "?quantity=" . $quantity, ["headers" => $headers]);
            $result = $res->getBody()->getContents();
            return ["status" => $res->getStatusCode(), "message" => $result];
        } catch (ClientException  $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
            }
            echo "{$response->getStatusCode()}: {$response->getReasonPhrase()}";
            http_response_code($response->getStatusCode);
            die();
        }
    }
}
