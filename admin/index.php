<?php
require '../includes/app.php';
statusAutenticado();

// Importar la conexión
$db = conectarDB();

// Escribir la consulta QUERY
$query = "SELECT * FROM propiedades";

// Consultar la BD
$resultado = mysqli_query($db, $query);

// Muestra mensaje condicional
$msg = $_GET['msg'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        // Eliminar archivo
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../img/' . $propiedad['imagen']);

        // Eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header('Location: /admin?msg=3');
        }
    }
}

// Incluir un template
incluirTemplate('header');
?>
<main class="container seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php if (intval($msg) === 1) : ?>
        <p class="alerta successful">Anuncio creado correctamente</p>
    <?php elseif (intval($msg) === 2) : ?>
        <p class="alerta update">Anuncio actualizado correctamente</p>
    <?php elseif (intval($msg) === 3) : ?>
        <p class="alerta successful">Anuncio eliminado correctamente</p>
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
                    <td><?php echo "$ " . $propiedad['precio']; ?></td>
                    <td>
                        <form method="post" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
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