<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'Ultron021122*', 'bienesraices_crud');
    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}