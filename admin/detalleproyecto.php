<?php
session_start();
include("../Conexion.php");
if ($_POST["Grabar"]){
	$insertar="INSERT INTO detalleproyecto (nombre_proyecto,descripcion_proyecto,id_proyecto) 
		VALUES('$_POST[nombre_proyecto]','$_POST[descripcion_proyecto]','$_GET[id_proyecto]')";
		$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un nuevo link: ".mysql_error);

}
if ($_GET["fun"] =="eli"){
	$insertar = "delete from detalleproyecto WHERE id = '".$_GET["id"]."' " ; 
	$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
	
	$dir="../imagenes/proyectos/proyectos/". $_GET["id"] .".jpg";
	if(file_exists($dir)) { 
		if(unlink($dir)) 
			print ""; 
		} else 
			print "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
<!-- 
function openWindow(url, name) {
popupWin = window.open(url, name, 'scrollbars,resizable,width=650,height=500')
}

// -->


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<title>Admin</title>
<link href="../letras.css" rel="stylesheet" type="text/css" />
<link href="../css/letras.css" rel="stylesheet" type="text/css" />
<link href="letras.css" rel="stylesheet" type="text/css" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href="../estilos-varios.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="detalleproyecto.php?id_proyecto=<?php echo $_GET["id_proyecto"] ?>">
  <table width="50%" border="1" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="textotitulospropiedades">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="25%" class="texto">Nombre Proyecto</td>
          <td width="75%"><label for="nombre_proyecto"></label>
            <input name="nombre_proyecto" type="text" id="nombre_proyecto" size="45" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto">Descripción Proyecto</td>
          <td><label for="Tipo"><span class="textobox">
            <textarea name="descripcion_proyecto" cols="45" rows="5" class="Letras1" id="descripcion_proyecto"></textarea>
          </span></label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="Grabar" type="submit" class="botones" id="Grabar" value="Grabar" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<p align="center"><a href="proyectos.php" class="texto">Volver</a></p>

 <?php 
$listado = "select * from  detalleproyecto where id_proyecto = '$_GET[id_proyecto]'";
$sentencia = mysql_query($listado,$conn);
while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td width="25%" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><a href="javascript:openWindow('editardetalleproyecto.php?id_proyecto=<?php echo $rs["id"]; ?>')"><img src="Lapiz.png" width="16" height="16" border="0" /></a><span class="texto"> Editar</span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="124" height="171" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><a href="../imagenes/proyectos/proyectos/Upload_foto.php?id=<?php echo $rs["id"]; ?>&amp;id_proyecto=<?php echo $_GET["id_proyecto"]; ?>" class="texto">Cambiar foto</a></td>
              </tr>
              <tr>
                <td><img src="../imagenes/proyectos/proyectos/<?php echo $rs["id"]; ?>.jpg" width="124" height="124" /></td>
              </tr>
            </table></td>
            <td width="21">&nbsp;</td>
            <td width="1175" rowspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="48" valign="top"><p class="texto">
                  <?php $texto = str_replace("\r\n","<br>",$rs["nombre_proyecto"]); echo $texto ?>
                </p></td>
              </tr>
              <tr>
                <td><span class="texto">
                  <?php $texto = str_replace("\r\n","<br>",$rs["descripcion_proyecto"]); echo $texto ?>
                </span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="138" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><a href="../imagenes/proyectos/proyectos/grande/Upload_foto.php?id=<?php echo $rs["id"]; ?>&amp;id_proyecto=<?php echo $_GET["id_proyecto"]; ?>" class="texto">Cambiar foto</a></td>
              </tr>
              <tr>
                <td><img src="../imagenes/proyectos/proyectos/grande/<?php echo $rs["id"]; ?>.jpg" width="195" height="213" /></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><a href="detalleproyecto.php?id=<?php echo $rs["id"]; ?>&amp;fun=eli&amp;id_proyecto=<?php echo $_GET["id_proyecto"]; ?>" onclick=" return confirm('Esta Seguro que desea eliminar?');"><img src="b_drop.png" width="16" height="16" border="0" />  </a><span class="texto">Eliminar</span></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
   
  </tr>
 
</table>
<p>&nbsp;</p>
 <p>
   <?php } ?>
 </p>
</body>
</html>