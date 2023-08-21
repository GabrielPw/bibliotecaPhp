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
        if($token == null || !TokenVerifier::verifyRememberToken($db, $token)){
            echo 'Token de cookie inválido.';
            ?><script>window.location.href='/'</script><?php
        }
    ?>
    
    <section class="section">
        <?php include 'livroSearchFields.php'; ?>
        <div class="container container-detalhe-livro">
            <hr>
            <?php

                if (isset($_GET['book'])) {
                    $livroId = $_GET['book'];
                    $api_url = 'http://api-biblioteca-php.com:8080';
                    $response = file_get_contents($api_url . '/books/' . $livroId);
                    $livro = json_decode($response);

                    if(property_exists($livro, "message") || $livro == null){
                        echo 'Não encontrado.';
                        ?><script>window.location.href='/'</script><?php
                        exit;
                    }
                }
            ?>

            <div class="columns">
                <div class="column is-one-quarter">
                    <figure class="image is-3by4">
                        <img src="<?php echo $livro->capa_imagem; ?>" style="border-radius: 10px;" alt="Capa do Livro">
                    </figure>
                    <p class="mt-2" style="text-align: center; text-decoration: underline; font-weight: 600;">Autor</span>
                    <p class="mt-2" style="text-align: center;"><?php echo $livro->autor; ?></p>
                </div>
                <div class="column info-book">
                    <h3 class="subtitle is-size-2" style=" left: 18%; position: relative;">Sobre a obra.</h3>
                    <p class="is-size-5" style="max-width: 65%; left: 18%; position: relative;"><?php echo $livro->sinopse; ?></p>
                    <hr style="max-width: 65%; left: 18%; position: relative;">
                    <h3 class="subtitle is-size-4 pt-4" style="left: 18%; position: relative;"><span class="bg-custom">Livro disponível na amazon: </span> <a href="https://www.amazon.com.br/revolu%C3%A7%C3%A3o-dos-bichos-conto-fadas/dp/8535909559/ref=sr_1_4?keywords=george+orwell&s=books&sr=1-4"> Amazon</a></h3>
                </div>
            </div>
            <hr>
            <div class="columns next-book">
                <div class="column is-one-quarter"></div>
                <div class="column">
                    <div class="columns" style="left: 18%; position: relative; margin-top:10px;">
                        <div class="column"><a href="" class="column-btn-next">< Anterior</a></div>
                        <div class="column"><a href="" class="column-btn-next">Próximo ></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<style>
    .bg-custom{
        background: orange;
        width: fit-content;
        padding-right: 4px;
        padding-left: 8px;
        transform: skew(-20deg); /* Rotacionar o elemento */
        margin-right: 5px;
    }

    .info-book{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .next-book{
        align-items: center;
    }

    .column-btn-next{
        padding: 25px 40px;
        color: white;
        border-radius: 10px;
        width: fit-content;
        background-color: #000000b0;
    }

    .column-btn-next:hover{
        transition: 0.2s;
        background: white;
        outline: 1px dotted black;
        color: black;
    }
</style>
