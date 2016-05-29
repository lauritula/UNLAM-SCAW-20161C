
<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/modificar_producto_conf.js'></script> ";

$codProducto = $_POST["cod"];

conectar_mysql("localhost","root","","libreria");

$squery = "select * from producto where pr_codigo = '$codProducto'";//query
$resultado = ejecutar_sql($squery);
$filas = cantFilas($squery);

if ($filas ==0)
{
	mensaje("No existe producto.","modificar_producto.php","E");
}
else
{
	$dato = mysql_fetch_array($resultado, MYSQL_ASSOC); //VERRR ARRAYY
	$codProducto = $dato['pr_codigo'];
	$descrProducto = $dato['pr_descripcion'];
}

mysql_free_result($resultado);

?>
<form method="post" action="abm_producto.php" name="modificaproducto" id="modificaproducto" autocomplete="off">

 <table align="center">
 <tr>
<td class="tablaForm" colspan="2">
<h2>Modificar Producto</h2>
</td>
</tr>
 <tr>
 <td class="tablaForm">
 <p>Cod. Producto:</p>
 </td>
 <td class="tablaForm" >

 <input class="u-full-width" type="text" name="cod" disabled = "true" id="cod"  value="<?php echo $codProducto;?>" size="20" maxlength="20"/>
 </td>
 </tr>

 <tr>
 <td class="tablaForm">
 <p>Descripcion:</p>
 </td>
 <td class="tablaForm" >

 <input class="u-full-width" type="text" name="descr" id="descr"  value="<?php echo $descrProducto;?>" size="20" maxlength="20"/>
 </td>
 </tr>
 <?

?>
</table>

<div align="center">
<input class="button-primary" type="submit" onclick="javascript:validar();return false;" value="Modificar" align="center"/>
</div>

<input type="hidden" name="op" id="op" value="U"></input>
<input type="hidden" name="cod" id="cod" value="<?php echo $codProducto;?>"></input>



</form>

<?php
include 'inferior.php';
?>