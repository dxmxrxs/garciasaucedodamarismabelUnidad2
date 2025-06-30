<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Enviar Mensaje 🧳</title>
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

nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #142a31;
  padding: 1em 2em;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
  z-index: 1000;
  color: #75d3ce;
}

.panel-box h1 {
  font-size: 1.4rem;
}

.panel-box p {
  font-size: 0.9rem;
  color: #b2e3e0;
}

nav ul {
  display: flex;
  align-items: center;
  list-style: none;
  gap: 15px;
}

.nav-link {
  text-decoration: none;
  font-weight: bold;
  color: #75d3ce;
  padding: 10px 15px;
  border-radius: 12px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.nav-link:hover {
  background-color: #4a949b;
  color: white;
}

.btn-cerrar {
  background: #ffffff;
  color: #142a31;
  padding: 10px 16px;
  border: 2px solid #75d3ce;
  border-radius: 25px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-cerrar:hover {
  background-color: #75d3ce;
  color: #142a31;
}

main {
  padding: 2em 1em 4em;
  width: 100%;
  max-width: 1100px;
  text-align: center;
}

main > h1 {
  color: #4a949b;
  margin-bottom: 2rem;
  font-weight: 700;
  font-size: 2rem;
  letter-spacing: 1px;
}

.form-container {
  background: #ffffff;
  padding: 2rem 2.5rem;
  border-radius: 15px;
  box-shadow: 0 6px 16px rgba(20, 42, 49, 0.15);
  max-width: 500px;
  width: 100%;
  margin: 2rem auto;
}

form {
  display: flex;
  flex-direction: column;
  text-align: left;
}

form label {
  margin-top: 1rem;
  font-weight: bold;
  color: #142a31;
}

form input,
form textarea {
  margin-top: 0.5rem;
  padding: 10px;
  border: 2px solid #75d3ce;
  border-radius: 8px;
  font-size: 1rem;
  color: #142a31;
  background: #e8f0f4;
  outline: none;
  transition: border-color 0.3s ease;
}

form input:focus,
form textarea:focus {
  border-color: #4a949b;
}

.form-btn {
  margin-top: 1.5rem;
  background-color: #75d3ce;
  color: white;
  border: none;
  padding: 12px 20px;
  font-size: 1rem;
  border-radius: 10px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.form-btn:hover {
  background-color: #4a949b;
}

/* Mensaje de confirmación */
.msg {
  margin-top: 1.5rem;
  background-color: #dff0d8;
  color: #3c763d;
  padding: 12px;
  border-radius: 8px;
  font-weight: bold;
  border: 1px solid #b2dba1;
  box-shadow: 0 4px 8px rgba(60, 118, 61, 0.2);
}

.nav-button {
  background: none;
  border: 2px solid #75d3ce;
  color: #75d3ce;
  padding: 8px 15px;
  border-radius: 12px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-button:hover {
  background-color: #4a949b;
  color: white;
}
  </style>
</head>
<body>

<header>
  <nav>
    <div class="panel-box">
      <h1>👤 ¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
      <p>Has iniciado sesión correctamente 🧳</p>
    </div>
    <ul style="display: flex; align-items: center; gap: 15px; list-style: none;">
      <li>
        <form action="panel.php" method="GET" style="margin: 0;">
          <button class="nav-button">Inicio</button>
        </form>
      </li>
    </ul>
  </nav>
</header>

<main>
  <h1>📬 Enviar un mensaje</h1>
  <div class="form-container">

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
      <div class="msg" id="mensaje-confirmacion">✅ Mensaje enviado con éxito</div>
    <?php endif; ?>

    <form action="guardar_mensaje.php" method="POST">
      <label for="nombre">Tu nombre:</label>
      <input type="text" id="nombre" value="<?php echo htmlspecialchars($_SESSION['usuario']); ?>" readonly>
      <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($_SESSION['usuario']); ?>">

      <label for="mensaje">Mensaje:</label>
      <textarea name="mensaje" id="mensaje" rows="4" required></textarea>

      <button type="submit" class="form-btn">Enviar</button>
    </form>
  </div>
</main>

</body>
</html>
