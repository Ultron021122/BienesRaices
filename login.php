<?php
require 'includes/funciones.php';
$auth = statusAutenticado();
if($auth) {
    header('Location: /admin');
}
// Conexión a la base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Autenticar el usuario
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        // Revisar si el usuario existe
        $query = "SELECT * FROM users WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if( $resultado->num_rows ) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar el password
            $auth = password_verify($password, $usuario['password']);
            if( $auth ) {
                // El usuario esta autenticado
                session_start();

                // Llenar el arreglo de la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                
                header('Location: /admin');

            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

// Incluye el header
incluirTemplate('header');
?>
<main class="container seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="post">
        <fieldset>
            <legend>Credenciales</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu E-mail" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu Password" id="password">
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Iniciar sesión">
    </form>
</main>
<?php
incluirTemplate('footer');

// Cerrar la conexión
mysqli_close($db);
?>