<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Detalhes do Livro</title>
</head>
<body>
    <?php
        require_once 'config/config.php';
        require_once 'config/TokenVerifier.php';
        require_once 'model/Usuario.php';
        include 'menu-header.php';

        
        $token = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : null;
        if(!$token || !TokenVerifier::verifyRememberToken($db, $token)){
            echo 'Token de cookie inválido.';
            header('Location: /');
        }
    ?>
    <section class="section">
        <div class="container">
            <?php
                if (isset($_GET['book'])) {
                    $livroId = $_GET['book'];
                    $api_url = 'http://api-biblioteca-php.com:8080';
                    $response = file_get_contents($api_url . '/books/' . $livroId);
                    $livro = json_decode($response);
                }
            ?>

            <div class="columns">
                <div class="column is-one-quarter">
                    <figure class="image is-3by4">
                        <img src="<?php echo $livro->capa_imagem; ?>" alt="Capa do Livro">
                    </figure>
                    <p class="mt-3">Autor: <?php echo $livro->autor; ?></p>
                </div>
                <div class="column">
                    <p class="is-size-5"><?php echo $livro->sinopse; ?></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
