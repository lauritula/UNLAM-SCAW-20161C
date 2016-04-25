<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
/*session_start();
if($_SESSION['log']!=1)
header("location:login.php");
$id=$_POST['id'];
	
$host='localhost';
$user='root';
$pass='';
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
 else{echo 'Base de datos creada exitosamente<br />.';}*/
//$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE){echo 'Error al seleccionar la base<br />.';} 
 else{echo 'Base seleccionada exitosamente<br />.';}*/
 
//$consulta= mysql_query("select * from administrador WHERE id_admin = $id",$conexion) or die ("Fallo en la consulta");

//echo "<div class='sesion2'>"; para ponerlo en un div
/*while($fila=mysql_fetch_array($consulta))
{
echo $fila['nombre'];
echo " ".$fila['apellido'];
echo "<br>";
echo "<br>";
	}
//echo "</div>";*/
?>
<form action= "altaproductobd.php" method="post">
Ingrese el producto
<input type="text" name="descripcion" />
<input type="submit" value="Guardar" />
<input type="reset" name="limpiar" value="Reset" />
</form>
		
<form action= "../indexAdministrador.php" method="post"><br>
<input type="submit" value="Volver al Inicio" class="btn btn-danger" class="boton"/>
</form>
</body>
</html>