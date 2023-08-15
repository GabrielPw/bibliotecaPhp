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
    include 'menu-header.php';
    include 'carrosel.php';
    ?>

    <div class="container">
    <h1 class="title mt-6 is-size-1">Biblioteca de livros <i class="fa-solid fa-book"></i></h1>
    <h2 class="subtitle is-size-2">Sua biblioteca em PHP</h2>

 <?php

    $api_url = 'http://api-biblioteca-php.com:8080';
    $response = file_get_contents($api_url . '/books/getAll');
    $livros = json_decode($response);

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
                <div class="column is-3">
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
                                        <img src="<?php echo "$livro->autor_imagem_perfil"; ?>" alt="Placeholder image">
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