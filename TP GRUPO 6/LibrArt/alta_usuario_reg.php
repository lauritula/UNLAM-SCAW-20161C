<?php
INCLUDE 'include/conexion.php';
?>
<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="css/heroic-features.css" rel="stylesheet">
	    <link href="css/estilos.css" rel="stylesheet">
		
		<script src="js/jquery.min.js"></script>
		<script language="JavaScript" src="js/alta_usuario_reg.js"></script>
		<script type="text/javascript">
			function soloNumeros(e){
				var key = window.Event ? e.which : e.keyCode
				return (key >= 48 && key <= 57)
			}
		</script>
	</head>
	<body class="fondoIndex1">
		<div class="container jumbotron hero-spacer">
			<form method="post" action="abm_usuario_reg.php" name="altausuario" id="altausuario">
				<h2>Alta de Usuario</h2>
				<table class="table" align="center">
					<tr>
						<td class="tablaForm">
							<p>Documento:</p>
						</td>
						<td class="tablaForm" >
							<input class="u-full-width" type="text" name="nrodoc" id="nrodoc" value="" size="20" maxlength="20" onKeyPress="return soloNumeros(event)"/>
						</td>
					</tr>

					<tr>
						<td class="tablaForm" >
							<p>Nombre:</p>
						</td>
						<td class="tablaForm">
							<input class="u-full-width" type="text" name="nombre" id="nombre" value="" size="20" maxlength="20"/>
						</td>
					</tr>

					<tr>
						<td class="tablaForm">
							<p>Contrase&ntilde;a:</p>
						</td>
						<td class="tablaForm">
							<input class="u-full-width" type="password" name="clave" id="clave" value="" size="20" maxlength="20"/>
						</td>
					</tr>
				</table>
				<div align="center">
					<input class="button-primary" type="button" onclick="javascript:validar();" value="Enviar" align="center"/>
					<input class="button-primary" type="button" onclick="location = 'index.php';" value="Volver" align="center"/>
				</div>
				<input type="hidden" name="op" id="op" value="I"></input>
			</form>
		</div>
	</body>
</html>