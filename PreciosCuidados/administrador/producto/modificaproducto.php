<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Modificar Producto</title>
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
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
else{echo 'Base de datos creada exitosamente<br />.';}*/
$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE)
{echo 'Error al seleccionar la base<br />.';} 
else{echo 'Base seleccionada exitosamente<br />.';}*/
$consulta= mysql_query("select * from producto",$conexion)   or die ("Fallo en la consulta");
 /*if($consulta)
 echo "hola";*/
 /*while($fila = mysql_fetch_array($consulta))
   { echo $fila['descripcion'];
   echo "<br>";}*/
?>   
<div class="container-fluid">

  <div class="row">
     <div class="col-sm-4">
     </div>
     <div class="col-sm-4">
      <h3>Modificacion de Producto</h3>
      <br>
      <form action= "modificaproductobd.php" method="post" autocomplete="off">
      Seleccione el Producto
      <select  name="descripcion">  
            <?php    
            while($fila = mysql_fetch_array($consulta))  
            {
                ?>
                <option <?php echo $fila['descripcion'] ?> >
                <?php echo $fila['descripcion']; ?>
                </option>
                <?php
            }    
            ?>       
        </select>
        <br>Ingrese la modificacion
      <input type="text" name= "descripcion2" value="" />
      <input type="submit" class="btn btn-danger" value="Modificar" />
      <input type="reset" class="btn btn-info" name="limpiar" value="Reset" />
      </form> 
      <form action= "../indexAdministrador.php" method="post"><br>
      <input type="submit" value="Volver al Inicio" class="btn btn-danger" class="boton"/>
      </form>
     </div>
     <div class="col-sm-4">
     </div>
</div>
</body>
</html>