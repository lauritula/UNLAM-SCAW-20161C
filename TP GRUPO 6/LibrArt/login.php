<?php
INCLUDE 'include/phpfunciones.php';
session_start();
session_destroy();

?>

<HTML>
 <HEAD>
  <TITLE>  </TITLE>
  	<LINK REL=StyleSheet HREF="css/estilos.css" TYPE="text/css" MEDIA=screen>
	<script language="JavaScript" src="js/login.js"></script> 
	<script type="text/javascript">
		function soloNumeros(e){
			var key = window.Event ? e.which : e.keyCode
			return (key >= 48 && key <= 57)
		}
	</script>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
 </HEAD>

 <BODY class="fondoIndex1">

	<div class="loginCentrado">
		 
		<form method="post" action="validausuario.php" name="formlogin" id="formlogin" autocomplete="off">
			<h5>Documento</h5>
			<input class="input"  type="text" name="usuario" id="usuario" onKeyPress="return soloNumeros(event)" autocomplete="off"/>
		
			<h5>Contrase&ntilde;a</h5>
			<input class="input" type="password"  name="pass" id="pass" autocomplete="off"/>
			<br/> <br/>
			
			<input class="button-primary" type="button" onclick="javascript:validar();"  value="Ingresar" />
			<input class="button-primary" type="button" onclick="javascript:registrar();"  value="Registrarse" />
		</form>
	</div>
 </BODY>
</HTML>
