<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
/*if($seleccion_base==FALSE){echo 'Error al seleccionar la base<br />.';} 
else{echo 'Base seleccionada exitosamente<br />.';}*/
$consulta= mysql_query("select * from empleado",$conexion) or die ("Fallo en la consulta");
 /*if($consulta)
 echo "hola";*/
 /*while($fila = mysql_fetch_array($consulta))
   { echo $fila['descripcion'];
   echo "<br>";}*/
?>   
<form action= "bajaempleado2.php" method="post">

    Seleccione un empleado
   <select  name="id_empleado">  
    <?php    
    while($fila = mysql_fetch_array($consulta))  
    {
        ?>
        <option <?php echo $fila['id_empleado'] ?> >
        <?php echo $fila['id_empleado']; ?>
        </option>
        <?php
    }    
    ?>       
</select>
<br><br>

<input type="submit" value="Buscar datos" />
<input type="reset" name="limpiar" value="Reset" />
</form>
<br>		
<form action= "../indexAdministrador.php" method="post"><br>
<input type="submit" value="Volver al Inicio" class="btn btn-danger" class="boton"/>
</form>
</body>
</html>