<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/eliminar_producto.js'></script> ";
?>

	<form method="post" action="eliminar_producto_conf.php" name="eliminarproducto" id="eliminarproducto">

		<table align="center">
			<tr>
				<td class="tablaForm" colspan="2">
					<h2>Eliminar producto</h2>
				</td>
			</tr>
			<tr>
				<td class="tablaForm">
					<p>Cod. Producto:</p>
				</td>
				<td class="tablaForm" >
					<input class="u-full-width" type="text" name="cod" id="cod" value="" size="20" maxlength="20"/>
				</td>
			</tr>
		</table>

		<div align="center">
			<input class="button-primary" type="button" onclick="javascript:validar();" value="Comprobar" align="center"/>
		</div>
	</form>

<?php
include 'inferior.php';
?>