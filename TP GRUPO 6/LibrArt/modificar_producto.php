<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/modificar_producto.js'></script> ";
?>

<form method="post" action="modificar_producto_conf.php" name="modifproducto" id="modifproducto" autocomplete="off">

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