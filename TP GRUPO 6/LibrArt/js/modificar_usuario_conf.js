function validar()
{
	var nombre;
		
		nombre = document.modificaausuario.nombre.value;
		
		if (nombre == '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.modificaausuario.submit();
		}
}