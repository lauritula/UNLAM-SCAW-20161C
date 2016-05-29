<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/eliminar_usuario.js'></script>"; 
?>
	<form method="post" action="eliminar_usuario_conf.php" name="eliminarusuario" id="eliminarusuario" autocomplete="off">

		<table align="center">
			<tr>
				<td class="tablaForm" colspan="2">
					<h2>Eliminar Usuario</h2>
				</td>
			</tr>
			<tr>
				<td class="tablaForm">
					<p>Documento:</p>
				</td>
				<td class="tablaForm" >
					<input class="u-full-width" type="text" name="nrodoc" id="nrodoc" value="" size="20" maxlength="20"/>
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