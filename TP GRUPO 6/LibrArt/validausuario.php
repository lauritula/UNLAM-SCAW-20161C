<html>
<head>
<script language="JavaScript" src="js/menu.js"></script> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<?php

INCLUDE 'include/phpfunciones.php';
INCLUDE 'include/conexion.php';

session_start();
$usuario = $_POST["usuario"];
$usuario = addslashes($_POST["usuario"]);
$pass = $_POST["pass"];
$pass = addslashes($_POST["pass"]);

$passEncriptada = md5($pass);
conectar_mysql("localhost","root","","libreria");

$squery = "select * from usuario where us_login = '$usuario' and us_password='$pass'";//query
$resultado = ejecutar_sql($squery);
$filas = cantFilas($squery);

if ($filas == 0)
{
	mensaje("Usuario o Contraseña invalidos.","login.php","E");
}
else
{
	$dato = mysql_fetch_array($resultado, MYSQL_ASSOC);

	$_SESSION["usuarioNombre"] = $dato['us_nombre'];
	$_SESSION["usuarioRol"] = $dato['us_rol'];
	$_SESSION["usuarioDoc"] = $dato['us_login'];
	$_SESSION["usuarioEstado"] = $dato['us_habilitado'];
	header('location:principal.php');
	//echo "<script>bienvenido();</script>";
}

mysql_free_result($resultado);



?>

</body>

</html>
