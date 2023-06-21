<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="container seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <form class="formulario">
            <fieldset>
                <legend>Credenciales</legend>
                
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email">

                <label for="password">Password</label>
                <input type="password" placeholder="Tu Password" id="password">
            </fieldset>

            <input type="submit" class="boton boton-verde" value="Iniciar sesión">
        </form>
    </main>
<?php
    incluirTemplate('footer');
?>