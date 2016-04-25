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

$id_empleado = $_POST['id_empleado'];
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query 	= "SELECT * FROM producto WHERE descripcion = '$descripcion'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
$query_cambia = "DELETE FROM empleado WHERE  id_empleado = '$id_empleado'";
$consulta_cambia = mysql_query($query_cambia, $conexion);
			
			
if(!$consulta_cambia)
{
	echo 'No se pudo eliminar el empleado';
}
	else
	{
		echo"<br>"; 
		echo 'Empleado eliminado con exito';
		//header("location:cargaprecios.php");
	}	
?>
</body>
</html>