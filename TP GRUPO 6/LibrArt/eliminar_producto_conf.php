<?php
include 'superior.php';

$cod = $_POST["cod"];

conectar_mysql("localhost","root","","libreria");

$squery = "select * from producto where pr_codigo = '$cod'";//query
$resultado = ejecutar_sql($squery);
$filas = cantFilas($squery);

if ($filas ==0)
{
	mensaje("No existe producto.","eliminar_producto.php","E");
}
else
{
	$dato = mysql_fetch_array($resultado, MYSQL_ASSOC); //VERRR ARRAYY
	$codProducto = $dato['pr_codigo'];
	$descrProducto = $dato['pr_descripcion'];
}

mysql_free_result($resultado);
?>

	<form method="post" action="abm_producto.php" name="eliminaproducto" id="eliminaproducto">

		<table align="center">
			<tr>
				<td class="tablaForm" colspan="2">
					<h2>Eliminar Producto</h2>
				</td>
			</tr>
			<tr>
				<td class="tablaForm">
					<p>Cod. Producto:</p>
				</td>
				<td class="tablaForm" >
					<input class="u-full-width" type="text" name="cod" id="cod" disabled="true" value="<?php echo $codProducto;?>" size="20" maxlength="20"/>
				</td>
			</tr>
			<tr>
				<td class="tablaForm">
					<p>Descripcion:</p>
				</td>
				<td class="tablaForm" >
					<input class="u-full-width" type="text" name="descr" id="descr" disabled="true" value="<?php echo $descrProducto;?>" size="20" maxlength="20"/>
				</td>
			</tr>
		</table>

		<div align="center">
			<input class="button-primary" type="submit" value="Eliminar" align="center"/>
		</div>

		<input type="hidden" name="op" id="op" value="D"></input>
		<input type="hidden" name="cod" id="cod" value="<?php echo $codProducto;?>"></input>

	</form>

<?php
include 'inferior.php';
?>