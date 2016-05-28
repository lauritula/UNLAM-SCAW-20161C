<?php
/*INCLUDE 'include/phpfunciones.php';
INCLUDE 'include/conexion.php';
session_start();*/
include 'superior.php';

$operacion = $_POST["op"]; 

$usuario = $_SESSION["usuarioDoc"];


if ($operacion == "I")           
{
	$descripcion = $_POST["hdescProd"];
	$precio = $_POST["txtprecio"];
	$codigo = $_POST["cboProd"];
	
}

conectar_mysql("localhost","root","","libreria");

switch($operacion) { 


case "I":
	$squery = "SELECT DATEDIFF(now(),'2016-04-10') as semana";
	$semanas = ejecutar_sql($squery);
	
	while($row = mysql_fetch_array($semanas))
	{
		$dias = $row['semana'];
	}
	
	$semana = ($dias/7) + 1;
	
	//le saco los decimales
	$semana = intval($semana);

    $squery = "insert into producto_precio(pp_codigo_prod,pp_precio,pp_fecha_cambio,pp_semana,pp_usuario)values('$codigo','$precio',now(),'$semana','$usuario')";//query
	ejecutar_sql($squery);
			
	mensaje("Precio cargado correctamente.","alta_precio.php","C");
		  
	break;

}
include 'inferior.php';
?>

<!--<html>
<head></head>
<body>
</body>
</html>-->