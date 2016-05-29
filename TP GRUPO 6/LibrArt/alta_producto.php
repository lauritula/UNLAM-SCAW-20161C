
<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/alta_producto.js'></script> ";
?>		
		<form method="post" action="abm_producto.php" name="altaproducto" id="altaproducto" autocomplete="off">

			<table class="" align="center">
			 	<tr>
					<td class="tablaForm" colspan="2">
						<h2>Alta de Producto</h2>
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
			 	<tr>
			 		<td class="tablaForm">
			 			<p>Descripcion:</p>
			 		</td>
			 		<td class="tablaForm" >
						<input class="u-full-width" type="text" name="descr" id="descr" value="" size="20" maxlength="20"/>
			 		</td>
			 	</tr>
			</table>
			<div align="center">
				<input class="button-primary" type="button" onclick="javascript:validar();" value="Enviar" align="center"/>
			</div>
			<input type="hidden" name="op" id="op" value="I"></input>

		</form>
<?php
include 'inferior.php';
?>