<?php
include 'superior.php';
echo "<script type='text/javascript'>alert('hola que tal');</script>";

conectar_mysql("localhost","root","","libreria");
// Comentarios
$sql = "select * from comentarios";

$resultado = ejecutar_sql($sql);
?>

<!--<form method="post" action="abm_comentario.php" name="altaComentario" id="altaComentario">-->
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

<!--</form>-->
<?php
include 'inferior.php';
?>