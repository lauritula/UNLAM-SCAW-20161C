<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Confirmacion de Baja</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
$host='localhost';
$user='root';
$pass='';

$descripcion = $_POST['descripcion'];
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query 	= "SELECT * FROM producto WHERE descripcion = '$descripcion'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
?>
<div class="container-fluid">

    	<div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <h3>Confirmaci&oacute;n de producto eliminado</h3>
          <br>
          <div class="form-group">
             <?php

					$query_cambia = "DELETE FROM producto WHERE  descripcion = '$descripcion'";
					$consulta_cambia = mysql_query($query_cambia, $conexion);
							
					if(!$consulta_cambia)
					{
						echo 'No se pudo eliminar el producto';
					}
					else
					{
						echo"<br>"; 
						echo'<h4>Producto : ' . $descripcion . ' </h4>';
					//header("location:cargaprecios.php");
					}
             ?>
           </div>
           <br>
        </div>
        <div class="col-sm-4">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <input type="submit" class="btn btn-info" value="Eliminar otro producto" onClick="location.href = 'bajaproducto.php' ">
          <input type="submit" class="btn btn-danger" value="Volver al index" onClick="location.href = '../indexAdministrador.php' ">
        </div>
        <div class="col-sm-4">
        </div>
      </div>
    </div>
</body>
</html>