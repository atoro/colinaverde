<?php
session_start();
if ($_SESSION["$nusuario"] == "") { 
	header("location: sesion.php","_self");
} else {
include("../Conexion.php");
if ($_POST["Modificar"]){
	$insertar = "UPDATE detallemaquinaria SET nombre_maquinaria ='".$_POST["nombre_maquinaria"]."',descripcion_maquinaria ='".$_POST["descripcion_maquinaria"]."'  WHERE id  = '" .$_GET["id_maquinaria"]."' " ; 
	$sentencia=mysql_query($insertar,$conn)or die("Error al grabar : ".mysql_error);


?>
<script language="javascript">
	window.opener.document.location="detallemaquinaria.php?id_maquinaria=<?php echo $_GET["id_maquinaria"] ?>"
	window.close();
	</script>	
<?php } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Editar</title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">

</head>

<body>

<?php 
$listado = "select * from  detallemaquinaria where id ='$_GET[id_maquinaria]'";
$sentencia = mysql_query($listado,$conn);
while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
<form action="editardetallemaquinaria.php?id_maquinaria=<?php echo $_GET["id_maquinaria"]; ?>" method="post" name="form1" id="form1">
  <table width="44%" border="0" align="left" cellpadding="0" cellspacing="0">
    <tr>
      <td width="81%" valign="top"><p>
        <label>
          <input type="submit" name="Modificar" id="Modificar" value="Modificar" />
          </label>
        </p>
        <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="96" align="right" valign="top" class="textos"><span class="texto">Nombre :</span>&nbsp;</td>
            <td valign="top" class="Letras1"><span class="textobox">
              <textarea name="nombre_maquinaria" cols="40" rows="5" class="Letras1" id="breve_noticia"><?php echo $rs["nombre_maquinaria"]; ?></textarea>
            </span></td>
          </tr>
          <tr>
            <td width="31%" height="32" align="right" valign="top" class="textos"><span class="texto">descripcion  :</span>&nbsp;</td>
            <td width="69%" valign="top" class="Letras1"><span class="textobox">
              <textarea name="descripcion_maquinaria" cols="40" rows="5" class="Letras1" id="contenido_pcurso"><?php echo $rs["descripcion_maquinaria"]; ?></textarea>
            </span></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php } ?>
</body>
</html>
<?php } ?>