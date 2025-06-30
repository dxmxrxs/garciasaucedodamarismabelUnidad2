<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Página de Inicio 🧳</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Comic Sans MS', cursive;
    }

    body {
      padding-top: 100px; /* espacio para que las cards no se peguen al header */
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

    .logo-container {
      display: flex;
      align-items: center;
    }

    .logo-container img {
      height: 60px;
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

    .cards-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
      width: 100%;
      padding: 20px;
    }

    .card {
      position: relative;
      width: 300px;
      height: 350px;
    }

    .card .face {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 10px;
      overflow: hidden;
      transition: 0.5s;
    }

    .card .front {
      transform: perspective(600px) rotateY(0deg);
      box-shadow: 0 5px 10px #000;
    }

    .card .front img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .card .front h3 {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 45px;
      line-height: 45px;
      color: #fff;
      background: rgba(0, 0, 0, 0.4);
      text-align: center;
    }

    .card .back {
      transform: perspective(600px) rotateY(180deg);
      background: rgb(3, 35, 54);
      padding: 15px;
      color: #f3f3f3;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      text-align: center;
      box-shadow: 0 5px 10px #000;
    }

    .card .back .link {
      border-top: solid 1px #f3f3f3;
      height: 50px;
      line-height: 50px;
    }

    .card .back .link a {
      color: #f3f3f3;
      text-decoration: none;
    }

    .card .back h3 {
      font-size: 30px;
      margin-top: 20px;
      letter-spacing: 2px;
    }

    .card .back p {
      letter-spacing: 1px;
    }

    .card:hover .front {
      transform: perspective(600px) rotateY(180deg);
    }

    .card:hover .back {
      transform: perspective(600px) rotateY(360deg);
    }

    .card:hover {
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
      border: 2px solid #75d3ce;
    }

    .benefits-section {
  max-width: 900px;
  margin: 40px auto 60px;
  padding: 30px 20px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(20, 42, 49, 0.15);
  background: #fff;
  color: #142a31;
  font-family: 'Comic Sans MS', cursive;
  text-align: center;
}

.benefits-section h2 {
  color: #4a949b;
  margin-bottom: 30px;
  font-weight: 700;
  letter-spacing: 1.5px;
}

.benefits-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
}

.benefit-card {
  background: #e8f0f4;
  border-radius: 10px;
  padding: 20px 15px;
  flex: 1 1 200px;
  max-width: 220px;
  box-shadow: 0 4px 10px rgba(20, 42, 49, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: default;
}

.benefit-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(74, 148, 155, 0.5);
}

.benefit-card svg {
  margin-bottom: 12px;
}

.benefit-card h3 {
  margin-bottom: 12px;
  color: #75d3ce;
  font-weight: 700;
}

.benefit-card p {
  font-size: 0.95rem;
  line-height: 1.4;
  color: #142a31dd;
}

.footer {
  background-color: #142a31;
  color: #75d3ce;
  text-align: center;
  padding: 15px 20px;
  font-family: 'Comic Sans MS', cursive;
  position: relative; 
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
</head>
<body>
  <header>
    <div class="logo-container">
      <a href="index.html">
        <img src="img/c74cca7b-f234-464d-8f85-2fef10ce3a92.jpg" alt="Logo Florería Chiquita" />
      </a>
    </div>
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

  <section id="contacto" style="padding: 40px 20px; background: #e8f0f4; color: #142a31; font-family: 'Comic Sans MS', cursive;">
  <h2 style="text-align: center; color: #4a949b; margin-bottom: 30px;">📞 Contacto</h2>

  <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 6px 18px rgba(20, 42, 49, 0.15);">

    <!-- Formulario -->
    <form action="procesar_contacto.php" method="POST" id="form-contacto" style="margin-bottom: 40px;">
      <label for="nombre" style="display:block; font-weight: bold; margin-bottom: 8px;">Nombre completo:</label>
      <input type="text" id="nombre" name="nombre" required
        style="width: 100%; padding: 10px; margin-bottom: 20px; border: 2px solid #75d3ce; border-radius: 8px; font-size: 1rem; outline: none; transition: border-color 0.3s;">

      <label for="email" style="display:block; font-weight: bold; margin-bottom: 8px;">Correo electrónico:</label>
      <input type="email" id="email" name="email" required
        style="width: 100%; padding: 10px; margin-bottom: 20px; border: 2px solid #75d3ce; border-radius: 8px; font-size: 1rem; outline: none; transition: border-color 0.3s;">

      <label for="asunto" style="display:block; font-weight: bold; margin-bottom: 8px;">Asunto:</label>
      <input type="text" id="asunto" name="asunto" required
        style="width: 100%; padding: 10px; margin-bottom: 20px; border: 2px solid #75d3ce; border-radius: 8px; font-size: 1rem; outline: none; transition: border-color 0.3s;">

      <label for="mensaje" style="display:block; font-weight: bold; margin-bottom: 8px;">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" rows="5" required
        style="width: 100%; padding: 10px; border: 2px solid #75d3ce; border-radius: 8px; font-size: 1rem; outline: none; transition: border-color 0.3s;"></textarea>

      <button type="submit" style="background-color: #75d3ce; color: white; padding: 12px 20px; font-weight: bold; border: none; border-radius: 10px; cursor: pointer; font-size: 1rem; transition: background-color 0.3s;">
        Enviar Mensaje
      </button>
    </form>

    <div id="respuesta" style="margin-top: 20px; font-weight: bold; display:none;"></div>

    <!-- Redes Sociales -->
    <div style="text-align: center;">
      <h3 style="color: #4a949b; margin-bottom: 20px;">Síguenos en redes sociales</h3>
      <div style="display: flex; justify-content: center; gap: 30px; font-size: 1.6rem;">

        <a href="https://www.instagram.com/tu_usuario" target="_blank" rel="noopener" aria-label="Instagram" style="color: #e4405f; text-decoration: none; transition: color 0.3s;">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2A5.75 5.75 0 0 0 2 7.75v8.5A5.75 5.75 0 0 0 7.75 22h8.5A5.75 5.75 0 0 0 22 16.25v-8.5A5.75 5.75 0 0 0 16.25 2h-8.5Zm0 1.5h8.5A4.25 4.25 0 0 1 20.5 7.75v8.5a4.25 4.25 0 0 1-4.25 4.25h-8.5A4.25 4.25 0 0 1 3.5 16.25v-8.5A4.25 4.25 0 0 1 7.75 3.5Zm4.25 3.06a4.69 4.69 0 1 0 0 9.38 4.69 4.69 0 0 0 0-9.38Zm0 1.5a3.19 3.19 0 1 1 0 6.38 3.19 3.19 0 0 1 0-6.38Zm4.59-.43a1.1 1.1 0 1 0 0 2.2 1.1 1.1 0 0 0 0-2.2Z"/></svg>
        </a>

        <a href="https://www.facebook.com/tu_usuario" target="_blank" rel="noopener" aria-label="Facebook" style="color: #1877f2; text-decoration: none; transition: color 0.3s;">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.63 9.88v-6.99h-2.55v-2.89h2.55v-2.2c0-2.52 1.5-3.9 3.8-3.9 1.1 0 2.25.2 2.25.2v2.48h-1.27c-1.25 0-1.64.78-1.64 1.57v1.86h2.79l-.45 2.89h-2.34v6.99A10 10 0 0 0 22 12Z"/></svg>
        </a>

        <a href="https://wa.me/5211234567890" target="_blank" rel="noopener" aria-label="WhatsApp" style="color: #25d366; text-decoration: none; transition: color 0.3s;">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A11.86 11.86 0 0 0 12 0a11.84 11.84 0 0 0-10.33 17.6L0 24l6.6-1.71A11.83 11.83 0 0 0 12 24a11.87 11.87 0 0 0 8.52-20.52Zm-8.54 16.67a8.52 8.52 0 0 1-4.38-1.22l-.31-.19-2.67.71.72-2.6-.2-.33a8.54 8.54 0 0 1 1.68-11.2 8.6 8.6 0 0 1 11.86 1.47 8.61 8.61 0 0 1-7.3 13.16Zm4.28-5.45c-.12-.06-.69-.34-1.6-.73a1.32 1.32 0 0 0-1.26.3c-.43.41-.84.7-1.07.88-.15.13-.27.18-.5.07a6.49 6.49 0 0 1-2.4-1.48 9.22 9.22 0 0 1-1.7-2.1 5.63 5.63 0 0 1-.59-1.18c-.15-.44.14-.69.33-.88.1-.1.22-.26.33-.4a.91.91 0 0 0 .12-.3c.03-.12 0-.22-.04-.31-.08-.24-1.85-4.43-2.53-5.56-.34-.58-.67-.5-.91-.51-.26 0-.56 0-.86 0-.44 0-.88.06-1.3.3a4.23 4.23 0 0 0-1.77 1.35c-.62.83-1.02 1.85-1.13 2.95a8.45 8.45 0 0 0 .24 2.44c.5 2.1 2.03 4.75 4.67 6.45a9.44 9.44 0 0 0 4.34 1.63 7.83 7.83 0 0 0 5.14-1.97 7.73 7.73 0 0 0 1.5-2.4 6.75 6.75 0 0 0-.16-4.5 3.66 3.66 0 0 0-1.27-1.55Z"/></svg>
        </a>

      </div>
    </div>

  </div>
</section>

<footer class="footer">
  <div class="footer-content">
    <p>© 2025 Viajes Chiquita. Todos los derechos reservados.</p>
    <p>Contacto: contacto@viajeschiquita.com | Tel: +52 55 1234 5678</p>
  </div>
</footer>

</body>
</html>
