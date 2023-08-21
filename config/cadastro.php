<?php
    require_once 'config.php';
    require_once 'model/Usuario.php';
    // Autenticação
    if($_SERVER['REQUEST_METHOD'] == 'POST' AND $_SERVER['REQUEST_URI'] == '/cadastrar'){

        // Obter os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        // Crie um objeto de usuário e chame um método para cadastrar o usuário
        $user = new Usuario($db);
        $cadastroSucesso = $user->cadastrarUsuario($nome, $email, $endereco, $telefone, $senha);

        if ($cadastroSucesso) {
            // Cadastro bem-sucedido, você pode redirecionar ou retornar uma mensagem
            header('Location: /');
            exit();
        } else {
            // Erro no cadastro, redirecione ou mostre uma mensagem de erro
            header('Location: /cadastro?error');
            exit();
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Todos os campos do formulário são obrigatórios.']);
    }
    
?>