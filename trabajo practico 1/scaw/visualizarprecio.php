<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visualización de precios</title>
</head>
<body>

<h1>Visualizaci&oacute;n de precios</h1>

<?php
session_start();
$host='localhost';
$user='root';
$pass='';


$semana= date("W");

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query 	= "SELECT * FROM precios WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
$query_cosulta = "SELECT descripcion, MAX(valor) maximo, MIN(valor) minimo, AVG(valor) promedio FROM precios WHERE semana = '$semana' GROUP BY descripcion";  //consulta de los productos y sus precios filtrado semana actual
$filtro_semana = mysql_query($query_cosulta, $conexion);

if ($row = mysql_fetch_array($filtro_semana))
{
 echo "<table border = '1'> \n";
 echo "<tr><td>Producto</td><td>Maximo</td><td>Minimo</td><td>Promedio</td></tr> \n";
  do 
  { 
  	echo "<tr><td>".$row["descripcion"]."</td><td>".$row["maximo"]."</td><td>".$row["minimo"]."</td><td>".$row["promedio"]."</td></tr> \n"; 
  } 
  while ($row = mysql_fetch_array($filtro_semana)); echo "</table> \n";

  } 
  else 
  	{ 
  		echo "¡ No se ha encontrado ningún registro !";
  	}
?>
<br><input type="submit" value="Volver" onClick="location.href = 'indexUsuario.php' "></br>
</body>
</html>