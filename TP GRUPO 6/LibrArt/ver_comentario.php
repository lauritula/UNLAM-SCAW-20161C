<?php
/*
include 'superior.php';
echo "<script language='JavaScript' src='js/alta_comentario.js'></script>";

conectar_mysql("localhost","root","","libreria");

//productos
$squery = "select * from producto";
$productos = ejecutar_sql($squery);


echo "<form method='post' action='abm_comentario.php' name='altaComentario' id='altaComentario'>";
echo "<h2>Elija un producto:</h2>";
echo "<select name='cboProd' id='cboProd'>";
while($row = mysql_fetch_array($productos))
{
	echo'<OPTION VALUE="'.$row['pr_codigo'].'">'.$row['pr_descripcion'].'</OPTION>';
}
echo "</select>";
?>
		<h3>Ingrese un comentario:</h3>

		<textarea  type="" name="txtComentario" id="txtComentario" rows="3" size="500" maxlength="200"></textarea>

		</table>
		<div align="center">
			<input class="button-primary" type="button" onclick="javascript:validar();" value="Comentar" align="center"/>
		</div>
		<input type="hidden" name="op" id="op" value="I"></input>
		<input type="hidden" name="hdescProd" id="hdescProd" value=""></input>

		</form>
<?php
include 'inferior.php';*/
?>


<?php
include 'superior.php';
echo "<script type='text/javascript'>alert('hola que tal');</script>";

conectar_mysql("localhost","root","","libreria");
// Comentarios
$sql = "select * from comentarios";

$resultado = ejecutar_sql($sql);
?>

	<h2>Comentarios</h2>
	<table class="table table-striped" align="center">
	
	<?php

		$count = mysql_num_rows($resultado);

		if($count > 0)
		{
			while ($row=mysql_fetch_array($resultado))
			{ 
				echo "<tr><td class='tablaForm'>
		 				<input type='text' size='200' maxlength='200' value='".$row["detalle"]."'/>
		 			  </td></tr>";
			}
		}

	?>
	</table>
	<input type="hidden" name="op" id="op" value="I"></input>
	<input type="hidden" name="hdescProd" id="hdescProd" value=""></input>

<?php
include 'inferior.php';
?>