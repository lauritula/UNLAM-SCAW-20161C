function validar()
{

	var cod;

		
		cod = document.modifproducto.cod.value;
		
		
		if (cod == '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.modifproducto.submit();
		}
}