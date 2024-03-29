<?php
  require 'includes/app.php';
  incluirTemplate('header');
?>
    <!-- Contenido principal -->
    <main class="container seccion contenido-centrado">
      <h1>Guía para la decoración de tu hogar</h1>
      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="Imagen de la propiedad"
        />
      </picture>
      <p class="info-meta">
        Escrito el: <span>01/06/2023</span> por:<span> Admin</span>
      </p>
      <div class="resumen-propiedad">
        <p>
          Ut placerat erat eget nulla auctor ullamcorper. Nunc sed venenatis
          nisl. Nullam sit amet orci imperdiet, condimentum eros non, fringilla
          lectus. In hac habitasse platea dictumst. Phasellus et risus nec urna
          condimentum cursus ut quis erat. Pellentesque ultricies risus quis
          felis ullamcorper, id luctus turpis fringilla. Aenean scelerisque,
          ipsum eget semper consequat, leo ligula viverra metus, id vehicula
          purus ex id purus. Sed laoreet aliquam cursus. Proin viverra dolor
          dolor, sit amet placerat odio rhoncus nec. Phasellus facilisis
          sollicitudin risus id tincidunt. Ut non eros hendrerit, condimentum
          erat quis, euismod lacus.
        </p>
        <p>
          Integer cursus accumsan aliquam. Ut id quam volutpat, consectetur
          metus eget, venenatis ante. Ut fermentum arcu id efficitur aliquet.
          Donec ex odio, maximus vel imperdiet at, lacinia non risus. Fusce
          vitae metus nec tellus convallis congue in a ex. Morbi dignissim eu
          est quis tincidunt. Curabitur varius turpis eu justo fringilla, vitae
          maximus eros faucibus. Integer sit amet tellus vitae lectus pharetra
          tincidunt vitae sollicitudin mauris.
        </p>
      </div>
    </main>

<?php
  incluirTemplate('footer');
?>
