<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Grabar precio</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">

    	<div class="row">

        <div class="col-sm-4">
        </div>
         <div class="col-sm-4">
         	<h3>Confirmaci&oacute;n de precios</h3>
         	<?php
session_start();
$host='localhost';
$user='root';
$pass='';

$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
$id_empleado = $_POST['id_empleado'];
$semana= date("W");

echo'<div>Producto : </div>'; echo $descripcion;
echo "<br>";
echo'<div>Precio : </div>'; echo $valor;
echo "<br>";
echo'<div>Empleado : </div>';echo $id_empleado;

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query 	= "SELECT * FROM precios WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
$query_cambia = "UPDATE precios SET id_empleado = '$id_empleado', descripcion = '$descripcion', valor = '$valor', semana = '$semana' WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'";
$consulta_cambia = mysql_query($query_cambia, $conexion);
			
			
if(!$consulta_cambia)
{
	echo 'Ingreso fallido';
}
	else
	{
		echo"<br>"; 
		echo 'Precio insertado con exito';
		//header("location:cargaprecios.php");
	}	
?>	<div class="form-group">
        <div class="col-sm-6">
         <input type="submit" class="btn btn-info" value="Cargar otro precio" onClick="location.href = 'cargaprecios.php' ">
       </div>
       <div class="col-sm-6">
          <input type="submit" class="btn btn-danger" value="Volver al index" onClick="location.href = 'indexUsuario.php' ">
        </div>
     
     </div>
 	</div>
      <div class="col-sm-4">
      </div>
     
   
    </div>
</div>
</body>
</html>