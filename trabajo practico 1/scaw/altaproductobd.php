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

$descripcion = $_POST['descripcion'];

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
$query 	= "SELECT * FROM precios WHERE descripcion = '$descripcion'"; //busca el producto en la tabla
$consulta = mysql_query($query, $conexion);
$cant = mysql_num_rows($consulta); 
//$fila = mysql_fetch_array($consulta);
if ($cant != 0) 
{ //YA EXISTE
	echo "Error: Producto repetido"; 
	//header("location:altacliente.php"); 
}
else
{
	$query_cambia = "INSERT INTO producto VALUES ('','$descripcion')";
	$consulta_cambia = mysql_query($query_cambia, $conexion);
			
	if(!$consulta_cambia)
	{
		echo 'Ingreso fallido';
	}
	else
	{
		echo"<br>"; 
		echo 'Producto insertado con exito';
	//header("location:cargaprecios.php");
	}
}	
?>
</body>
</html>