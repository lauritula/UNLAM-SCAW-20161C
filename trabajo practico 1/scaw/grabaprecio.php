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

$valor = $_POST['valor'];
$id_empleado = $_POST['id_empleado'];
$id_producto = $_POST['id_producto'];
$semana= date("W");


$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query 	= "SELECT * FROM precios WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
$descripcion= mysql_query("SELECT descripcion FROM producto WHERE id_producto = $id_producto", $conexion);
$fila = mysql_fetch_array($descripcion, MYSQL_NUM);
$query_existe="SELECT COUNT(*) FROM precios WHERE semana=$semana AND id_empleado=$id_empleado and id_producto=$id_producto";
$query_nuevo = "INSERT INTO precios VALUES ('$id_producto','$id_empleado','$fila[0]','$valor','$semana')";
$query_cambia = "UPDATE precios SET valor = '$valor' WHERE semana=$semana AND id_empleado=$id_empleado and id_producto=$id_producto";

echo'<div>Producto : </div>'; echo $fila[0];
echo "<br>";
echo'<div>Precio : </div>'; echo $valor;
echo "<br>";
echo'<div>Empleado : </div>';echo $id_empleado;

if($query_existe==0)
{
  
  $consulta_nuevo = mysql_query($query_nuevo, $conexion);
}
else
{

$consulta_cambia = mysql_query($query_cambia, $conexion);
}

/*[if(!$consulta_cambia)
  {
    echo 'Ingreso fallido';
  }
    else
    {
      echo"<br>"; 
      echo 'Precio insertado con exito';
      //header("location:cargaprecios.php");
    }]  */
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