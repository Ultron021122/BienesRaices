<?php
// Importar la conexión
require 'includes/app.php';
$db = conectarDB();

// Crear un email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
// var_dump($passwordHash);

// Query para crear el usuario
$query = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash');";
// echo $query;

// Agregarlo a la base de datos
mysqli_query($db, $query);
