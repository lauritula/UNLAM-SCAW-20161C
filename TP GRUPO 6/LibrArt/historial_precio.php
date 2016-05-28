<?php

echo "<script language='JavaScript' src='js/historial_precio.js'></script> ";
include 'superior.php';


conectar_mysql("localhost","root","","libreria");

//productos
$squery = "select * from producto as pr inner join producto_precio as pp on (pr.pr_codigo = pp.pp_codigo_prod)";
$productos = ejecutar_sql($squery);


	echo "<table class='table table-striped' align='center'>";
	echo "<tr style='background-color:green;'>";
	echo "<td>producto";
	echo "</td>";
	echo "<td>precio";
	echo "</td>";
	echo "<td>usuario";
	echo "</td>";
	echo "<td>semana";
	echo "</td>";
	echo "<td>fecha del cambio";
	echo "</td>";
	echo "</tr>";
	

while($row = mysql_fetch_array($productos))
{
	
	echo "<tr>";
	echo "<td>";
	echo $row['pr_descripcion'];
	echo "</td>";
	echo "<td>";
	echo $row['pp_precio'];
	echo "</td>";
	echo "<td>";
	echo $row['pp_usuario'];
	echo "</td>";
	echo "<td>";
	echo $row['pp_semana'];
	echo "</td>";
	echo "<td>";
	echo $row['pp_fecha_cambio'];
	echo "</td>";
	echo "</tr>";
	
}
	echo "</table>";

//maximos miinmos y promedios
$squery = "select pr_descripcion as prod, max(pp_precio) as precio_max, min(pp_precio) as precio_min, avg(pp_precio) as promedio from producto_precio as pp inner join producto as pr on (pr.pr_codigo = pp.pp_codigo_prod)group by pp_codigo_prod";

$precioMax = ejecutar_sql($squery);

	echo "<table align='center'>";
	echo "<tr>";
	echo "<td colspan=2>";
	echo "<h5>Maximos, Minimos, Promedios</h5>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";

	echo "<table class='table table-striped' align='center'>";
	echo "<tr style='background-color:green;'>";
	echo "<td>producto";
	echo "</td>";
	echo "<td>precio maximo";
	echo "</td>";
	echo "</td>";
	echo "<td>precio minimo";
	echo "</td>";
	echo "</td>";
	echo "<td>precio promedio";
	echo "</td>";
	echo "</tr>";
	

while($row = mysql_fetch_array($precioMax))
{
	
	echo "<tr>";
	echo "<td>";
	echo $row['prod'];
	echo "</td>";
	echo "<td>";
	echo $row['precio_max'];
	echo "</td>";
	echo "<td>";
	echo $row['precio_min'];
	echo "</td>";
	echo "<td>";
	echo $row['promedio'];
	echo "</td>";
	echo "</tr>";
	
}
echo "</table>";
	
	
include 'inferior.php';
?>