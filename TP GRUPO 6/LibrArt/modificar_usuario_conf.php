
<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/modificar_usuario_conf.js'></script> ";

$usuario = $_POST["nrodoc"];

conectar_mysql("localhost","root","","libreria");

$squery = "select * from usuario where us_login = '$usuario'";//query
$resultado = ejecutar_sql($squery);
$filas = cantFilas($squery);

if ($filas ==0)
{
	mensaje("No existe usuario.","modificar_usuario.php","E");
}
else
{
	$dato = mysql_fetch_array($resultado, MYSQL_ASSOC); //VERRR ARRAYY
	$usuarioDoc = $dato['us_login'];
	$usuarioNombre = $dato['us_nombre'];
	$usuarioClave = $dato['us_password'];
	$usuarioRol = $dato['us_rol'];
}

mysql_free_result($resultado);

?>
<form method="post" action="abm_usuario.php" name="modificaausuario" id="modificaausuario" autocomplete="off">

 <table align="center">
 <tr>
<td class="tablaForm" colspan="2">
<h2>Modificar Usuario</h2>
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

 <input class="u-full-width" type="text" name="nombre" id="nombre" value="<?php echo $usuarioNombre;?>" size="20" maxlength="20"/>
 </td>
 </tr>
 
 <?php

$squery = "select * from rol";
$roles = ejecutar_sql($squery);

echo "<tr>";
echo "<td class='tablaForm'>";

echo "<p>Rol:</p>";
echo "</td>";
echo "<td class='tablaForm'>";

echo "<select name='rol' id='rol'>";
$ciclo = 1;

echo $usuarioRol;
while($row = mysql_fetch_array($roles))
{
	if ($usuarioRol == $ciclo)
	{
		$seleccionado = 'selected';
	}
	else
	{
		$seleccionado = '';
	}
	//echo'<OPTION VALUE="'.$row['ro_codigo'].'">'.$row['ro_descripcion'].'</OPTION>';
	echo"<OPTION $seleccionado VALUE=$row[ro_codigo]";
	echo">";
	echo"$row[ro_descripcion]";
	echo "</OPTION>";
	
	$ciclo ++;
}

echo "</select>";
echo " </td>";
echo " </tr>";

?>

</table>

<div align="center">
<input class="button-primary" type="submit" onclick="javascript:validar();return false;" value="Modificar" align="center"/>
</div>

<input type="hidden" name="op" id="op" value="U"></input>
<input type="hidden" name="nrodoc" id="nrodoc" value="<?php echo $usuarioDoc;?>"></input>

</form>

<?php
include 'inferior.php';
?>