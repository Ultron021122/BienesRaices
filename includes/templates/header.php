<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raíces</title>
  <link rel="stylesheet" href="/bienesraices/build/css/app.css" />
</head>

<body>
  <!-- Cabecera de la página -->
  <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="container contenido-header">
      <div class="barra">
        <div class="nav-responsive">
          <a href="/bienesraices/index.php">
            <img src="build/img/logo.svg" alt="Logotipo de Bienes Raíces" />
          </a>

          <div class="mobile-menu">
            <img src="build/img/barras.svg" alt="Icono menu responsive" />
          </div>
        </div>

        <div class="derecha">
          <img class="dark-mode-boton" src="build/img/dark-mode.svg">
          <div class="nav">
            <a href="nosotros.php">Nosotros</a>
            <a href="anuncios.php">Anuncios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.php">Contacto</a>
          </div>
        </div>
      </div>
      <?php if ($inicio) { ?>
        <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
      <?php } ?>
    </div>
  </header>