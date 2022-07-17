<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class CommentModel
{
    public $client;

    function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://host.docker.internal']);
        
    }
    public function getCommentByProduct($goods_id,$page)
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "goods_id": "' . $goods_id . '",
            "page": "' . $page . '"
        }';
        $request = new Request('GET', '/api/comment', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
    public function getCommentByStore()
    {
        $token = $_SESSION["token"];
        $headers = [
            'Content-Type' => 'application/json',
            "Authorization" => "Bearer " . $token
        ];
        $request = new Request('GET', '/api/comment/store', $headers);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
    public function postComment($store_id,$page)
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "store_id": "' . $store_id . '",
            "page": "' . $page . '"
        }';
        $request = new Request('GET', '/api/comment', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
    public function replyComment($comment_id,$reply)
    {
        $token = $_SESSION["token"];
        $headers = [
            'Content-Type' => 'application/json',
            "Authorization" => "Bearer " . $token
        ];
        $body = '{
            "comment_id": "' . $comment_id . '",
            "reply": "' . $reply . '"
        }';
        $request = new Request('POST', '/api/comment/reply', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        return $res;
    }
}