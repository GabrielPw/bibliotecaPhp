<?php

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {


        case '/':
            require 'view/index.php';
            break;

        case '/home':
            require 'view/home.php';
            break;

        case '/views/authors':
            require __DIR__ . 'view/authors.php';
            break;

        case '/about':
            require __DIR__ . 'view/aboutus.php';
            break;
        case '/login':
            require 'config/login.php';
            break;
        default:
            http_response_code(404);
            require 'view/404.php';
            break;
    }
?>