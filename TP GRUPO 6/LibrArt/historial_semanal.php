
<?php
//INCLUDE 'include/conexion.php';
?>
<!--<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>

	<LINK REL=StyleSheet HREF="estilos/estilos.css" TYPE="text/css" MEDIA=screen>
<script language="JavaScript" src="js/historial_semanal.js"></script> 

</head>

<body>

<form method="post" action="historial_semanal_resp.php" name="histSemanal" id="histSemanal">

 <table align="center">
 <tr>
<td class="tablaForm" colspan="2">
<h2>Historial Semanal</h2>
</td>
</tr>-->
<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/historial_semanal.js'></script> ";


conectar_mysql("localhost","root","","libreria");

//productos
$squery = "select distinct pp_semana from producto_precio";
$semanas = ejecutar_sql($squery);

echo "<form method='post' action='historial_semanal_resp.php' name='histSemanal' id='histSemanal'>";
echo "<h2>Historial Semanal</h2>";
echo "<table class='table table-striped' align='center'>";
echo "<tr>";
echo "<td class='tablaForm'>";

echo "<p>Elija una semana:</p>";
echo "</td>";
echo "<td class='tablaForm'>";

echo "<select name='cboSemana' id='cboSemana'>";

while($row = mysql_fetch_array($semanas))
{
	echo'<OPTION VALUE="'.$row['pp_semana'].'">'.$row['pp_semana'].'</OPTION>';
}
echo "</select>";
echo " </td>";
echo " </tr>";


?>

 <tr>
 
</table>
<div align="center">
<input class="button-primary" type="button" onclick="javascript:validar();" value="Enviar" align="center"/>

</div>
<input type="hidden" name="op" id="op" value="I"></input>
<input type="hidden" name="hdescProd" id="hdescProd" value=""></input>

</form>

<?php
include 'inferior.php';
?>