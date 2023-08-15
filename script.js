$(document).ready(function() {

    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function() {
  
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
  
    });
});

  document.addEventListener('DOMContentLoaded', function () {
    new Splide('#image-slider', {
        type: 'loop',
        autoplay: true,
        interval: 3000, // Define o intervalo entre as imagens em milissegundos (neste caso, 3 segundos)
        perPage: 1,
        arrows: false,
        pagination: false,
        drag: false,
        pauseOnHover: false,
    }).mount();
});

$(document).ready(function() {
    // Verifica o estado de entrada armazenado na localStorage
    var loginState = localStorage.getItem('loginState');

    // Verifica se o estado é "login" e executa a lógica correspondente
    if (loginState === 'login') {
    $(".cadastroDiv").hide();
    $(".loginDiv").show();
    }
    // Limpa o estado de entrada da localStorage
    localStorage.removeItem('loginState');
  });

  // clicou no botão da navbar para fazer login.
function entrar() {
    // Pega a URI atual
    var currentUri = window.location.pathname;
  
    // Verifica se a URI é a raiz do site
    if (currentUri === '/') {
      // Esconde a div de cadastro
      $(".cadastroDiv").hide();
      // Mostra a div de login
      $(".loginDiv").show();
    } else {
      // Redireciona o usuário para a raiz
      localStorage.setItem('loginState', 'login');
      window.location.href = "/";
    }
}

// Enviou o formulário para fazer login.
$(document).ready(function() {

  $('#login-link').click(function(e) {
    e.preventDefault(); // Impedir o comportamento padrão do link
    $('#login-form').submit(); // Simular o envio do formulário de login
  });

  $('#login-form').submit(function(e) {

    e.preventDefault();

    var email_ = $('#email').val();
    var password_ = $('#password').val();

    var requestData = {
      email: email_,
      password: password_
    };

    // alert('Email inserido: ' +  email + ' - senha: '+ password);
    console.log('Email inserido: '+ email_, ' - senha: ' + password_);
    $.ajax({
      type: 'POST',
      url: 'http://api-biblioteca-php.com:8080/login',
      data: JSON.stringify(requestData), // Enviar os dados como JSON
      contentType: 'application/json', // Especificar o tipo de conteúdo como JSON
      dataType: 'json',
      success: function(response) {
          console.log('Response: ', response); // Use uma vírgula para separar o texto do objeto
          if (response === 'Logado com sucesso.') {
              $('#login-message').text('Login bem-sucedido.');
              window.location.href = 'http://biblioteca-php.com:8000/home';

          } else {
              $('#login-message').text('Credenciais inválidas.');
          }
      },
      error: function(jqXHR) {
          if (jqXHR.status === 400) {
            var errorResponse = jqXHR.responseJSON; // Use responseJSON para acessar o JSON de erro
            console.log('Erro 400 Bad Request:', errorResponse);
            $('#login-message').text('Erro 400 Bad Request: ' + errorResponse.error);
        } else {
            $('#login-message').text('Erro ao realizar o login.');
        }
      }
    });
  });
});