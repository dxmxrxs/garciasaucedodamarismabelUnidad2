<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $linea = "[" . date('Y-m-d H:i:s') . "] $nombre: $mensaje" . PHP_EOL;

    // Guarda en un archivo mensajes.txt en el mismo directorio
    file_put_contents("mensajes.txt", $linea, FILE_APPEND);

    // Redirige con parámetro de éxito para mostrar mensaje
    header('Location: error.php?exito=1');
    exit;
} else {
    header('Location: enviar_mensaje.php');
    exit;
}
