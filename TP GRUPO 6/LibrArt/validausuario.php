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
$passphrases = $_POST["passphrases"];
$passphrases_array = explode(" ", $passphrases);
$longitud = count($passphrases_array);

for($i=0;$i<$longitud;$i++){
	$palabra=$passphrases_array[$i];
	$letra=$palabra[0];
	$passphrases_array[$i]=$letra;
	//echo $passphrases_array[$i];
	//echo "</br>";
}

$new_passphrases_array = implode("", $passphrases_array);


$passEncriptada = md5($pass);
conectar_mysql("localhost","root","","libreria");

$squery = "select * from usuario where us_login = '$usuario' and us_password='$pass' and passphrases='$new_passphrases_array'";//query
$resultado = ejecutar_sql($squery);
$filas = cantFilas($squery);

if ($filas == 0)
{
	mensaje("Algunos de los datos ingresados no son invalidos.","login.php","E");
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

//cifrado simetrico 

# establecemos la clave y la cadena a encriptar
  $clave = $pass;
  $texto = $pass;
     /*creamos un identificador de encriptado en el que indicamos
      el tipo de cifrador (cast-128) y el modo de cifrado (ecb) */
  $ident = mcrypt_module_open('cast-128', '', 'ecb', '');
     /* dado que algunas funciones requieren de un vector de inicializacion
      acorde con sus especificaciones esta función determina el tamaño
      de ese vector atendiendo al tipo de identificador */
  $long_iniciador=mcrypt_enc_get_iv_size($ident);
     /* crea el vector de inicialización con valores aleatorios
      y dándole la dimensión precalculada en la función anterior */
  $inicializador = mcrypt_create_iv ($long_iniciador, MCRYPT_RAND);
      /* Contimuamos la secuencia de encriptado incializando todos los buffer
       necesarios para llevar a cabo las labores de encriptado */
  mcrypt_generic_init($ident, $clave, $inicializador);
    /* realiza el encriptado proopiamente dicho */
  $texto_encriptado = mcrypt_generic($ident, $texto);
    /* libera los buffer pero no cierra el modulo */
  mcrypt_generic_deinit($ident);
    /* esta instruccion es necesaria para cerrar el modulo de encriptado*/
  mcrypt_module_close($ident);
     /* guardamos la cadena encriptada en un fichero con nombre encriptado */
     file_put_contents('encriptado',$texto_encriptado);

//decifrado simetrico 

     /* hemos de usar la misma clave con la que ha sido encriptado */
  $clave = $pass; 
   /* leemos el fichero encriptado creado por el script anterior */
 $texto_encriptado =file_get_contents('encriptado');
      /*creamos un identificador de encriptado que ha de ser el mismo con
  el que hemos realizado la encriptación */
 $ident = mcrypt_module_open('cast-128', '', 'ecb', '');
   /* dado que algunas funciones requieren de un vector de inicializacion
     acorde con sus especificaciones esta función determina el tamaño de ese
     vector atendiendo al tipo de identificador anterior*/
 $long_iniciador=mcrypt_enc_get_iv_size($ident);
   /* crea el vector de inicialización con valores aleatorios
     y dándole la dimensión precalculada en la función anterior */
 $inicializador = mcrypt_create_iv ($long_iniciador, MCRYPT_RAND);
   /* incializa todos los buffer necesarios para llevar
    a cabo las labores de encriptado */
 mcrypt_generic_init($ident, $clave, $inicializador);
    /* realiza el desencriptado proopiamente dicho. Realmente es la unica
       diferencia básica entre este script y el ejemplo anterior */
 $desencriptado = mdecrypt_generic($ident, $texto_encriptado); 
    /* libera los buffer pero no cierra el modulo */
 mcrypt_generic_deinit($ident);
    /* esta instruccion es necesaria para cerrar el modulo de encriptado*/
 mcrypt_module_close($ident);
 /* Archivo desencriptado con la clave descifrada si se quiere verificar que el descifrado sea optimo*/
 // file_put_contents('desencriptado',$desencriptado);


?>



</body>

</html>
