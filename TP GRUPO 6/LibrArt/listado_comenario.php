<?php

$sql = "CALL Sp_ListarComentarioPorArchivo(".$_POST['codigoArchivo'].")";

$resultado = mysql_query($sql);

$count = mysql_num_rows($resultado);

if($count > 0){
	 
	while ($row=mysql_fetch_array($resultado))
	{ 
	
		echo "<tr>";
		echo 		"<td>";
		echo		"</td>";
		echo		"<td><div class='col-lg-4'> ";
		echo				"<input type='text' disabled='true' class='form-control' name='user".$row["nombre"]."' id='user".$row["nombre"]."' value='".$row["nombre"]."'>";
		echo			  "</div>";
		echo		"</td>";
		echo		"<td>";
		echo 				"<textarea rows='3' disabled='true' class='form-control' name='comentario".$row["detalle"]."' id='comentario".$row["detalle"]."' >".$row['detalle']."</textarea>";
		echo			 "</div>";
		echo		"</td>";
		echo		"<td>";
		echo		"</td>";
		echo "</tr>";

	}
	
}	
		echo	"<tr class='success'>";
		echo		"<td>";
		echo		"</td>";
		echo		"<td> <div class='col-lg-4'>";
		echo   		"<h4>Agregar comentario de ".$_SESSION['nombre']." para el archivo ".$_POST['nombreArchivo'].":";
		echo			  "</h4>";
		echo		"</td>";
		echo  		"<td>";
		echo				"<textarea  class='form-control' rows='3' name='addComent' id='addComent'></textarea>";
			
        echo "<input type='button' onclick='addComentario(".$_POST['codigoArchivo'].")' class='btn btn-small btn-primary btn-block' value='Guardar Comentario'/>";
		
		echo			 "";
		echo		"</td>";
		echo	"</tr>";
?>