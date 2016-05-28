<?php
include 'superior.php';

$cod = $_POST["cod"];

$operacion= $_POST["op"];

//exit;

if ($operacion == "I" )           
{
$descripcion = $_POST["descr"]; 

}
if (  $operacion == "U"  )           
{
$descripcion = $_POST["descr"]; 

}


conectar_mysql("localhost","root","","libreria");

switch($operacion) { 
case "I": $squery = "select * from producto where pr_codigo='$cod'";
		  $filas = cantFilas($squery);
		  if ($filas == 1)
		  {
			mensaje("El producto ya se encuentra registrado.","alta_producto.php","E");
		  }
		  else
		  {
			$squery = "insert into producto(pr_codigo,pr_descripcion)values('$cod','$descripcion')";//query
			ejecutar_sql($squery);
			mensaje("Producto creado correctamente.","alta_producto.php","C");
		  }
	break;
case "U": $squery = "update producto set pr_codigo='$cod', pr_descripcion= '$descripcion' where pr_codigo='$cod'";//query
		  ejecutar_sql($squery);
		  mensaje("Producto modificado correctamente.","alta_producto.php","C");
	break;
case "D":
		$squery = "delete from producto where pr_codigo='$cod'";//query
		ejecutar_sql($squery);
		mensaje("Producto eliminado correctamente.","alta_usuario.php","C");
	break;
}
include 'inferior.php';
?>

