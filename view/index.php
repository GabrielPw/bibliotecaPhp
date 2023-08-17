<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="CSS/cadastro.css" />
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <link rel="shortcut icon" href="assets/img/book-48.png" type="image/x-icon">

  <title>BookBookGo!!</title>
</head>

<body>

  <?php
  include 'menu-header.php';
  include 'config/config.php';
  ?>

  <main class="hero is-fullheight">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <!--Image-->
          <div class="column is-6 image-bg is-hidden-tablet-only is-hidden-mobile is-flex is-align-items-end is-justify-content-start">

            <div class="wdth-box-title">
              <h1 class="is-size-3 has-text-weight-bold ">Descubra Mundos em Palavras: Baixe Livros Gratuitamente</h1>
            </div>

          </div>

          <!--Formulário-->
          <div class="column is-6">
            <div class="card cadastroDiv">
              <div class="card-content">
                <p class="title p-2">
                  Seja bem vindo!
                </p>
                <p class="subtitle p-2">
                  faça seu cadastro e tenha acesso a milhares de livros.
                </p>
                <?php include 'cadastroForm.php'; ?>
            </div>
            <!-- Div de Login -->
            <?php include 'loginForm.php'; ?>
          </div>
          <?php 
            if($_SERVER['REQUEST_URI'] == '/?loginError'){
              ?><script>entrar();</script><?php
            }
          ?>
        </div>
      </div>
    </div>
    </div>
  </main>

  <script src="scirpt.js"></script>
</body>

</html>