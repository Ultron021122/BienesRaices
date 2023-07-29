<?php
    // Iniciamos una sesión 
    session_start();
    // Vaciamos
    $_SESSION = [];
    header('Location: /');
?>