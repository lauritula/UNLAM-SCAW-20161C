
<?php
$id = $_POST['id'];
$contrasenia = $_POST['contrasenia'];
$opciones = ['cost' => 12,];

//echo password_hash($contrasenia, PASSWORD_DEFAULT, $opciones);

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
		$query 	= "SELECT * FROM usuario WHERE id = '$id'";
		$consulta 		= mysql_query($query, $conexion); 
		$cant	 	= mysql_num_rows($consulta); 
		$fila   = mysql_fetch_array($consulta);
		$ContraseniaHash=$fila['contrasenia'];

		if ($cant == 0) { //NO ESTA EN LA BASE
		echo "Error: Usuario incorrecto"; 
		//header("location:login.php"); 
		}
		else {

			if(password_verify($contrasenia, $ContraseniaHash)){
			//echo '¡La contraseña es válida!';			 
				if ($fila['rol'] == 'administrador'){
				session_start();
				$_SESSION['log']=1;
				$_SESSION['id'] = $id;
				header("location: administrador/indexAdministrador.php");
				} 
				else
				{
				session_start();
				$_SESSION['log']=1;
				$_SESSION['id'] = $id;
				header("location:usuario/indexUsuario.php");
				}
			}else{echo "Error: Contraseña incorrecta"; }
		} 
}
?>
