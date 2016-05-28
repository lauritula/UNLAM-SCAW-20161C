<?php

include 'superior.php';
echo "<script language='JavaScript' src='js/alta_comentario.js'></script>";

conectar_mysql("localhost","root","","libreria");

//productos
$squery = "select * from producto";
$productos = ejecutar_sql($squery);


echo "<form method='post' action='abm_comentario.php' name='altaComentario' id='altaComentario'>";
echo "<div align='center'>
	  	<h2>Elija un producto:</h2>";

echo "<select name='cboProd' id='cboProd'>";
while($row = mysql_fetch_array($productos))
{
	echo'<OPTION VALUE="'.$row['pr_codigo'].'">'.$row['pr_descripcion'].'</OPTION>';
}
echo "</select>";
?>
		<h3>Ingrese un comentario:</h3>

		<textarea class="comentario-textArea" type="" name="txtComentario" id="txtComentario" rows="3" ></textarea><br/><br/>
		<!--<input type="text" name="txtComentario" id="txtComentario"/>-->
		<input class="button-primary" type="button" onclick="javascript:validar();" value="Comentar" align="center"/>
		</div>
		<input type="hidden" name="op" id="op" value="I"></input>
		<input type="hidden" name="hdescProd" id="hdescProd" value=""></input>

		</form>
<?php
include 'inferior.php';
?>