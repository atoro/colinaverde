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
  <title>Nosotros - Colina Verde</title>
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
        <li><a class="activo" href="nosotros.php">COMPAÑIA</a></li>
        <li><a href="servicios.php">SERVICIOS</a></li>
        <li><a href="proyectos.php">PROYECTOS</a></li>
        <li><a href="maquinaria.php">MAQUINARIA</a></li>
        <li><a href="contacto.php">CONTACTO</a></li>
      </ul>
    </nav>
  </header>
  <div class="contenido">
    <div class="img_nosotros">
      <div class="menu_secundario">
        <?php 
          $listado = "select * from nosotros";
          $sentencia = mysql_query($listado,$conn);
          while($rs=mysql_fetch_array($sentencia,$mibase)){
        ?>
        <li><a href="nosotros.php?id=<?php echo $rs["id"] ?>"><?php echo $rs["nombre"] ?></a></li>
        <?php } ?>
      </div>
        <?php
          if($_GET[id] >0){ 
           $listado = "select * from nosotros where id = '$_GET[id]'";
          } else {
            $listado = "select * from nosotros";
          }  
          $sentencia = mysql_query($listado,$conn);
          if($rs=mysql_fetch_array($sentencia,$mibase)){
        ?>
      <img src="imagenes/nosotros/<?php echo $rs["id"] ?>.jpg">
    </div>
    <div class="texto">
      
      <h2><?php $texto = str_replace("\r\n","<br>",$rs["titulo"]); echo $texto ?></h2>
      <P><?php $texto = str_replace("\r\n","<br>",$rs["contenido"]); echo $texto ?></P>
      <?php } ?>
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
