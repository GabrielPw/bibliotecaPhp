<link rel="stylesheet" href="node_modules/@splidejs/splide/dist/css/splide.min.css">


<div class="splide" id="image-slider">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide"><img src="assets/img/carousel1.jpg" alt="Imagem 1"></li>
            <li class="splide__slide"><img src="assets/img/carousel2.jpg" alt="Imagem 2"></li>
            <li class="splide__slide"><img src="assets/img/carousel3.jpg" alt="Imagem 3"></li>
            <li class="splide__slide"><img src="assets/img/carousel4.jpg" alt="Imagem 4"></li>
            <li class="splide__slide"><img src="assets/img/carousel5.jpg" alt="Imagem 5"></li>
        </ul>
    </div>
</div>

<script src="node_modules/@splidejs/splide/dist/js/splide.min.js"></script>
<script>
      document.addEventListener('DOMContentLoaded', function () {
    new Splide('#image-slider', {
        type: 'loop',
        autoplay: true,
        interval: 3000, // Define o intervalo entre as imagens em milissegundos (neste caso, 3 segundos)
        perPage: 3,
        arrows: true,
        pagination: true,
        drag: true,
        pauseOnHover: false,
    }).mount();
});
</script>
<style>
    .splide__slide img {
            height: 400px; /* Define a altura desejada para as imagens */
            width: 100%;
            object-fit: cover; /* Para garantir que as imagens não sejam distorcidas */
        }

        .splide {
            height: 40vh; /* Define a altura do carrossel como 40% da altura da tela */
        }
</style>