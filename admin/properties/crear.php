<?php
// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

// Arreglo con mensajes de errores
$errores = [];

// Ejecutar el código después que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedores_id = $_POST['vendedor'];

    if (!$titulo) {
        $errores[] = "Debes de añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatorio y debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "El número de habitaciones es obligatorio";
    }
    if (!$wc) {
        $errores[] = "El número de baños es obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "El número de estacionamientos es obligatorio";
    }
    if (!$vendedores_id) {
        $errores[] = "Elige un vendedor";
    }
    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    // Revisar que el array de errores este vacío
    if (empty($errores)) {
        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) VALUES ( '$titulo',
        '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id' )";
        // echo $query;

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            echo "Insertado correctamente";
        } else {
            echo "Ocurrió un error";
        }
    }
}
require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="container seccion">
    <h1>Crear Registro</h1>
    <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" action="/bienesraices/admin/properties/crear.php">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea>

        </fieldset>
        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="">-- Seleccione --</option>
                <option value="1">Juan</option>
                <option value="2">Ana</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>
<?php
incluirTemplate('footer');
?>