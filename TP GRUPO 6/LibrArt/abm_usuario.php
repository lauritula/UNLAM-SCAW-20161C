<?php
INCLUDE 'include/phpfunciones.php';
INCLUDE 'include/conexion.php';
session_start();

$operacion = $_POST["op"]; 
$nroDoc = $_POST["nrodoc"];

if ($operacion == "I" )           
{
	$nombre = $_POST["nombre"];
	$rol = $_POST["rol"];
	$clave = $_POST["clave"];
	$claveEncriptada = md5($clave);
}

if ($operacion == "U")
{ 
	$nombre = $_POST["nombre"];
	$rol = $_POST["rol"];
}

conectar_mysql("localhost","root","","libreria");

switch($operacion) { 
case "I": $squery = "select * from usuario where us_login='$nroDoc'";
		  $filas = cantFilas($squery);
		  if ($filas == 1)
		  {
			mensaje("El usuario ya se encuentra registrado.","alta_usuario.php","E");
		  }
		  else
		  {
			$squery = "insert into usuario(us_login,us_password,us_rol,us_nombre,us_habilitado)values('$nroDoc','$clave','$rol','$nombre','S')";//query
			ejecutar_sql($squery);
			mensaje("Usuario creado correctamente.","alta_usuario.php","C");
		  }
	break;
case "U": $squery = "update usuario set us_rol='$rol',us_nombre='$nombre' where us_login='$nroDoc'";//query
		  ejecutar_sql($squery);
		  mensaje("Usuario modificado correctamente.","alta_usuario.php","C");
	break;
case "D":
		$squery = "delete from usuario where us_login='$nroDoc'";//query
		ejecutar_sql($squery);
		mensaje("Usuario eliminado correctamente.","alta_usuario.php","C");
	break;
}

?>

<html>
<head></head>
<body>
</body>
</html>