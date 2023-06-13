<?php

// Importar la conexión
require '../includes/config/database.php';
$db = conectarDB();

// Escribir la consulta QUERY
$query = "SELECT * FROM propiedades";

// Consultar la BD
$resultado = mysqli_query($db, $query);

// Muestra mensaje condicional
$msg = $_GET['msg'] ?? null;

// Incluir un template
require '../includes/funciones.php';
incluirTemplate('header');
?>
<main class="container seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php if (intval($msg) === 1) : ?>
        <p class="alerta successful">Anuncio creado correctamente</p>
    <?php elseif(intval($msg) === 2): ?>
        <p class="alerta update">Anuncio actualizado correctamente</p>
    <?php endif; ?>
    <a href="/admin/properties/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar los resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/img/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                    <td><?php echo "$ ".$propiedad['precio']; ?></td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="/admin/properties/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-azul-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>
<?php
    // Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>