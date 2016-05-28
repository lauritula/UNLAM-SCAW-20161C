function validar()
{
	var doc;
	var pass;
		
		doc = document.formlogin.usuario.value;
		pass = document.formlogin.pass.value;
		
		if (doc == '' || pass== '')
		{
			alert('Debe completar los campos.');
			return false;
		}
		

		
		if( !(/^\d{8}$/.test(doc)) ) 
		{
			alert("Ingrese el DNI correctamente");
			return false;
		}
		else
		{
			document.formlogin.submit();
		}
}


function registrar()
{
	document.formlogin.action = 'alta_usuario_reg.php';
	document.formlogin.submit();
}
