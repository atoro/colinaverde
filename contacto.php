<?php
 include("Conexion.php");
  $listado = "select * from pie";
  $sentencia = mysql_query($listado,$conn);
  while($rs=mysql_fetch_array($sentencia,$mibase)){
    $direccion = str_replace("\r\n","<br>",$rs["direccion"]); 
    $correo = str_replace("\r\n","<br>",$rs["correo"]); 
    $fono = str_replace("\r\n","<br>",$rs["fono"]); 
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Contacto - Colina Verde</title>
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
        <li><a href="index.php">INICIO</a></li>
        <li><a href="nosotros.php">COMPAÑIA</a></li>
        <li><a href="servicios.php">SERVICIOS</a></li>
        <li><a href="proyectos.php">PROYECTOS</a></li>
        <li><a href="maquinaria.php">MAQUINARIA</a></li>
        <li><a class="activo" href="contacto.php">CONTACTO</a></li>
      </ul>
    </nav>
  </header>
  <div class="contenido">
    <div class="img_nosotros">
      <img src="imagenes/contacto/contacto.jpg">
    </div>
    <div class="texto">
      <form action="contacto.php" method="post" onSubmit="MM_validateForm('name','','R','message','','R');return document.MM_returnValue;return document.MM_returnValue">
          <input class="input" name="Nombre" type="text" placeholder="Nombre"/>
          <input class="input" name="Mail" type="text" placeholder="E-mail"/>  
          <input class="input" name="Telefono" type="text" placeholder="Teléfono"/>
          <textarea name="Mensaje" id="Mensaje" class="mensaje" placeholder="Mensaje"></textarea>
          <input class="enviar" name="Enviar" type="submit" value="Enviar"/>
      </form>
    </div>
  </div>
  </div>
  <div class="color"></div>
  <footer>
    <p><?php echo $direccion ?></p>
    <p><?php echo $correo ?></p>
    <p><?php echo $fono ?></p>
  </footer>
</body>
</html>
<?php
  if ($_POST["Enviar"]){
    $destinatario = "msilva@colinaverde.cl"; 
    $nombre = $_POST["Nombre"];
    $telefono = $_POST["Telefono"];
    $mail = $_POST["Mail"];
    $Telefono = $_POST["Telefono"];
    $Mensaje = $_POST["Mensaje"];
    $asunto = "Consulta sitio web"; 
    $cuerpo = "
    <table width=100% border=0 cellspacing=0 cellpadding=0>
      <tr><td>NOMBRE: $nombre</td></tr>
      <tr><td>TELEFONO: $telefono</td></tr>
      <tr><td>MAIL: $mail</td></tr>
      <tr><td>CONSULTA: $Mensaje</td></tr>
    </table>";
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
    $headers .= "From: $nombre <$mail>\r\n"; 
    mail($destinatario,$asunto,$cuerpo,$headers);
    echo "<script> alert('Su consulta fue enviada correctamente'); </script>";
    
    
  }
?>
