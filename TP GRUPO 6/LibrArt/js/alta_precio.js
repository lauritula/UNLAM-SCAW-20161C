function validar()
{
	var oCombodesc;
	var desc;
	
	oCombodesc = document.getElementById('cboProd');
	
	desc = oCombodesc.options[oCombodesc.selectedIndex].text;
	
	document.altaPrecio.hdescProd.value = desc;
	
	document.altaPrecio.submit();
	
}

