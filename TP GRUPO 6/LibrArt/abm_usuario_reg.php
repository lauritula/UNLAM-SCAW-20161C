<?php
INCLUDE 'include/phpfunciones.php';
INCLUDE 'include/conexion.php';
session_start();

$operacion = $_POST["op"]; 
$nroDoc = $_POST["nrodoc"];

if ($operacion == "I" )           
{
	$nombre = $_POST["nombre"];
	$clave = $_POST["clave"];
	$claveEncriptada = md5($clave);
	$passphrases = $_POST["passphrases"];
}


$passphrases_array = explode(" ", $passphrases);
$longitud = count($passphrases_array);

for($i=0;$i<$longitud;$i++){
	$palabra=$passphrases_array[$i];
	$letra=$palabra[0];
	$passphrases_array[$i]=$letra;
}

$new_passphrases_array = implode("", $passphrases_array);

if(($passphrases==$nombre)||($passphrases==$clave)||($passphrases==$nroDoc)){

	mensaje("La frase privada no puede ser igual al Nombre, Clave o Documento","alta_usuario_reg.php","E");

}else{

	conectar_mysql("localhost","root","","libreria");

	$squery = "select * from usuario where us_login='$nroDoc'";
	$filas = cantFilas($squery);

	if ($filas == 1)
	{
		mensaje("El usuario ya se encuentra registrado.","alta_usuario_reg.php","E");
	}
	else
	{
		$squery = "insert into usuario(us_login,us_password,us_rol,us_nombre,us_habilitado,passphrases)values('$nroDoc','$clave',2,'$nombre','N','$new_passphrases_array')";//query
		ejecutar_sql($squery);
		mensaje("Usuario registrado correctamente.","salir.php","C");
	}
}
	
?>

<html>
<head></head>
<body>
</body>
</html>