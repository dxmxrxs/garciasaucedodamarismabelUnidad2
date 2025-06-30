<?php
require_once 'dbconexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nuevaContrasena = password_hash($_POST['nueva_contrasena'], PASSWORD_DEFAULT);

    $stmt = $cnnPDO->prepare("UPDATE usuarios SET password = :pass, token_recuperacion = NULL, token_expira = NULL WHERE token_recuperacion = :token AND token_expira > NOW()");
    $stmt->bindParam(':pass', $nuevaContrasena);
    $stmt->bindParam(':token', $token);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Contraseña restablecida con éxito.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('❌ Error al actualizar la contraseña.'); window.history.back();</script>";
    }
}
?>
