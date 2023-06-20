<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
    <main class="container seccion">
      <h2>Casas y Departamentos en Venta</h2>
      <?php
        $limit = 9;
        include 'includes/templates/anuncio.php';
      ?>
    </main>

<?php
  incluirTemplate('footer');
?>
