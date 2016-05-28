function validar()
{
	var doc;

		
		doc = document.eliminarusuario.nrodoc.value;
		
		
		if (doc == '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.eliminarusuario.submit();
		}
}