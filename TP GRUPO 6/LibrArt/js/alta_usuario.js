function validar()
{
	var doc;
	var pass;
	var nombre;
		
		doc = document.altausuario.nrodoc.value;
		pass = document.altausuario.clave.value;
		nombre = document.altausuario.nombre.value;
		
		if (doc == '' || pass== '' || nombre== '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.altausuario.submit();
		}
}