
<?php
$id = $_POST['id'];
$contrasenia = $_POST['contrasenia'];
//$contramd5= md5($contrasenia);

	function conectarse() {
		if(!($conexion = mysql_connect("localhost", "root", ""))) {
			echo "Error al conectarse a la Base de datos";
			exit();
		}
		if(!mysql_select_db("precioscuidados", $conexion)) {
			echo "Error al seleccionar a la Base de datos";
			exit();
		}
		return $conexion;
	}
	
	if ($id == "" || $contrasenia == "") { 
		header("location:login.php"); 
	} 
	else { 
		//Conexión a la Base de Datos
		$conexion = conectarse();
		mysql_select_db("precioscuidados", $conexion); 
		$query 	= "SELECT * FROM usuario WHERE id = '$id' AND contrasenia = '$contrasenia'"; 
		//$query 	= "SELECT * FROM usuario WHERE id = '$id' AND contrasenia = '$contramd5'"; 
		$consulta 		= mysql_query($query, $conexion); 
		$cant	 	= mysql_num_rows($consulta); 
		$fila   = mysql_fetch_array($consulta);
		if ($cant == 0) { //NO ESTA EN LA BASE
			echo "Error: Usuario o Contraseña incorrectos"; 
			header("location:login.php"); 
		                }
		else {

			if ($fila['rol'] == 'administrador'){
				session_start();
				$_SESSION['log']=1;
				$_SESSION['id'] = $id;
				header("location: administrador.php");
			} 
			else
			{
				session_start();
				$_SESSION['log']=1;
				$_SESSION['id'] = $id;
				header("location: visualizarprecio.php");
			
			
		}
	} 
}
?>