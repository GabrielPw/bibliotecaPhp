<?php
    require_once 'config.php';
    require_once 'model/Usuario.php';
    // Autenticação
    if($_SERVER['REQUEST_METHOD'] == 'POST' AND $_SERVER['REQUEST_URI'] == '/login'){

        define ('SECRET_KEY', 'SENHA_SUPER_SECRETA@!123', true);

        // Obter os dados do formulário
        $username = $_POST['email'];
        $password = $_POST['password'];

        $user = new Usuario($db);
        $isUserFound = $user->getByEmailAndPassword($username, $password);

        if($isUserFound != null){
            $rememberToken = generateRandomToken();
            $user->storeOrUpdateRememberToken($isUserFound['id'], $rememberToken);

            $cookieData = $isUserFound['id'] . ':' . $rememberToken;
            $mac = hash_hmac('sha256', $cookieData, SECRET_KEY);
            $cookieData .= ':' . $mac;

            setcookie('rememberme', $cookieData, time() + (14 * 24 * 60 * 60), '/'); // 2 semanas
            // Redirecionar para a rota /home
            header('Location: /home');
            exit();
        }else {

            // Credenciais inválidas
            header('Location: /?loginError');
            exit();
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Campos de email e senha são obrigatórios.']);
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
