
<?php
INCLUDE 'include/conexion.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title></title>

		<LINK REL=StyleSheet HREF="estilos/estilos.css" TYPE="text/css" MEDIA=screen>
		<script language="JavaScript" src="js/historial_semanal.js"></script> 
	</head>

<body>

	<form method="post" action="historial_semanal_resp.php" name="histSemanal" id="histSemanal" autocomplete="off">

		<table align="center">
			<tr>
				<td class="tablaForm" colspan="2">
					<h2>Comentario por Producto</h2>
				</td>
			</tr>
			<?php

			conectar_mysql("localhost","root","","libreria");
			//productos
			$squery = "select distinct pp_semana from producto_precio";
			$semanas = ejecutar_sql($squery);

			echo "<tr>
				  	<td class='tablaForm'>
						<p>Elija producto:</p>
					</td>
					<td class='tablaForm'>
						<select name='cboSemana' id='cboSemana'>";
							while($row = mysql_fetch_array($semanas))
							{
								echo'<OPTION VALUE="'.$row['pp_semana'].'">'.$row['pp_semana'].'</OPTION>';
							}
			echo "		</select>
			 		</td>
			 	  </tr>";
			?>
			<tr> 
		</table>

		<div align="center">
			<input class="button-primary" type="button" onclick="javascript:validar();" value="Enviar" align="center"/>
		</div>
		<input type="hidden" name="op" id="op" value="I"></input>
		<input type="hidden" name="hdescProd" id="hdescProd" value=""></input>

	</form>
</body>
</html>