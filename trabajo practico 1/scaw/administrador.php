<?php
session_start();
if($_SESSION['log']!=1)
header("location:login.php");
$id=$_SESSION['id'];
?>
<html>
<body>
<?php	
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
$consulta= mysql_query("select * from administrador WHERE id_admin = $id",$conexion) or die ("Fallo en la consulta");

//echo "<div class='sesion2'>"; para ponerlo en un div
while($fila=mysql_fetch_array($consulta))
{
echo $fila['nombre'];
echo " ".$fila['apellido'];
echo "<br>";
echo "<br>";
	}
//echo "</div>";
?>

<form action= "filtro2.php" method="post">
Elija una opcion
<select  name="descripcion">  
   <option value="producto">Producto</option>
   <option value="empleado">Empleado</option>
        
</select>
<br><br>
<select  name="descripcion2">  
   <option value="ingresar">Ingresar</option>
   <option value="modificar">Modificar</option>
   <option value="eliminar">Eliminar</option>
        
</select>	

<br><br>
 <input type="submit" value="Ir" />
<input type="reset" name="limpiar" value="Reset" />
</form>

<form action= "logoutb.php" method="post"><br>
<input type="submit" value="Salir" class="boton"/>
</form>	
</body>
	</html>