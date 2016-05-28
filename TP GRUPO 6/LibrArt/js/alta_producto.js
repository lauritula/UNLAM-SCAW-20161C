function validar()
{
	var descr;
	
		
		descr = document.altaproducto.descr.value;
		cod=document.altaproducto.cod.value;
		
		
		if (descr == '' , cod =='' )
		{
			alert('Debe completar los campos.');
			return false;
		}
		else
		{
			document.altaproducto.submit();
		}
}