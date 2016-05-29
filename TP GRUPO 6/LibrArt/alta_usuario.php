<?php
include 'superior.php';
echo "<script language='JavaScript' src='js/alta_usuario.js'></script> ";
?>
	<form method="post" action="abm_usuario.php" name="altausuario" id="altausuario" autocomplete="off">

		<table class="table " align="center">
		 	<tr>
				<td class="tablaForm" colspan="2">
					<h2>Alta de Usuario</h2>
				</td>
			</tr>
			<tr>
	 			<td class="tablaForm">
	 				<p>Documento:</p>
	 			</td>
				<td class="tablaForm" >
					<input class="u-full-width" type="text" name="nrodoc" id="nrodoc" value="" size="20" maxlength="20"/>
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

			<?php
			conectar_mysql("localhost","root","","libreria");
			$squery = "select * from rol";
			$roles = ejecutar_sql($squery);

			echo "<tr>";
			echo "<td class='tablaForm'>";

			echo "<p>Rol:</p>";
			echo "</td>";
			echo "<td class='tablaForm'>";

			echo "<select name='rol' id='rol'>";

			while($row = mysql_fetch_array($roles))
			{
				echo'<OPTION VALUE="'.$row['ro_codigo'].'">'.$row['ro_descripcion'].'</OPTION>';
			}
			echo "</select>";
			echo " </td>";
			echo " </tr>";

			?>
		</table>
		<div align="center">
			<input class="button-primary" type="button" onclick="javascript:validar();" value="Enviar" align="center"/>
		</div>
		<input type="hidden" name="op" id="op" value="I"></input>

<?php
include 'inferior.php';
?>