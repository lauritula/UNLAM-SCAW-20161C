<html>
<head>
	<title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
	<div class="row">
 		 <div class="col-sm-4">
 		 </div>
  		<div class="col-sm-4">
  				<div class="container">
		<h1>Precios cuidados</h1>
		<form action= "filtro.php" method="post" class="form-horizontal">
			<div class="form-group">
		      <label class="control-label col-sm-2" for="email">Numero de  Usuario</label>
		      <div class="col-sm-2">
		       <input type="text" id="campo" name="id" value="" class="input"/>
		      </div>
			</div>
			<div class="form-group">
		      <label class="control-label col-sm-2" for="email">Contrase&ntilde;a</label>
		      <div class="col-sm-2">
				<input type="password" name="contrasenia" value="" class="input"/>
		      </div>
			</div>		
			<div class="row">
				  <div class="col-sm-2">
				  	<input type="submit" class="btn btn-info" value="Ingresar" class="boton"/>
				  </div>
				  <div class="col-sm-2">
				  	<input type="reset"  class="btn btn-info" name="limpiar" value="Limpiar" class="boton"/>
				  </div>
				  <div class="col-sm-4">
				  	<form action= "logoutb.php" method="post">
						<input type="submit" class="btn btn-danger" value="Salir" class="boton"/>
					</form>	
					  </div>
				</div>
			</form>
		</div>
  		</div>
  		<div class="col-sm-4">
  		</div>
	</div>
</div>

</body>
</html>
	