<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Recuperar Contraseña 🧳</title>
  <style>
    /* Estilos base y paleta */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Comic Sans MS', cursive;
    }

    body {
      padding-top: 100px; /* espacio para header fijo */
      padding-bottom: 450px;
      background: rgb(212, 223, 233);
      color: #142a31;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #142a31;
      padding: 10px 20px;
      z-index: 999;
    }

    nav ul {
      display: flex;
      gap: 15px;
      list-style: none;
      justify-content: center;
    }

    nav ul li a {
      color: #75d3ce;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 1.1rem;
    }

    nav ul li a:hover {
      color: #4a949b;
    }

    .error-box {
      background: white;
      max-width: 420px;
      width: 90%;
      margin-top: 3rem;
      padding: 2rem 3rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(20, 42, 49, 0.15);
      text-align: center;
      color: #142a31;
    }

    .error-box h2 {
      margin-bottom: 1.5rem;
      color: #4a949b;
      letter-spacing: 1.5px;
      font-weight: 700;
    }

    .error-box form input[type="email"] {
      width: 100%;
      padding: 0.8em 1em;
      margin-bottom: 1.2rem;
      border: 2px solid #75d3ce;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .error-box form input[type="email"]:focus {
      outline: none;
      border-color: #4a949b;
      box-shadow: 0 0 8px #75d3ceaa;
    }

    .error-box form input[type="submit"] {
      background-color: #75d3ce;
      color: #142a31;
      border: none;
      padding: 0.9em 1.5em;
      font-size: 1.1rem;
      font-weight: 700;
      border-radius: 8px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.4s ease, box-shadow 0.3s ease, transform 0.15s ease;
      user-select: none;
    }

    .error-box form input[type="submit"]:hover {
      background-color: #4a949b;
      box-shadow: 0 6px 14px rgba(74, 148, 155, 0.8);
      transform: translateY(-3px);
    }

    .error-box form input[type="submit"]:active {
      transform: translateY(0);
      box-shadow: none;
    }

    .error-box .btn {
      display: inline-block;
      margin-top: 1.5rem;
      padding: 0.6em 1.4em;
      background-color: #4a949b;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 700;
      transition: background-color 0.4s ease, box-shadow 0.3s ease;
    }

    .error-box .btn:hover {
      background-color: #75d3ce;
      box-shadow: 0 6px 14px rgba(74, 148, 155, 0.8);
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="registro.php">Registrarse</a></li>
        <li><a href="login.php">Iniciar Sesión</a></li>
        <li><a href="index.html">Inicio</a></li>
      </ul>
    </nav>
  </header>

  <div class="error-box">
    <h2>🔐 Recuperar Contraseña</h2>
    <form method="post" action="enviar_recuperacion.php">
      <input type="email" name="correo" placeholder="Introduce tu correo" required>
      <input type="submit" value="Enviar enlace de recuperación">
    </form>
    <a href="index.html" class="btn">Volver</a>
  </div>
</body>
</html>
