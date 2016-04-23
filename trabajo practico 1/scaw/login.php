<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<form action= "filtro.php" method="post">
			Numero de  Usuario
			<input type="text" id="campo" name="id" value="" class="input"/>
			<br><br>
			Contrase&ntilde;a
			<input type="password" name="contrasenia" value="" class="input"/>
			<br><br>		
			<input type="submit" class="btn btn-info" value="Ingresar" class="boton"/>
			<input type="reset"  class="btn btn-info" name="limpiar" value="Limpiar" class="boton"/>
		</form>
		<form action= "logoutb.php" method="post"><br>
		<input type="submit" class="btn btn-danger" value="Salir" class="boton"/>
		</form>	
	</div>
</body>
</html>
	