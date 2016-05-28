function validar()
{
	var cod;

		
		cod = document.eliminarproducto.cod.value;
		
		
		if (cod == '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.eliminarproducto.submit();
		}
}