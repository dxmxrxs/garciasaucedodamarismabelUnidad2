<?php
session_start();

// Opcional: comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Panel de Usuario 🧳</title>
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

.contenido-principal {
  display: flex;
  flex-wrap: wrap;
  gap: 2em;
  justify-content: center;
  align-items: flex-start;
  margin-bottom: 3rem;
}

/* CARRUSEL */
.carrusel {
  position: relative;
  width: 100%;
  max-width: 420px;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(20, 42, 49, 0.2);
  flex: 1 1 420px;
  background: #e8f0f4;
}

.slide {
  display: none;
}
.slide img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 20px;
}
.slide.activo {
  display: block;
}

button.prev,
button.next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(20, 42, 49, 0.7);
  border: none;
  padding: 10px 16px;
  border-radius: 50%;
  color: white;
  font-size: 1.6em;
  cursor: pointer;
  z-index: 2;
}

button.prev:hover,
button.next:hover {
  background-color: #4a949b;
}

button.prev { left: 14px; }
button.next { right: 14px; }

/* INFO FLORERÍA */
.info-floreria {
  flex: 1 1 420px;
  max-width: 480px;
  padding: 2em 2.5em;
  background: #ffffff;
  border-radius: 20px;
  box-shadow: 0 6px 18px rgba(20, 42, 49, 0.1);
  font-size: 1.1rem;
  text-align: left;
  color: #142a31;
}

.info-floreria h2 {
  color: #4a949b;
  margin-bottom: 1rem;
  font-weight: 700;
  font-size: 1.9rem;
  letter-spacing: 1px;
}

/* CARDS */
.cards-row {
  display: flex;
  justify-content: center;
  gap: 2em;
  flex-wrap: wrap;
  max-width: 1000px;
  margin: 0 auto;
}

.card {
  background: #e8f0f4;
  border-radius: 15px;
  box-shadow: 0 6px 12px rgba(20, 42, 49, 0.15);
  padding: 2em 2.5em;
  margin: 1em 0;
  width: 260px;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  color: #142a31;
  text-align: center;
  user-select: none;
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(74, 148, 155, 0.5);
  background: #d5e9ef;
}

.card h3 {
  color: #75d3ce;
  margin-bottom: 0.8rem;
  font-weight: 700;
  font-size: 1.4rem;
}

.card ul {
  list-style: none;
  padding-left: 0;
  color: #142a31dd;
  font-size: 1rem;
}

.card ul li {
  margin-bottom: 0.5rem;
}

.card p {
  font-size: 1rem;
  line-height: 1.4;
  color: #142a31dd;
}

/* FOOTER */
.footer {
  background-color: #142a31;
  color: #75d3ce;
  text-align: center;
  padding: 15px 20px;
  font-family: 'Comic Sans MS', cursive;
  width: 100%;
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


<nav>
  <div class="panel-box">
    <h1>👤 ¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Has iniciado sesión correctamente 🧳</p>
  </div>
    <ul style="display: flex; align-items: center; gap: 15px; list-style: none;">
      <li>
    <form action="error.php" method="GET" style="margin: 0;">
      <button class="nav-button">Mensajes</button>
    </form>
  </li>
  <li>
    <form action="cerrar_sesion.php" method="POST" style="margin: 0;">
      <button type="submit" class="nav-button">Cerrar Sesión</button>
    </form>
  </li>

  </ul>
</nav>

<main>
  <h1>Date Vistazo a nuestros viajes</h1>

  <div class="contenido-principal">
    <div class="carrusel">
      <div class="slide activo">
        <img src="img/pexels-kudi-32622213.jpg" alt="Curso 1" />
      </div>
      <div class="slide">
        <img src="img/torredepizza.jpg" alt="Curso 2" />
      </div>
      <div class="slide">
        <img src="img/pexels-onthecrow-30638771.jpg" alt="Curso 3" />
      </div>
      <button class="prev" aria-label="Anterior">❮</button>
      <button class="next" aria-label="Siguiente">❯</button>
    </div>

    <!-- Información de la agencia de viajes -->
<div class="info-floreria" tabindex="0">
  <h2>Sobre Viajes Mundo 🌍✈️</h2>
  <p>En <strong>Viajes Mundo</strong> creemos que cada destino es una aventura única. Nos dedicamos a planificar experiencias inolvidables para todo tipo de viajeros: desde escapadas cortas hasta largos recorridos por el mundo.</p>
</div>

<!-- Cards dinámicas alineadas horizontalmente -->
<div class="cards-row" role="list">
  <div class="card" tabindex="0" role="listitem">
    <h3>🏝️ Misión</h3>
    <p>Ofrecer servicios de viaje personalizados que inspiren a descubrir nuevos lugares con comodidad, seguridad y emoción.</p>
  </div>
  <div class="card" tabindex="0" role="listitem">
    <h3>🌐 Visión</h3>
    <p>Ser la agencia de viajes más confiable y preferida, conectando personas con destinos inolvidables alrededor del mundo.</p>
  </div>
  <div class="card" tabindex="0" role="listitem">
    <h3>🧳 Nuestros Valores</h3>
    <ul>
      <li>🌟 Pasión por explorar</li>
      <li>🤝 Atención personalizada</li>
      <li>🎨 Creatividad en la planificación</li>
      <li>💧 Compromiso con el turismo responsable</li>
    </ul>
  </div>
  <div class="card" tabindex="0" role="listitem">
    <h3>✈️ ¿Sabías que...?</h3>
    <p>El turismo sostenible ayuda a proteger los destinos para las futuras generaciones. ¡Viaja con conciencia y haz que cada viaje cuente!</p>
  </div>
</div>
  </div>
</main>

<footer class="footer">
  <div class="footer-content">
    <p>© 2025 Viajes Chiquita. Todos los derechos reservados.</p>
    <p>Contacto: contacto@viajeschiquita.com | Tel: +52 55 1234 5678</p>
  </div>
</footer>

<script>
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');
  let index = 0;

  function mostrarSlide(i) {
    slides.forEach(slide => slide.classList.remove('activo'));
    slides[i].classList.add('activo');
  }

  prevBtn.addEventListener('click', () => {
    index = (index - 1 + slides.length) % slides.length;
    mostrarSlide(index);
  });

  nextBtn.addEventListener('click', () => {
    index = (index + 1) % slides.length;
    mostrarSlide(index);
  });

  setInterval(() => {
    index = (index + 1) % slides.length;
    mostrarSlide(index);
  }, 6000);
</script>

</body>
</html>
