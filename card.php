<?php
// Obtener los datos
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /');
}

// Conectar a la base de datos
require 'includes/app.php';
$db = conectarDB();

// Obtener los datos de la propiedad
$query = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);

if(!$resultado->num_rows) {
  header('Location: /');
}

incluirTemplate('header');
?>
<!-- Contenido principal -->
<main class="container seccion contenido-centrado">
  <h1><?php echo $propiedad['titulo']; ?></h1>
  <img loading="lazy" src="img/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad" />
  <div class="resumen-propiedad">
  <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
  <ul class="iconos-caract">
    <li>
      <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono de WC" />
      <p><?php echo $propiedad['wc']; ?></p>
    </li>
    <li>
      <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono de estacionamiento" />
      <p><?php echo $propiedad['estacionamiento']; ?></p>
    </li>
    <li>
      <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono de dormitorios" />
      <p><?php echo $propiedad['habitaciones']; ?></p>
    </li>
  </ul>
  <p>
    <?php echo $propiedad['descripcion']; ?>
  </p>
  </div>
</main>

<?php
incluirTemplate('footer');

// Cerrar la conexión
mysqli_close($db);
?>