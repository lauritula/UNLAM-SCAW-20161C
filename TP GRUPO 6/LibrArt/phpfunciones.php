
<?php

function mensaje($mensaje,$paginaRedireccionar,$tipo)
{	
	if ($tipo == "E") //error
	{
		$img = 'imagen\mensajeError.PNG';
	}
	else //ok
	{
		$img = 'imagen\mensajeOk.PNG';
	}
	$imgRegresar= 'imagen\regresar.png';
	echo "<html>";
	echo "<body>";
	echo "<form method='post' action='$paginaRedireccionar'>";
	echo "<table width='30%' border='0' align='center'>";
	echo "<tr>";
	echo "<td width='10%'>";
	echo "<img src='$img'>";
	echo "</img>";
	echo "</td>";
	echo "<td width='90%'>";
	echo "<p style='color: #000000;font-family:Verdana, Geneva, sans-serif; font-size:17px;'>$mensaje</p>";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='50%' align='center' colspan='2'>";
	echo "<input style='color: #FFF;background-color: #515151;height:38px;border-radius: 4px;text-transform: uppercase;text-decoration: none;letter-spacing: .1rem;font-weight: 600;font-size: 11px;' type='submit'  value='REGRESAR' onclick='javascript:submit();'/>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
	echo "</body>";
	echo "</html>";
	exit();
}

function mensaje2($mensaje,$paginaRedireccionar,$tipo)
{	
	if ($tipo == "E") //error
	{
		$img = 'imagen\mensajeError.PNG';
	}
	else //ok
	{
		$img = 'imagen\mensajeOk.PNG';
	}
	$imgRegresar= 'imagen\regresar.png';
	echo "<html>";
	echo "<body>";
	echo "<form method='post' action='$paginaRedireccionar'>";
	echo "<table width='30%' border='0' align='center'>";
	echo "<tr>";
	echo "<td width='10%'>";
	echo "<img src='$img'>";
	echo "</img>";
	echo "</td>";
	echo "<td width='90%'>";
	echo "<p style='color: #000000;font-family:Verdana, Geneva, sans-serif; font-size:17px;'>$mensaje</p>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
	echo "</body>";
	echo "</html>";
	exit();
}

?>

