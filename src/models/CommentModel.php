<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class CommentModel
{
    public $client;

    function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://host.docker.internal:3005']);
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
}