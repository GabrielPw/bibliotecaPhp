<header id="header_legal_CRM" class="">
  <!---navbar-->
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item is-size-5 has-text-weight-bold " href="<?php echo (isset($_COOKIE['rememberme'])) ? '/home' : '/' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
          <path fill="currentColor" d="M25.754 4.626a.876.876 0 0 0-.802-.097L12.16 9.41c-.557.212-1.253.315-1.968.315c-.997.002-2.03-.202-2.747-.48a3.441 3.441 0 0 1-.624-.302c.057-.024.12-.05.194-.075L18.648 4.43l1.733.654V3.172a.869.869 0 0 0-.373-.714a.877.877 0 0 0-.802-.097L6.415 7.24c-.396.143-.733.313-1.02.565c-.284.244-.527.645-.523 1.09c0 .013.004.032.004.032v17.186c0 .008-.003.015-.003.02c0 .007.003.01.003.017v.017h.002c.028.6.37.983.7 1.255c1.033.803 2.768 1.252 4.613 1.274c.875 0 1.762-.116 2.584-.427l12.796-4.882a.863.863 0 0 0 .558-.81V5.342a.87.87 0 0 0-.374-.714zm-20.082 7.11a.865.865 0 0 1 .07.273l.003.053c.016.264.13.406.363.61c.783.627 2.382 1.08 4.083 1.094a6.77 6.77 0 0 0 1.932-.264v1.79c-.647.144-1.3.207-1.942.207c-1.674-.026-3.266-.353-4.51-1.053v-2.71zm4.51 12.852c-1.675-.028-3.267-.354-4.51-1.055V20.82a.802.802 0 0 1 .07.276l.003.053c.018.266.13.407.364.612c.782.625 2.38 1.08 4.082 1.09c.67 0 1.327-.08 1.932-.26v1.788a8.907 8.907 0 0 1-1.943.208z" />
        </svg>
        BookBook..Go!!
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-end">
        <a class="navbar-item"> Quem Somos </a>

        <a class="navbar-item"> Nossos Pressos </a>
      </div>

      <?php
      $user = new Usuario($db);
      if ($user->checkIfCookieIsValid()) {
        list($userId, $token, $mac) = explode(':', $_COOKIE['rememberme']);
        $userInfo = $user->getUserById($userId);
      ?>
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <div class="dropdown is-hoverable">
                <div class="dropdown-trigger">
                  <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                    <figure class="image mr-2">
                      <img src="https://i.pinimg.com/736x/35/8d/32/358d3200b5f59d65ca9b0482daa71717.jpg" class="is-rounded" alt="profile picture mob psycho" srcset="">
                    </figure>
                    <span>Perfil</span>
                    <span class="icon is-small">
                      <i class="fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                  </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                  <div class="dropdown-content">
                    <a id="editarPerfilButton" class="dropdown-item">
                      editar perfil
                    </a>
                    <a class="dropdown-item" href="/logout">
                      <p style="color: red; font-weight: 400;"> Logout </p>
                    </a>
                  </div>
                </div>
                <div id="editarPerfilModal" class="modal">
                  <div class="modal-background"></div>
                  <div class="modal-content">
                    <div class="columns is-vcentered is-mobile">
                      <div class="column is-one-third has-text-centered">
                        <figure class="image is-64x64 is-inline-block">
                          <img src="<?php echo ($userInfo)? $userInfo['profile_image_url'] : '' ?>" alt="Foto de Perfil" class="is-rounded profile-modal-pic">
                        </figure>
                      </div>
                      <div class="column" style="padding-bottom: 0px;">
                        <p class="title"><?php echo ($userInfo)? $userInfo['nome'] : '' ?></p>
                        <p class="subtitle"><?php echo ($userInfo)? $userInfo['email'] : '' ?></p>

                        <h3 style="display: flex;"><img src="/assets/icons/heart.svg"> <span>Lista de desejos</span></h3>
                        <hr>
                      </div>
                    </div>
                    <div class="columns is-vcentered is-mobile">
                      <div class="column is-one-third has-text-centered">
                      </div>
                      <div class="column">
                        <ul>
                          <li>Revolução dos bichos</li>
                          <li>A Metamorfose</li>
                          <li>Crime e Castigo</li>
                        </ul>
                      </div>
                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
      } else {
        ?>
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <a class="button is-link" href="/">
                  <strong>Cadastre-se</strong>
                </a>
                <a class="button is-light" onclick="entrar();"> Entrar </a>
              </div>
            </div>
          </div>
        <?php
      }
        ?>
        </div>
  </nav>
</header>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="script.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    n =0;
    const editarPerfilButton = document.getElementById('editarPerfilButton');
    const editarPerfilModal = document.getElementById('editarPerfilModal');

    if (editarPerfilButton && editarPerfilModal) {
      editarPerfilButton.addEventListener('click', function() {
        
        n+=1;
        console.log("Clicou - " + n);
        editarPerfilModal.classList.add('is-active');
      });

      const closeModalButtons = document.querySelectorAll('.modal-close');
      closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
          editarPerfilModal.classList.remove('is-active');
        });
      });
    }
  });
</script>

<style>
  .modal-content {
    background-color: white; /* Defina a cor de fundo desejada para o conteúdo do modal */
    padding: 20px; /* Ajuste o espaçamento interno conforme necessário */
    border-radius: 5px; /* Adicione borda arredondada ao conteúdo do modal */
  }

  img.is-rounded.profile-modal-pic{
    max-height: fit-content;
  }
</style>