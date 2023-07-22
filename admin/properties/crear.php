<?php
require '../../includes/funciones.php';
$auth = statusAutenticado();

if(!$auth) {
    header('Location: /');
}
// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = [];

// Declaración de variables
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

// Ejecutar el código después que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";


    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    // Asignar files hacia una imagen
    $imagen = $_FILES['imagen'];

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
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "La Imagen es Obligatoria";
    }
    // Validar por tamaño (2 MB máximo)
    $medida = 1000 * 2000;

    if ($imagen["size"] > $medida) {
        $errores[] = "La Imagen es muy pesada";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    // Revisar que el array de errores este vacío
    if (empty($errores)) {

        // Subida de archivos
        // Crear carpeta
        $carpetaImg = '../../img/';
        if (!is_dir($carpetaImg)) {
            mkdir($carpetaImg);
        }

        // Generar un nombre único
        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $nombreImg = md5(uniqid(rand(), true)) . '_' . time() . '.' . $extension;

        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImg . $nombreImg);

        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ( '$titulo',
        '$precio', '$nombreImg', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id' )";
        // echo $query;

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redireccionar al usuario.

            header('Location: /admin?msg=1');
        }
    }
}
incluirTemplate('header');
?>
<main class="container seccion">
    <h1>Crear Propiedad</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" action="/admin/properties/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" placeholder="Titulo Propiedad">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" placeholder="Precio Propiedad" min="1">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

        </fieldset>
        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $habitaciones; ?>" placeholder="Ej: 3" min="1" max="9">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" value="<?php echo $wc; ?>" placeholder="Ej: 3" min="1" max="9">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $estacionamiento; ?>" placeholder="Ej: 3" min="1" max="9">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="">-- Seleccione --</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedores_id === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        <input type="reset" value="Limpiar" class="boton boton-rojo">
    </form>
</main>
<?php
incluirTemplate('footer');
?>