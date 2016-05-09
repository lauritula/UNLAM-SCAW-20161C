<?php
session_start();
if($_SESSION['log']!=1)
header("location:login.php");
$id=$_SESSION['id'];
?>
<html>
<body>

<?php	
/*$host='localhost';
$user='root';
$pass='';
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
 else{echo 'Base de datos creada exitosamente<br />.';}*/
//$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE){echo 'Error al seleccionar la base<br />.';} 
 else{echo 'Base seleccionada exitosamente<br />.';}*/	   
//$consulta= mysql_query("select * from administrador WHERE id_admin = $id",$conexion) or die ("Fallo en la consulta");

//echo "<div class='sesion2'>"; para ponerlo en un div
/*while($fila=mysql_fetch_array($consulta))
{
echo $fila['nombre'];
echo " ".$fila['apellido'];
echo "<br>";
echo "<br>";*/
	
//echo "</div>";
?>


<?php	
$host='localhost';
$user='root';
$pass='';
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){
    echo 'Error al crear la base de datos<br />';
    }else{
        echo 'Base de datos creada exitosamente<br />.';
      }*/
      $seleccion_base =mysql_select_db('precioscuidados',$conexion);
		/*if($seleccion_base==FALSE)
		{
		echo 'Error al seleccionar la base<br />.';
		} else{
				echo 'Base seleccionada exitosamente<br />.';
       }*/
$consulta= mysql_query("SELECT * from empleado WHERE estado= 'pendiente'",$conexion)   or die ("Fallo en la consulta");
$consulta2= mysql_query("SELECT * from empleado WHERE estado= 'pendiente'",$conexion)   or die ("Fallo en la consulta");

if($fila2=mysql_fetch_array($consulta))
{	
echo "<table>";
echo "<tr>";
echo "<th>USUARIOS PENDIENTES DE ALTA</th>";
echo "</tr>";
echo "</table>";  

echo "<table>";
echo "<tr>";
echo "<th>NOMBRE</th>";
echo "<th>APELLIDO</th>";
echo "</tr>";
}

while($fila=mysql_fetch_array($consulta2))
{
	echo "<tr>";
	echo "<td>".$fila ['nombre']."</td>";
	echo "<td>".$fila ['apellido']."</td>";
	$id=$fila ['id_empleado'];
	echo "<td>"	."<form action= 'modificaempleado_bd_2.php' method='post'>
	<input type ='hidden' id='id_empleado' name='id_empleado' value= '$id'  />
<input type='submit' value='Ingresar'/>
</form>"."</td>";
	echo "</tr>";
}
echo "</table>";  

?>


<form action= "filtro2.php" method="post"><br><br>
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
<input type="submit" value="Salir"/>
</form>	
</body>
	</html>