<?php
    // Autenticação
    if($_SERVER['REQUEST_METHOD'] == 'POST' AND $_SERVER['REQUEST_URI'] == '/login'){

        $token = '';
        define ('SECRET_KEY', 'SENHA_SUPER_SECRETA@!123', true);

        // Obter os dados JSON do corpo da solicitação
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);

        if(isset($data['email']) && isset($data['password'])){
            //var_dump("Está no IF: Email: " . $_POST['email'] . "- senha: " . $_POST['password']);
            $username = $data['email'];
            $password = $data['password'];

            $user = new Usuario($db);
            $isUserFound = $user->getByEmailAndPassword($username, $password);
        
            if($isUserFound != null){

                $token = 'Logado com sucesso.';
                $rememberToken = generateRandomToken();
                $user->storeOrUpdateRememberToken($isUserFound['id'], $rememberToken);

                $cookieData = $isUserFound['id'] . ':' . $rememberToken;
                $mac = hash_hmac('sha256', $cookieData, SECRET_KEY);
                $cookieData .= ':' . $mac;

                setcookie('rememberme', $cookieData, time() + (14 * 24 * 60 * 60), '/', '.biblioteca-php.com:8000/', false); // 2 semanas
            }else {
                header('HTTP/1.1 404 Not Found');
                $token = 'Credenciais inválidas.';
            }
            header('Content-Type: application/json');
            echo json_encode($token, JSON_UNESCAPED_UNICODE);
        } else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Campos de email e senha são obrigatórios.']);
        }
    }

    function generateRandomToken($lenght = 32){
        if(function_exists("random_bytes")){
            return bin2hex(random_bytes($lenght));
        } else if(function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($lenght));
        } else {
            throw new Exception("Unable to generate Random Token.");
        }
    }
?>