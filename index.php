<?php
  require 'includes/app.php';
  incluirTemplate('header', true);
?>
<!-- Iconos -->
<main class="container seccion">
  <h1>Más Sobre Nosotros</h1>

  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo
        dolores quis, quaerat quod magni quia iusto debitis voluptatum quas
        enim libero porro. Nemo delectus id maiores expedita voluptatem
        ratione quae.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy" />
      <h3>A precio</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo
        dolores quis, quaerat quod magni quia iusto debitis voluptatum quas
        enim libero porro. Nemo delectus id maiores expedita voluptatem
        ratione quae.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
      <h3>A tiempo</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo
        dolores quis, quaerat quod magni quia iusto debitis voluptatum quas
        enim libero porro. Nemo delectus id maiores expedita voluptatem
        ratione quae.
      </p>
    </div>
  </div>
</main>

<!-- Tarjetas -->
<section class="seccion container">
  <h2>Casas y Departamentos en Venta</h2>
  <?php
    $limit = 3;
    include 'includes/templates/anuncio.php';
  ?>
  <div class="alinear-derecha">
    <a href="anuncios.php" class="boton-verde">Ver todas</a>
  </div>
</section>

<!-- Contacto -->
<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondrá en contacto a la
    brevedad
  </p>
  <a href="contacto.php" class="boton-amarillo-inline-block">Contactanos</a>
</section>

<!-- Sección inferior -->
<div class="container seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />
          <source srcset="build/img/blog1.jpg" type="image/jpg" />
          <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="info-meta">
            Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
          </p>
          <p>
            Consejos para construir una terraza en el techo de tu casa con
            los mejores materiales y ahorrando dinero
          </p>
        </a>
      </div>
    </article>
    <!-- Entrada de blog 1 -->
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />
          <source srcset="build/img/blog2.jpg" type="image/jpg" />
          <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Guía para la decoración de tu hogar</h4>
          <p class="info-meta">
            Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
          </p>
          <p>
            Maximiza el espacio en tu hogar con esta guía, aprende a
            combinar muebles y colores para darle vida a tu espacio
          </p>
        </a>
      </div>
    </article>
    <!-- Entrada de blog 2 -->
  </section>
  <section class="testimoniales">
    <h3>Testimoniales</h3>

    <div class="testimonial">
      <blockquote>
        El personal se comportó de una excelente forma, muy buena atención y
        la casa que me ofrecieron cumple con todas mis expectativas.
      </blockquote>
      <p>- Sebastián Martínez López</p>
    </div>
  </section>
</div>

<?php
  incluirTemplate('footer');
?>