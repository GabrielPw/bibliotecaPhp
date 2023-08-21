<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="node_modules/@splidejs/splide/dist/css/splide.min.css">
    <link rel="stylesheet" href="/CSS/carrousel.css">
    
</head>
<body>
    <div class="banner-carrousel">
        <div class="container">
            <div class="columns">
                <div class="column is-one-thirds" style="display:flex; align-items: center;">
                    <p class="text-banner">
                        <span class="subtitle is-size-2" style="color: white;">Faça uma leitura relaxante.</span><br>
                        Bem-vindo à nossa Biblioteca Virtual, um espaço onde as páginas ganham vida e as palavras tecem mundos infinitos
                    </p>
                </div>
                <div class="column column-splide">
                    <div class="splide" id="image-slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide"><img src="assets/img/carrosel/a-revolucao-dos-bichos.webp" alt="Imagem 1"></li>
                                <li class="splide__slide"><img src="assets/img/carrosel/orgulho-e-preconceito-19.jpg" alt="Imagem 2"></li>
                                <li class="splide__slide"><img src="https://m.media-amazon.com/images/I/71Gmavgu3ZL._AC_UF1000,1000_QL80_.jpg" alt="Imagem 3"></li>
                                <li class="splide__slide"><img src="https://www.livrarialoyola.com.br/resizer/view/600/600/true/false/451444.jpg" alt="Imagem 4"></li>
                                <li class="splide__slide"><img src="https://imgs.search.brave.com/adUI_Zry2U6SMhzk3zrbHp0Zsnh0M6OaHZp0PeMe18k/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9ncnVw/b2VkaXRvcmlhbGds/b2JhbC5jb20uYnIv/Y2FwYXMvNDAwLzM5/MzIuanBn" alt="Imagem 5"></li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script src="node_modules/@splidejs/splide/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#image-slider', {
                type: 'loop',
                //interval: 3000, // Define o intervalo entre as imagens em milissegundos (neste caso, 3 segundos)
                perPage: 2,
                arrows: true,
                pagination: true,
                drag: true,
                pauseOnHover: false,
            }).mount();
        });
    </script>
</body>
</html>
