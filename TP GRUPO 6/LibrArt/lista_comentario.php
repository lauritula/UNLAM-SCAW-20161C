<?php
include 'superior.php';

conectar_mysql("localhost","root","","libreria");
// Comentarios
$sql = "select co.detalle as detalle,pr.pr_descripcion as descripcion,us.us_nombre as nombre from producto as pr inner join comentarios as co on pr.pr_codigo = co.idProducto left join usuario as us on co.idUsuario = us.us_login";

/*$sql = "select pr_descripcion, detalle, fecha 
		FROM comentarios inner join producto  on idProducto = pr_codigo
		where idProducto = pr_codigo";*/

$resultado = ejecutar_sql($sql);
?>
<!--<script type="text/javascript"> alert ($sql);</script>-->
	<h2>Comentarios</h2>
	<div class="container">
	<table class="table table-striped" align="center">
	
	<?php

		$count = mysql_num_rows($resultado);

		if($count > 0)
		{
			while ($row=mysql_fetch_array($resultado))
			{ 
				//<p>'".$row["fecha"]."'  -  '".$row["pr_descripcion"]."'</p>
				if ($row["nombre"] == "")
				{
					echo "<div>
							
								<span>"."Un Usuario anonimo realizo un comentario para el producto"." ". $row["descripcion"]."</br>"."</span>
		 						
		 						<p>".$row["detalle"]."</p>
		 					</div>";
				}
				else 
				{
				echo "		<div>
							
								<span>"."El Usuario ".$row["nombre"]." "."realizo un comentario para el producto"." ". $row["descripcion"]."</br>"."</span>
		 						
		 						<p>".$row["detalle"]."</p>
		 					</div>";
				}
			}
		}

	?>
	</table>
	</div>
	<input type="hidden" name="op" id="op" value="I"></input>
	<input type="hidden" name="hdescProd" id="hdescProd" value=""></input>

<?php
include 'inferior.php';
?>