
<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/alta_precio.js'></script> ";
?>

		<form method="post" action="abm_precio.php" name="altaPrecio" id="altaPrecio" autocomplete="off">

		 	<table class="table" align="center">
		 		<tr>
		 			<td class="tablaForm" colspan="2">
						<h2>Alta de Precio</h2>
					</td>
				</tr>
		 		<?php

					conectar_mysql("localhost","root","","libreria");

					//productos
					$squery = "select * from producto";
					$productos = ejecutar_sql($squery);

					echo "<tr>";
					echo "<td class='tablaForm'>";

					echo "<p>Elija un producto:</p>";
					echo "</td>";
					echo "<td class='tablaForm'>";

					echo "<select name='cboProd' id='cboProd'>";

					while($row = mysql_fetch_array($productos))
					{
						echo'<OPTION VALUE="'.$row['pr_codigo'].'">'.$row['pr_descripcion'].'</OPTION>';
					}
					echo "</select>";
					echo " </td>";
					echo " </tr>";
				?>

		 		<td class="tablaForm">
		 			<p>Precio del Producto:</p>
		 		</td>
		 		<td class="tablaForm" >
		 			<input class="u-full-width" type="text" name="txtprecio" id="txtprecio" value="" size="10" maxlength="10"/>
		 		</td>
		 		</tr>
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