<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
    <!-- Contenido principal -->
    <main class="container seccion contenido-centrado">
      <h1>Casa en venta frente al bosque</h1>

      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp" />
        <source srcset="build/img/destacada.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada.jpg"
          alt="Imagen de la propiedad"
        />
      </picture>
      <div class="resumen-propiedad">
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caract">
          <li>
            <img class="icono"
              loading="lazy"
              src="build/img/icono_wc.svg"
              alt="Icono de WC"
            />
            <p>3</p>
          </li>
          <li>
            <img class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt="Icono de estacionamiento"
            />
            <p>3</p>
          </li>
          <li>
            <img class="icono"
              loading="lazy"
              src="build/img/icono_dormitorio.svg"
              alt="Icono de dormitorios"
            />
            <p>6</p>
          </li>
        </ul>
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
