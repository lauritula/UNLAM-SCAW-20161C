<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/historial_semanal_resp.js'></script> ";

 
$semana = $_POST["cboSemana"]; 

echo "<form method='post' action='historial_precio_resp.php' name='hisPrecio' id='hisPrecio'>";

echo "<h3>Historial de Precios de la semana $semana</h3>";
 
conectar_mysql("localhost","root","","libreria");

//productos
$squery = "select * from producto as pr inner join producto_precio as pp on (pr.pr_codigo = pp.pp_codigo_prod) where pp_semana = '$semana'";
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
$squery = "select pr_descripcion as prod, max(pp_precio) as precio_max, min(pp_precio) as precio_min, avg(pp_precio) as promedio, pp_semana from producto_precio as pp inner join producto as pr on (pr.pr_codigo = pp.pp_codigo_prod)group by pp.pp_codigo_prod having pp.pp_semana = '$semana'";

$precioMax = ejecutar_sql($squery);

	echo "<br/><h3>Maximos, Minimos, Promedios</h3>";

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
	
	

?>


</form>
<?php
include 'inferior.php';
?>