<?php
// Importar la conexión
$db = conectarDB();

// Consultar
$query = "SELECT * FROM propiedades LIMIT $limit";
$resultado = mysqli_query($db, $query);
?>

<div class="contenedor-card">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="card">
            <img loading="lazy" src="/img/<?php echo $propiedad['imagen']; ?>" alt="Prevista de casa">

            <div class="contenido-card">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p>
                    <?php echo $propiedad['descripcion']; ?>
                </p>
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

                <a href="card.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo"> Ver Propiedad </a>
            </div>
            <!-- contenido de card-->
        </div>
        <!-- cards -->
    <?php endwhile; ?>
</div>
<!-- contenedor -->

<?php
// Cerrar la conexión
mysqli_close($db);
?>