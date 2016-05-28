
<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/habilita_usuario.js'></script>";
?> 

<form method="post" action="habilita_usuario_conf.php" name="habUsuario" id="habUsuario">

<h3>Usuarios para habilitar</h3>
<?php

conectar_mysql("localhost","root","","libreria");

//productos
$squery = "select * from usuario where us_habilitado = 'N'";
$productos = ejecutar_sql($squery);

$filas = cantFilas($squery);

if ($filas == 0)
{
	mensaje("No hay ningun usuario para habilitar.","alta_usuario.php","E");
}
else 
{
	echo "<table class='table table-striped' align='center'>";
	echo "<tr style='background-color:green;'>";
	echo "<td>Nombre";
	echo "</td>";
	echo "<td>Documento";
	echo "</td>";
	echo "<td>";
	echo "</td>";
	echo "</tr>";
	

	while($row = mysql_fetch_array($productos))
	{
		
		echo "<tr>";
		echo "<td>";
		echo $row['us_nombre'];
		echo "</td>";
		echo "<td>";
		echo $row['us_login'];
		echo "</td>";
		echo "</tr>";
		
	}
	echo "</table>";
	echo "<br/><input type='button' onclick='javascript:habilitar();' value='Habilitar Usuarios' align='center'/>";		
}

?>


</form>
<?php
include 'inferior.php';
?>