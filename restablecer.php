<?php
require_once 'dbconexion.php';

if (!isset($_GET['token'])) {
    echo "❌ Token no proporcionado.";
    exit();
}

$token = $_GET['token'];

// Buscar token en la base de datos
$stmt = $cnnPDO->prepare("SELECT * FROM usuarios WHERE token_recuperacion = :token AND token_expira > NOW()");
$stmt->bindParam(':token', $token);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "❌ Token inválido o expirado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cambiar Contraseña</title>
  <link rel="stylesheet" href="style.css">
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Comic Sans MS', cursive;
}

body {
  padding-top: 100px;
  background: rgb(212, 223, 233);
  color: #142a31;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
}

.error-box {
  background: #ffffff;
  padding: 2rem 2.5rem;
  border-radius: 15px;
  box-shadow: 0 6px 16px rgba(20, 42, 49, 0.15);
  max-width: 400px;
  width: 100%;
  margin: 2rem auto;
  text-align: center;
}

.error-box h2 {
  color: #4a949b;
  margin-bottom: 1.5rem;
  font-weight: 700;
  font-size: 1.8rem;
  letter-spacing: 1px;
}

.error-box form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.error-box input[type="password"] {
  padding: 12px;
  font-size: 1rem;
  border: 2px solid #75d3ce;
  border-radius: 12px;
  background: #e8f0f4;
  color: #142a31;
  outline: none;
  transition: border-color 0.3s ease;
}

.error-box input[type="password"]:focus {
  border-color: #4a949b;
}

.error-box input[type="submit"] {
  padding: 12px 20px;
  background-color: #75d3ce;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  font-size: 1.1rem;
  transition: background-color 0.3s ease;
}

.error-box input[type="submit"]:hover {
  background-color: #4a949b;
}

  </style>
</head>
<body>
  <div class="error-box">
    <h2>🔒 Nueva Contraseña</h2>
    <form method="post" action="cambiar_password.php">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
      <input type="password" name="password" placeholder="Nueva contraseña" required>
      <input type="password" name="confirmar" placeholder="Confirmar contraseña" required>
      <input type="submit" value="Cambiar contraseña">
    </form>
  </div>
</body>
</html>
