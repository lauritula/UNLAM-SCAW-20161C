<?php
session_start();
if($_SESSION['log']!=1)
header("location:login.php");
?>
<html>
<body>
<?php	
$host='localhost';
$user='root';
$pass='';
$id_empleado = $_POST['id_empleado'];
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
else{echo 'Base de datos creada exitosamente<br />.';}*/
$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE)
{echo 'Error al seleccionar la base<br />.';} 
else{echo 'Base seleccionada exitosamente<br />.';}*/
$consulta= mysql_query("select * from empleado WHERE id_empleado = $id_empleado",$conexion) or die ("Fallo en la consulta");
while($fila=mysql_fetch_array($consulta))
				{	
				$nom=$fila ['nombre'];
				$ape=$fila ['apellido'];	
				}	
?>
<form action= "bajaempleadobd.php" method="post">
<br><br>

<input type='hidden' id="id_empleado" name='id_empleado' value="<?php echo $id_empleado;?>" />
Nombre
<input type='text' id="nombre" name='nombre' value="<?php echo $nom;?>" />
Apellido
<input type="text" id="apellido" name="apellido" value="<?php echo $ape;?>" />
<input type="submit" value="Eliminar" />
<input type="reset" name="limpiar" value="Reset" />
</form>	
<form action= "../indexAdministrador.php" method="post"><br>
<input type="submit" value="Volver al Inicio" class="btn btn-danger" class="boton"/>
</form>
</body>
</html>

