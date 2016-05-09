<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
session_start();
$host='localhost';
$user='root';
$pass='';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contrasenia = $_POST['contrasenia'];

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base

$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
$query 	= "SELECT * FROM usuario WHERE contrasenia = '$contrasenia'"; //busca el producto en la tabla
$consulta = mysql_query($query, $conexion);
$cant = mysql_num_rows($consulta); 
$fila = mysql_fetch_array($consulta);
if ($cant != 0) 
 //YA EXISTE
	header("location:contrasenia_repetida.php"); 
	
	else{
	$query_cambia = "INSERT INTO usuario VALUES ('','empleado','$contrasenia')";
	$consulta_cambia = mysql_query($query_cambia, $conexion);
	
	//cargar la id del usuario
	$usuario= "SELECT id FROM usuario WHERE contrasenia = '$contrasenia'";
	$consulta_busca_usuario= mysql_query($usuario, $conexion);
	$fila2 = mysql_fetch_array($consulta_busca_usuario);
	
	$query_cambia2 = "INSERT INTO empleado VALUES ('$fila2[id]','$nombre','$apellido', 'pendiente')";
	$consulta_cambia2 = mysql_query($query_cambia2, $conexion);

	if(!$consulta_cambia || !$consulta_cambia2)
	{
		echo 'Ingreso fallido';
	}
	else
	{
		echo"<br>";
		echo 'sus datos han sido enviados al administrador para su ingreso al sistema';
	}
	}
?>
<form action= "login.php" method="post">
<br><br>
<input type="submit" value="Aceptar"/>
</form>	
</body>
</html>