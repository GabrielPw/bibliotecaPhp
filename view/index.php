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
    ?>

    <main class="hero is-fullheight">
      <div class="hero-body">
        <div class="container">
          <div class="columns is-centered">
            <!--Image-->
            <div class="column is-6 image-bg is-hidden-tablet-only is-hidden-mobile is-flex is-align-items-end is-justify-content-start">
                
               <div class="wdth-box-title"><h1 class="is-size-3 has-text-weight-bold ">Descubra Mundos em Palavras: Baixe Livros Gratuitamente</h1></div>
                    
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
                  <div class="content p-2">
                    <!---Nome-->
                    <div class="field">
                        <label class="label">Nome</label>
                        <div class="control has-icons-left">
                          <input class="input" type="text" placeholder="Nome">
                          <span class="icon is-small is-left">
                            <i class="fa-solid fa-circle-user"></i>
                          </span>
                          
                        </div>
                        <p class="help is-hidden">This is a help text</p>
                      </div>

                    <!---Email-->
                      <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left">
                          <input class="input " type="text" placeholder="Email">
                          <span class="icon is-small is-left">
                            <i class="fa-solid fa-envelope"></i>
                          </span>
                        </div>
                        <p class="help is-hidden">This is a help text</p>
                      </div>

                       <!---Endereço-->
                       <div class="field">
                        <label class="label">Endereço</label>
                        <div class="control has-icons-left">
                          <input class="input " type="text" placeholder="Endereço">
                          <span class="icon is-small is-left">
                            <i class="fa-solid fa-location-dot"></i>
                          </span>
                        </div>
                        <p class="help is-hidden">This is a help text</p>
                      </div>

                       <!---Telefone-->
                       <div class="field">
                        <label class="label">Telefone</label>
                        <div class="control has-icons-left">
                          <input class="input " type="text" placeholder="Telefone">
                          <span class="icon is-small is-left">
                            <i class="fa-solid fa-phone"></i>
                          </span>
                        </div>
                        <p class="help is-hidden">This is a help text</p>
                      </div>
                                            
                      <!---Senha-->
                      <div class="field">
                        <label class="label">Senha</label>
                        <p class="control has-icons-left">
                          <input class="input" type="password" placeholder="Senha">
                          <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </p>
                      </div>

                      <div class="is-flex is-align-items-center is-justify-content-center mb-4">
                        <span class="line mr-2"></span>
                            <span class="mb-1 has-text-weight-semibold">ou entre com</span>
                        <span class="line ml-2"></span>
                      </div> 
                      
                      <div class="is-flex is-justify-content-center">
                        <button class="button is-wdt is-normal mr-2	" title="Google"><img src="assets/icons/google.svg" alt="Google" srcset=""></button>
                        <button class="button is-wdt is-normal mr-2	" title="Facebook"><img src="assets/icons/facebook.svg" alt="Facebook" srcset=""></button>
                        <button class="button is-wdt is-normal" title="Linkedin"><img src="assets/icons/linkedin.svg" alt="" srcset=""></button>
                      </div>
         
                      <p class="control mt-5 is-flex is-justify-content-center ">
                        <a class="button is-link is-outlined is-medium is-fullwidth" title="Cadastrar" href="/home">Cadastrar</a>
                      </p>

                    </div>
                  </div>
                </div>

                <!-- Div de Login -->
                <div class="card loginDiv" style="display: none;">
                <div class="card-content">
                    <p class="title p-2">
                        Seja bem vindo!
                      </p>
                      <p class="subtitle p-2">
                        Entre com sua conta.
                      </p>
                  <div class="content p-2">
                      <form action="POST" id="login-form">
                        <!---Email-->
                        <div class="field">
                          <label class="label">Email</label>
                          <div class="control has-icons-left">
                            <input class="input" type="email" name="email" placeholder="Email" id="email">
                            <span class="icon is-small is-left">
                              <i class="fa-solid fa-envelope"></i>
                            </span>
                          </div>
                          <p class="help is-hidden">This is a help text</p>
                        </div>

                        <!---Senha-->
                        <div class="field">
                          <label class="label">Senha</label>
                          <p class="control has-icons-left">
                            <input class="input" type="password" name="password" placeholder="Senha" id="password">
                            <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                            </span>
                          </p>
                        </div>

                        <div class="is-flex is-align-items-center is-justify-content-center mb-4">
                          <span class="line mr-2"></span>
                              <span class="mb-1 has-text-weight-semibold">ou entre com</span>
                          <span class="line ml-2"></span>
                        </div> 
                      
                        <div class="is-flex is-justify-content-center">
                          <button class="button is-wdt is-normal mr-2	" title="Google"><img src="assets/icons/google.svg" alt="Google" srcset=""></button>
                          <button class="button is-wdt is-normal mr-2	" title="Facebook"><img src="assets/icons/facebook.svg" alt="Facebook" srcset=""></button>
                          <button class="button is-wdt is-normal" title="Linkedin"><img src="assets/icons/linkedin.svg" alt="" srcset=""></button>
                        </div>
         
                        <p class="control mt-5 is-flex is-justify-content-center ">
                          <a id="login-link" class="button is-link is-outlined is-medium is-fullwidth" title="Entrar">Entrar</a>
                        </p>
                        <!-- mensagem de erro -->
                        <div  id="login-message"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="scirpt.js"></script>
  </body>
</html>
