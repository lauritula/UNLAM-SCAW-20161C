<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Opciones de usuarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Opciones de usuario</title>
</head>
<body>
<div class="container-fluid">

	<div class="row">
 		 <div class="col-sm-4">
 		 </div>
 		 <div class="col-sm-4">
 		 	<h3>Bienvenido al men&uacute; de acceso p&uacute;blico!</h3>
 		 	<h3>Seleccione una opción</h3>
			<br><input type="submit" class="btn btn-info" value="Visualizar precios de esta semana" onClick="location.href = 'visualizacionPublicaSemanal.php' "></br>
			<br><input type="submit" class="btn btn-info" value="Visualizar precios de otras semanas" onClick="location.href = 'visualizacionPublicaSemanalAnterior.php' "></br>
			<br><input type="submit" class="btn btn-danger" value="Salir" onClick="location.href = '../login.php' "></br>
 		 </div>
 		 <div class="col-sm-4">
 		 </div>
</div>
</body>
</html>