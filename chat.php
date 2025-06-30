<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Chatbot Florería</title>
  <style>
    /* Estilos para el chatbot */
    #chatbot {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 300px;
      max-height: 400px;
      border: 2px solid #d63384;
      border-radius: 10px;
      background: #fff0f5;
      box-shadow: 0 5px 15px rgba(198, 75, 150, 0.5);
      font-family: 'Comic Sans MS', cursive;
      display: flex;
      flex-direction: column;
    }

    #chat-header {
      background: #d63384;
      color: white;
      padding: 10px;
      border-radius: 10px 10px 0 0;
      font-weight: bold;
      text-align: center;
    }

    #chat-log {
      flex: 1;
      overflow-y: auto;
      padding: 10px;
      font-size: 0.9em;
      color: #5c005c;
    }

    #chat-log p {
      margin: 5px 0;
    }

    #chat-log .usuario {
      text-align: right;
      color: #ff69b4;
      font-weight: bold;
    }

    #chat-log .bot {
      text-align: left;
      color: #800040;
    }

    #chat-input-container {
      display: flex;
      border-top: 1px solid #d63384;
    }

    #chat-input {
      flex: 1;
      border: none;
      padding: 10px;
      font-size: 1em;
      border-radius: 0 0 0 10px;
      outline: none;
    }

    #chat-send {
      background: #d63384;
      border: none;
      color: white;
      padding: 0 20px;
      cursor: pointer;
      font-weight: bold;
      border-radius: 0 0 10px 0;
      transition: background 0.3s;
    }

    #chat-send:hover {
      background: #ff4b61;
    }
  </style>
</head>
<body>

<!-- Aquí va el chatbot -->
<div id="chatbot">
  <div id="chat-header">Florería 🌸 Chatbot</div>
  <div id="chat-log">
    <p class="bot">¡Hola! Soy el asistente de tu florería. ¿En qué puedo ayudarte?</p>
  </div>
  <div id="chat-input-container">
    <input type="text" id="chat-input" placeholder="Escribe tu pregunta..." autocomplete="off" />
    <button id="chat-send">Enviar</button>
  </div>
</div>

<script>
  const chatLog = document.getElementById('chat-log');
  const chatInput = document.getElementById('chat-input');
  const chatSend = document.getElementById('chat-send');

  // Función para agregar mensajes al chat
  function agregarMensaje(texto, clase) {
    const p = document.createElement('p');
    p.textContent = texto;
    p.className = clase;
    chatLog.appendChild(p);
    chatLog.scrollTop = chatLog.scrollHeight; // Auto scroll
  }

  // Respuestas predefinidas para preguntas comunes
  function obtenerRespuesta(mensaje) {
    mensaje = mensaje.toLowerCase();

    if (mensaje.includes('horario')) {
      return 'Nuestro horario es de lunes a viernes de 9am a 7pm, y sábados de 9am a 3pm.';
    }
    if (mensaje.includes('envío') || mensaje.includes('delivery')) {
      return 'Hacemos envíos locales gratis en pedidos mayores a $500.';
    }
    if (mensaje.includes('productos') || mensaje.includes('flores')) {
      return 'Contamos con rosas, tulipanes, lirios y arreglos personalizados.';
    }
    if (mensaje.includes('contacto') || mensaje.includes('teléfono')) {
      return 'Puedes llamarnos al 123-456-7890 o escribir a contacto@floreria.com.';
    }
    if (mensaje.includes('precio') || mensaje.includes('costo')) {
      return 'Los precios varían según el arreglo, pero nuestros arreglos empiezan desde $200.';
    }
    if (mensaje.includes('gracias') || mensaje.includes('thank')) {
      return '¡Con gusto! Si tienes más preguntas, aquí estaré.';
    }

    return 'Disculpa, no entendí tu pregunta. ¿Puedes intentar con otras palabras?';
  }

  // Manejar envío del mensaje
  function enviarMensaje() {
    const mensaje = chatInput.value.trim();
    if (!mensaje) return;
    
    agregarMensaje(mensaje, 'usuario');
    chatInput.value = '';

    setTimeout(() => {
      const respuesta = obtenerRespuesta(mensaje);
      agregarMensaje(respuesta, 'bot');
    }, 500); // Simula tiempo de respuesta
  }

  // Eventos
  chatSend.addEventListener('click', enviarMensaje);
  chatInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') enviarMensaje();
  });
</script>

</body>
</html>
