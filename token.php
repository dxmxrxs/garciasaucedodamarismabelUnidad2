<?php
// Suponiendo que ya tienes el $email y el $token generados
$to = $email;
$subject = "Recuperación de contraseña - AquaLends";
$resetLink = "https://tuweb.com/reset_password.php?token=$token";

$message = "Hola,

Recibimos una solicitud para restablecer tu contraseña. 
Haz clic en el siguiente enlace para crear una nueva contraseña:

$resetLink

Si no solicitaste este cambio, puedes ignorar este correo.

Saludos,
Equipo AquaLends
";

$headers = "From: no-reply@tuweb.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "✅ Se envió el enlace de recuperación a tu correo.";
} else {
    echo "❌ Error al enviar el correo.";
}

?>