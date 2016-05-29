<?php
include 'superior.php';

$usuario = $_POST["nrodoc"];

conectar_mysql("localhost","root","","libreria");

$squery = "select * from usuario where us_login = '$usuario'";//query
$resultado = ejecutar_sql($squery);
$filas = cantFilas($squery);

if ($filas ==0)
{
	mensaje("No existe usuario.","eliminar_usuario.php","E");
}
else
{
	$dato = mysql_fetch_array($resultado, MYSQL_ASSOC); //VERRR ARRAYY
	$usuarioDoc = $dato['us_login'];
	$usuarioNombre = $dato['us_nombre'];
}

mysql_free_result($resultado);
?>

	<form method="post" action="abm_usuario.php" name="eliminausuario" id="eliminausuario" autocomplete="off">

		<table class="table " align="center">
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
					<input class="u-full-width" type="text" name="nrodoc" id="nrodoc" disabled="true" value="<?php echo $usuarioDoc;?>" size="20" maxlength="20"/>
				</td>
			</tr>

			<tr>
				<td class="tablaForm">
					<p>Nombre:</p>
				</td>
				<td class="tablaForm" >
					<input class="u-full-width" type="text" name="nombre" id="nombre" disabled="true" value="<?php echo $usuarioNombre;?>" size="20" maxlength="20"/>
				</td>
			</tr>
		</table>

		<div align="center">
			<input class="button-primary" type="submit" value="Eliminar" align="center"/>
		</div>

		<input type="hidden" name="op" id="op" value="D"></input>
		<input type="hidden" name="nrodoc" id="nrodoc" value="<?php echo $usuarioDoc;?>"></input>

	</form>

<?php
include 'inferior.php';
?>