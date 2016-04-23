<?php

?>
<body>
		<form action= "filtro.php" method="post">
			Numero de  Usuario
			<input type="text" id="campo" name="id" value="" class="input"/>
			<br><br>
			Contrase&aacute;
			<input type="password" name="contrasenia" value="" class="input"/>
			<br><br>		
			<input type="submit" value="Ingresar" class="boton"/>
			<input type="reset" name="limpiar" value="Reset" class="boton"/>
		</form>
		<form action= "logoutb.php" method="post"><br>
		<input type="submit" value="Salir" class="boton"/>
		</form>	
</body>
</html>
	