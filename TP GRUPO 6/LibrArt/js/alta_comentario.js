function validar()
{
	var oCombodesc;
	var desc;
	
	oCombodesc = document.getElementById('cboProd').value;
	
	document.altaComentario.hdescProd.value = oCombodesc;
	//document.altaComentario.hdescProd.value = desc;
	document.altaComentario.submit();
	
}