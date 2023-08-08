<?php
  require 'includes/app.php';
  incluirTemplate('header');
?>
    <main class="container seccion">
      <h1>Conoce sobre Nosotros</h1>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/nostros.jpg"
              alt="Sobre nosotros"
            />
          </picture>
        </div>
        <div class="texto-nosotros">
          <blockquote>25 Años de experiencia</blockquote>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            sint omnis quaerat laborum, saepe illo cumque, pariatur animi,
            debitis ipsam fuga quisquam hic voluptatum qui corrupti quia
            doloribus fugiat. Laborum! Lorem ipsum dolor sit, amet consectetur
            adipisicing elit. Tenetur suscipit illo voluptatem reprehenderit
            facere dignissimos at labore. Delectus qui unde magni illum
            doloribus est alias eligendi, quibusdam nemo facere voluptas.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
            excepturi illum perferendis accusantium, pariatur praesentium cum
            culpa eaque obcaecati tenetur ex dolorum fugiat iste minus saepe
            laboriosam asperiores earum aliquid.
          </p>
        </div>
      </div>
    </main>

    <!-- Iconos -->
    <section class="container seccion">
      <h1>Más Sobre Nosotros</h1>

      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
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
    </section>

<?php
  incluirTemplate('footer');
?>
