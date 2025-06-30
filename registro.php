<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registro 🧳</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    /* Paleta y estilo base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Comic Sans MS', cursive;
    }

    body {
      padding-top: 100px; /* espacio para header fijo */
      padding-bottom: 0;
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
    }

    form h2 {
      margin-bottom: 1.5rem;
      font-weight: 700;
      text-align: center;
      color: #4a949b;
      letter-spacing: 1.5px;
    }

    input[type="text"],
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

    input[type="text"]:focus,
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

    #mensaje {
      margin-top: 1rem;
      min-height: 1.4em;
      font-weight: 600;
      color: #142a31;
      text-align: center;
      opacity: 0;
      transition: opacity 0.5s ease;
      font-family: 'Comic Sans MS', cursive;
    }
    #mensaje.visible {
      opacity: 1;
    }

    .footer {
  background-color: #142a31;
  color: #75d3ce;
  text-align: center;
  padding: 15px 20px;
  font-family: 'Comic Sans MS', cursive;
  position: relative;  /* para que no se mueva */
  width: 100%;
  bottom: 0;
  box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.2);
  user-select: none;
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
  <script>
    // Validación síncrona de contraseñas
    function validarFormulario() {
      const pass1 = document.getElementById("password").value;
      const pass2 = document.getElementById("confirmar").value;
      if (pass1 !== pass2) {
        mostrarMensaje("Las contraseñas no coinciden 💔");
        return false;
      }
      return true;
    }

    // Mostrar mensajes con animación
    function mostrarMensaje(texto) {
      const msg = document.getElementById("mensaje");
      msg.textContent = texto;
      msg.classList.add("visible");
      setTimeout(() => msg.classList.remove("visible"), 4000);
    }

    document.addEventListener("DOMContentLoaded", () => {
      const form = document.querySelector("form");

      form.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (!validarFormulario()) return;

        mostrarMensaje("Validando y enviando datos...");

        const formData = new FormData(form);

        try {
          const response = await fetch(form.action, {
            method: form.method,
            body: formData,
          });

          const resultado = await response.json();

          if (resultado.exito) {
            mostrarMensaje(resultado.mensaje);
            form.style.transition = "transform 0.4s ease";
            form.style.transform = "scale(1.05)";
            setTimeout(() => {
              form.style.transform = "";
              // Si quieres redirigir después, descomenta la línea de abajo
              window.location.href = "login.php";
            }, 1000);
          } else {
            mostrarMensaje(resultado.mensaje);
          }
        } catch (error) {
          mostrarMensaje("Error en el servidor.");
          console.error(error);
        }
      });
    });
  </script>
</head>
<body>
  <header>
    <h1>Registrarse 🧳</h1>
    <nav>
      <ul>
        <li>
        <form action="index.html" method="GET" style="margin: 0;">
          <button type="submit" class="nav-button">Inicio</button>
        </form>
      </li>
      <li>
      <li>
        <form action="login.php" method="POST" style="margin: 0;">
          <button type="submit" class="nav-button">Iniciar Sesión</button>
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
    <form action="registrar.php" method="POST" onsubmit="return validarFormulario();">
      <h2>Crear Cuenta</h2>
      <input type="text" name="nombre" placeholder="Nombre completo" required />
      <input type="email" name="correo" placeholder="Correo electrónico" required />
      <input type="password" name="password" id="password" placeholder="Contraseña" required />
      <input type="password" id="confirmar" placeholder="Confirmar contraseña" required />
      <div class="g-recaptcha" data-sitekey="6LcZ0V0rAAAAADyKL7ayTRwwQt3Gmq-zYZmxaUdy"></div>
      <input type="submit" value="Registrarse" />
      <div id="mensaje"></div>
    </form>
  </main>
  <br>
  <br>
<footer class="footer">
  <div class="footer-content">
    <p>© 2025 Viajes Chiquita. Todos los derechos reservados.</p>
    <p>Contacto: contacto@viajeschiquita.com | Tel: +52 55 1234 5678</p>
  </div>
</footer>
</body>
</html>
