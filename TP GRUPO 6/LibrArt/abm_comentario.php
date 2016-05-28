<?php
/******************************************************************************************/
/** Guarda un comentario en caso de que el usuario este habilitado como usuario anonimo ***/
/******************************************************************************************/
/*INCLUDE 'include/phpfunciones.php';
INCLUDE 'include/conexion.php';
session_start();*/
include 'superior.php';

$operacion = $_POST["op"]; 

if ($operacion != "")
{
	conectar_mysql("localhost","root","","libreria");

	$getCodigoProducto = $_POST["hdescProd"];
	$getComentario = $_POST["txtComentario"];

	$getID = $_SESSION['usuarioDoc'];
	$getEstado = $_SESSION['usuarioEstado'];
	//echo "<script type='text/javascript'>alert('". $_SESSION['usuarioDoc'] ."');</script>";

	if ($getEstado == "N")
	{
		$sql = "insert into comentarios(detalle, fecha, idProducto, idUsuario)
				values('".$getComentario."', now(), ".$getCodigoProducto.", 0)";
		ejecutar_sql($sql);
	}
	else
	{
		$sql = "insert into comentarios(detalle, fecha, idProducto, idUsuario)
				values('".$getComentario."', now(), '".$getCodigoProducto."', ".$getID.")";
		ejecutar_sql($sql);
	}

	mensaje("Comentario cargado correctamente.","alta_comentario.php","C");
}

?>