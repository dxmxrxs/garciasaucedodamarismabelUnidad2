<?php
session_start();
require_once 'dbconexion.php'; // Asegúrate que esta conexión está correcta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    $stmt = $cnnPDO->prepare("SELECT * FROM usuarios WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        // Login correcto
        $_SESSION['usuario'] = $usuario['nombre'];
        echo "<script>alert('🎉 Bienvenido {$usuario['nombre']}'); window.location.href='panel.php';</script>";
    } else {
        echo "<script>alert('❌ Correo o contraseña incorrectos'); window.history.back();</script>";
    }
}
?>
