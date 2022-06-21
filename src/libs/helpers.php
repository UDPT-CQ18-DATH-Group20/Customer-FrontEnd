<?php

function is_post_request()
{
    return strtoupper($_SERVER["REQUEST_METHOD"]) === 'POST';
}

function is_get_request()
{
    return strtoupper($_SERVER["REQUEST_METHOD"] === 'GET');
}

function error_class($errors, $field)
{
    return isset($errors[$field]) ? 'error' : '';
}

function redirect_to($url)
{
    header('Location: ' . $url);
    die;
}
