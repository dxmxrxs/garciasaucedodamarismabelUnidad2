<?php
require_once 'dbconexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirmar = $_POST['confirmar'];

    if ($password !== $confirmar) {
        echo "<script>alert('❌ Las contraseñas no coinciden.'); window.history.back();</script>";
        exit();
    }

    // Buscar al usuario con el token
    $stmt = $cnnPDO->prepare("SELECT * FROM usuarios WHERE token_recuperacion = :token AND token_expira > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "<script>alert('❌ Token inválido o expirado.'); window.location.href='index.html';</script>";
        exit();
    }

    // Cambiar contraseña
    $nuevaPass = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $cnnPDO->prepare("UPDATE usuarios SET password = :password, token_recuperacion = NULL, token_expira = NULL WHERE id = :id");
    $stmt->bindParam(':password', $nuevaPass);
    $stmt->bindParam(':id', $usuario['id']);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Contraseña actualizada correctamente.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('❌ Error al actualizar la contraseña.'); window.history.back();</script>";
    }
}
?>
