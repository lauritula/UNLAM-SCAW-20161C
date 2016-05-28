<?php
include 'superior.php';
//session_start();


conectar_mysql("localhost","root","","libreria");

$squery = "update usuario set us_habilitado = 'S'";
ejecutar_sql($squery);
mensaje("Usuarios habilitados correctamente.","alta_usuario.php","C");

?>

<?php
include 'inferior.php';
?>