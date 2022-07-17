<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Utils;

class BusinessModel{
    public $client;

    function __construct(){
        $this->client = new Client(['base_uri' => 'http://localhost:3004']);
    }

    public function createProfile($options)
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];
        try {
            $request = new Request('POST', '/api/business/profile');
            $res = $this->client->sendAsync($request,$options)->wait();
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

    public function getProfiles()
    {
        //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $query = '{
            "user_id": "62b372e1b09d4b627c7442d7"
        }';
        $request = new Request('GET', '/api/business/profile', $headers, $query);
        $res = $this->client->sendAsync($request)->wait();
        $data = $res->getBody()->getContents();

        return $data;
        //print_r($data);
        //$this->render('checkOut', ["cart" => json_decode($data)]);
    }
}
