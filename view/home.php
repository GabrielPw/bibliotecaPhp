<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <title>Biblioteca PhP</title>
</head>

<body>

    

<?php
    require_once 'config/config.php';
    require_once 'model/Usuario.php';
    include 'model/Livro.php';
    define ('SECRET_KEY', 'SENHA_SUPER_SECRETA@!123', true);

    $user = new Usuario($db);

    // Verifica se cookie rememberme existe.
    if (isset($_COOKIE['rememberme'])) {
        list($userId, $token, $mac) = explode(':', $_COOKIE['rememberme']);
        $expectedMac = hash_hmac('sha256', $userId . ':' . $token, SECRET_KEY);
        
        // verifica validade do token.
        if (hash_equals($expectedMac, $mac)) {
            $storedToken = $user->getRememberToken($userId);
            if (hash_equals($storedToken, $token)) {
                
                // token está válido.
                $api_url = 'http://api-biblioteca-php.com:8080';
                $response = file_get_contents($api_url . '/books/getAll');
                $livros = json_decode($response);

                include 'menu-header.php';
                include 'carrosel.php';
    
                ?>
                <div class="container">
                <h1 class="title mt-6 is-size-1">Biblioteca de livros <i class="fa-solid fa-book"></i></h1>
                <h2 class="subtitle is-size-2 bg-custom">Nosso Acervo</h2>

                <?php
                include 'livroSearchFields.php';
            } else {
                echo 'Token de cookie inválido.';
                header('Location: /');
                exit();
            }
        } else {
            echo 'MAC de cookie inválido.';
            header('Location: /');
            exit();
        }
    }else{
        // Cookie com token não encontrado.
        echo 'Cookie com token não encontrado.';
        ?><script>window.location.href='/';</script><?php
        exit();
    }
    
    
    $cols = 4;
    $total_livros = count($livros);
    $rows = ceil($total_livros / $cols);
    $livro_index = 0;

    for ($i = 0; $i < $rows; $i++) {
        echo '<div class="columns">';
        for ($j = 0; $j < $cols; $j++) {
            if($livro_index < $total_livros){
                $livro = $livros[$livro_index];
?>
                <!-- Seu código HTML dos cards aqui -->
                <div class="column is-3 card-container">
                    <!-- Conteúdo do card -->
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-1by1">
                                <img src="<?php echo "$livro->capa_imagem"; ?>" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="<?php echo "$livro->url_foto_autor"; ?>" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4"><?php echo "$livro->nome"; ?></p>
                                    <p class="subtitle is-6"><?php echo "$livro->autor"; ?></p>
                                </div>
                            </div>

                            <div class="content">
                                <?php echo substr($livro->sinopse, 0, 150)?>
                                <a href="#"> - Ler Mais...</a>
                                <br>
                                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    </div>
                </div>
<?php
                $livro_index++;
            } else {
                // Adicionar coluna em branco para preencher o espaço
                echo '<div class="column is-3"></div>';
            }
        }   
        echo '</div>';
    }
?>


        
    </div>
    <script src="biblioteca_php/script.js"></script>

</body>

</html>