<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Colina Verde</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="imagenes/icon.png">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/responsiveslides.min.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
      });

    });
  </script>
</head>
<body>
  <header>
    <div class="logo">
      <img src="imagenes/logo.png">
    </div>
    <nav>
      <ul>
        <li><a class="activo" href="index.php">INICIO</a></li>
        <li><a href="nosotros.php">COMPAÑIA</a></li>
        <li><a href="servicios.php">SERVICIOS</a></li>
        <li><a href="proyectos.php">PROYECTOS</a></li>
        <li><a href="maquinaria.php">MAQUINARIA</a></li>
        <li><a href="contacto.php">CONTACTO</a></li>
      </ul>
    </nav>
  </header>
  <div id="wrapper">
    <!-- Slideshow 1 -->
    <ul class="rslides" id="slider1">
      <li>
        <div class="texto">
          <h2>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum</h2>
        </div>
        <img src="imagenes/slide/1.jpg">
      </li>
      <li>
        <div class="texto">
          <h2>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum</h2>
        </div>
        <img src="imagenes/slide/2.jpg">
      </li>
      <li>
        <div class="texto">
          <h2>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum</h2>
        </div>
        <img src="imagenes/slide/3.jpg">
      </li>
    </ul>
  </div>
  <div class="color"></div>
  <footer>
    <p>Dirección: lorem Ipsum 1234 - Rancagua</p>
    <p>Correo: contacto@colinalverde.cl</p>
    <p>Fono: 72 2 123456 - +56 9 1234 4567 </p>
  </footer>
</body>
</html>
