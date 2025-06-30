<?php
require_once 'dbconexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);

    // Buscar usuario
    $stmt = $cnnPDO->prepare("SELECT * FROM usuarios WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Generar token único
        $token = bin2hex(random_bytes(32));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Guardar el token y expiración
        $stmt = $cnnPDO->prepare("UPDATE usuarios SET token_recuperacion = :token, token_expira = :expira WHERE correo = :correo");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expira', $expira);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        // Enviar correo
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'carnicerialablanca31@gmail.com';
            $mail->Password = 'hska mfel anza crrq';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('saucedodamaris804@gmail.com', 'Floreria Chiquita');
            $mail->addAddress($correo);
            $mail->isHTML(true);
            $mail->Subject = 'Restablecer contraseña - Floreria Chiquita';
            $mail->Body = "
                <h2>Solicitud de recuperación</h2>
                <p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                <a href='http://localhost/unidad1/restablecer.php?token=$token'>Restablecer Contraseña</a>
                <p>Este enlace expirará en 1 hora.</p>
            ";

            $mail->send();
            echo "<script>alert('📧 Se ha enviado un enlace a tu correo.'); window.location.href='index.html';</script>";
        } catch (Exception $e) {
            echo "<script>alert('❌ Error al enviar el correo: {$mail->ErrorInfo}'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('❌ No se encontró ese correo.'); window.history.back();</script>";
    }
}
?>
