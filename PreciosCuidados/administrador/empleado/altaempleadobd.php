<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Confirmacion del Alta</title>
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

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contrasenia = $_POST['contrasenia'];

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
$query 	= "SELECT * FROM usuario WHERE contrasenia = '$contrasenia'"; //busca el producto en la tabla
$consulta = mysql_query($query, $conexion);
$cant = mysql_num_rows($consulta); 
$fila = mysql_fetch_array($consulta);
?>
<div class="container-fluid">

    	<div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <h3>Confirmaci&oacute;n de usuario ingresado</h3>
          <br>
          <div class="form-group">
             <?php
				 if ($cant != 0) 
				 //YA EXISTE
					echo "Error: Contraseña repetida"; 
					//header("location:altacliente.php");}
				else{
					$query_cambia = "INSERT INTO usuario VALUES (NULL,'empleado','$contrasenia')";
					$consulta_cambia = mysql_query($query_cambia, $conexion);
					$query_usuario	= "SELECT id FROM usuario WHERE contrasenia = '$contrasenia'"; //busca el producto en la tabla
					$consulta_usuario = mysql_query($query_usuario, $conexion); 
					$fila = mysql_fetch_array($consulta_usuario);
					
					$query_cambia2 = "INSERT INTO empleado VALUES ('$fila[0]','$nombre','$apellido')";
					$consulta_cambia2 = mysql_query($query_cambia2, $conexion);

					if(!$consulta_cambia || !$consulta_cambia2)
					{
						 echo '<div class="alert alert-warning">¡ Ingreso fallido !</div>';;
					}
					else
					{
						echo"<br>"; 
						echo'<h4>Nombre de Usuario : ' . $fila[0] . ' </h4>';
						echo'<h4>Nombre : ' . $nombre . ' </h4>';
						echo'<h4>Apellido : ' . $apellido . ' </h4>';
						echo'<h4>Contraseña : ' . $contrasenia . ' </h4>';
					//header("location:cargaprecios.php");
					}
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
          <input type="submit" class="btn btn-info" value="Cargar otro Usuario" onClick="location.href = 'altaempleado.php' ">
          <input type="submit" class="btn btn-danger" value="Volver al index" onClick="location.href = '../indexAdministrador.php' ">
        </div>
        <div class="col-sm-4">
        </div>
      </div>
    </div>
</body>
</html>