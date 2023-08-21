<?php
    require 'config/config.php';
    require 'model/Usuario.php';
    $request = $_SERVER['REQUEST_URI'];

    // Verifica se a URL contém parâmetros
    if (strpos($request, '?') !== false) {
        list($path, $query) = explode('?', $request, 2);
        parse_str($query, $params);
    } else {
        $path = $request;
        $params = array();
    }

    switch ($path) {

        case '/':
            $user = new Usuario($db);
            require $user->checkIfCookieIsValid()? 'view/home.php': 'view/index.php';
            break;

        case '/home':
            require 'view/home.php';
            break;

        case '/about':
            require __DIR__ . 'view/aboutus.php';
            break;
        case '/livro-detalhe':
            require 'view/detalheLivro.php';
            break;
        case '/cadastrar':
            require 'config/cadastro.php';
            break;
        case '/login':
            require 'config/login.php';
            break;
        case '/logout':
            doLogout();
            break;
        default:
            http_response_code(404);
            require 'view/404.php';
            break;
    }

    function doLogout(){
        setcookie('rememberme','', time() - 3600, '/');
        header('Location: /');
        exit();
    }
?>