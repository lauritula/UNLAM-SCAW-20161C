function validar()
{

	var doc;

		
		doc = document.modifusuario.nrodoc.value;
		
		
		if (doc == '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.modifusuario.submit();
		}
}