<?php require(CONTROLLER_PATH . "base_controller.php");
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'order';
        $this->client = new Client(['base_uri' => 'http://localhost:3006']);
        //$this->client = new Client(['base_uri' => 'http://host.docker.internal']);
         $_SESSION['token'] = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MmIzNzJlMWIwOWQ0YjYyN2M3NDQyZDciLCJ1c2VyX3R5cGUiOjEsImFjY291bnRfaW5mbyI6IjYyYjM3MmUxYjA5ZDRiNjI3Yzc0NDJkNiIsImlhdCI6MTY1NjE0MTkzMX0.DuwmatBqWytxvo5G3EnVNC7hWtPCM58_1YewHVdy8HU';
    }
    public function render($view, $data=[])
    {
        $view_file = VIEW_PATH . $this->folder . '/' . $view . '.php';
        $template = 'index';
        if (isset($data->template)) {
            $template = $data->template;
        }
        if (is_file($view_file)) {
            if (!is_null($data))
                extract($data);
            require_once(TEMPLATE_PATH . $template . '.phtml');
        } else {
            redirect_to(ERROR_URI);
        }
    }
    public function model($model)
    {
        require_once MODEL_PATH . $model . ".php";
        return new $model;
    }
    public function checkOut()
    {
        //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $query = '{ }';
        $request = new Request('GET', '/cart', $headers, $query);
        $res = $this->client->sendAsync($request)->wait();
        $data = $res->getBody()->getContents();

        //print_r($data);
        $this->render('checkOut', ["cart" => json_decode($data)]);
    }

    public function createOrder()
    {
        //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $body = '{
            "receiver": "'.$_POST['receiver'].'",
            "phone": "'.$_POST['phone'].'",
            "email": "'.$_POST['email'].'",
            "address": "'.$_POST['address'].'"
        }';
        $request = new Request('POST', '/orders/create', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        //

        $data = $res->getBody()->getContents();
        $this->render('checkOut', ["response" => json_decode($data)]);
    }

    public function loadOrdersOfCustomer()
    {
        //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $query = '{ }';
        $request = new Request('GET', '/orders/customerOrders', $headers, $query);
        $res = $this->client->sendAsync($request)->wait();
        
        //xem lich su mua hang theo khach hang
        $data = $res->getBody()->getContents();
        //print_r($data);
        $this->render('customer', ["response" => json_decode($data)]);
    }

    public function loadOrdersOfStore()
    {
        //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $query = '{ }';
        $request = new Request('GET', '/orders/storeOrders', $headers, $query);
        $res = $this->client->sendAsync($request)->wait();
        $data = $res->getBody()->getContents();
        //get order theo của hàng cho tai khoan seller quan ly don hang
        //print_r($data);
        $this->render('store', ["template" => "dashboard", "response" => json_decode($data)]);
    }

    public function loadReadyToDelivery()
    {
        //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $query = '{ }';
        $request = new Request('GET', '/orders/readyOrders', $headers, $query);
        $res = $this->client->sendAsync($request)->wait();
        $data = $res->getBody()->getContents();
        //get order theo của hàng cho tai khoan seller quan ly don hang
        //print_r($data);
        $this->render('delivery', ["template" => "dashboard", "response" => json_decode($data)]);
    }

    public function updateOrderStatus()
    {
         //Send request to gateway
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $_SESSION['token']
        ];
        $body = '{
            "order_id": "'.$_POST['order_id'].'",
            "status": "'.$_POST['status'].'"
        }';

        //print_r($body);
        $request = new Request('POST', '/orders/update', $headers, $body);
        $res = $this->client->sendAsync($request)->wait();
        //

        if (strcmp($_POST['status'], 'In process') == 0 || strcmp($_POST['status'], 'Rejected') == 0
         || strcmp($_POST['status'], 'Ready to delivery') == 0) {
            redirect_to('index.php?controller=order&action=loadOrdersOfStore');
            return;
        }

        redirect_to('index.php?controller=order&action=loadReadyToDelivery');
    }
}
