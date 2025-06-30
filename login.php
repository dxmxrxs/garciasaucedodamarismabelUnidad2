<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Iniciar Sesión 🧳</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Comic Sans MS', cursive;
    }

    body {
      padding-top: 100px; 
      padding-bottom: 60px; /* igual a la altura del footer */
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
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
      background-color: #142a31;
      color: #75d3ce;
      z-index: 999;
    }

    nav ul {
      display: flex;
      gap: 15px;
      list-style: none;
    }

    nav ul li a {
      text-decoration: none;
      font-weight: bold;
      color: #75d3ce;
      transition: color 0.3s ease;
    }

    nav ul li a:hover {
      color: #4a949b;
    }

    main {
      background: white;
      padding: 2rem 3rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(20, 42, 49, 0.15);
      width: 100%;
      max-width: 420px;
      color: #142a31;
      z-index: 1;
    }

    form h2 {
      margin-bottom: 1.5rem;
      font-weight: 700;
      text-align: center;
      color: #4a949b;
      letter-spacing: 1.5px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.8em 1em;
      margin-bottom: 1rem;
      border: 2px solid #75d3ce;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #4a949b;
      box-shadow: 0 0 8px #75d3ceaa;
    }

    input[type="submit"] {
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

    input[type="submit"]:hover {
      background-color: #4a949b;
      box-shadow: 0 6px 14px rgba(74, 148, 155, 0.8);
      transform: translateY(-3px);
    }

    input[type="submit"]:active {
      transform: translateY(0);
      box-shadow: none;
    }

    .footer {
      background-color: #142a31;
      color: #75d3ce;
      text-align: center;
      padding: 15px 20px;
      font-family: 'Comic Sans MS', cursive;
      position: fixed;  /* Fijo al fondo */
      bottom: 0;
      left: 0;
      width: 100%;
      box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.2);
      user-select: none;
      z-index: 1000;
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
    <h1>Iniciar Sesión 🧳</h1>
    <nav>
      <ul style="display: flex; align-items: center; gap: 15px; list-style: none;">
          <li>
        <form action="index.html" method="GET" style="margin: 0;">
          <button class="nav-button">Inicio</button>
        </form>
      </li>
      <li>
        <form action="registro.php" method="POST" style="margin: 0;">
          <button type="submit" class="nav-button">Registrarse</button>
        </form>
      </li>
      <li>
        <form action="contactanos.php" method="POST" style="margin: 0;">
          <button type="submit" class="nav-button">Contacto</button>
        </form>
      </li>
      <li>
        <form action="recuperar.php" method="POST" style="margin: 0;">
          <button type="submit" class="nav-button">Recuperar contraseña</button>
        </form>
      </li>
      </ul>
    </nav>
  </header>

  <main>
    <form action="validar_login.php" method="POST">
      <h2>Accede a tu cuenta</h2>
      <input type="email" name="correo" placeholder="Correo electrónico" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <input type="submit" value="Iniciar Sesión">
    </form>
  </main>

  <footer class="footer">
    <div class="footer-content">
      <p>© 2025 Viajes Chiquita. Todos los derechos reservados.</p>
      <p>Contacto: contacto@viajeschiquita.com | Tel: +52 55 1234 5678</p>
    </div>
  </footer>
</body>
</html>
