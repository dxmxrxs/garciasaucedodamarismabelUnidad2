<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aqualends"; 

// Crear conexión PDO
try {
    $cnnPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Habilitar excepciones PDO
    $cnnPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: No se pudo conectar a la base de datos: " . $e->getMessage();
    exit();
}
?>
