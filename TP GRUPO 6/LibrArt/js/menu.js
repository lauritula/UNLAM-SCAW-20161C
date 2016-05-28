function Comentar() {
	location.href = "alta_comentario.php";
}

function salir() {
	location.href = "salir.php";
}

function Comentarios() {
	location.href = "lista_comentario.php";
}

function altaUsuario() {
	location.href = "alta_usuario.php";
	//parent.contenido.location.href = "alta_usuario.php";
}

function bajaUsuario() {
	location.href = "eliminar_usuario.php";
}

function modificaUsuario() {
	location.href = "modificar_usuario.php";
}

function altaProducto() {
	location.href = "alta_producto.php";
}

function bajaProducto() {
	location.href = "eliminar_producto.php";
}

function modificaProducto() {
	location.href = "modificar_producto.php";
}

function altaPrecio() {
	location.href = "alta_precio.php";
}

function historial() {
	location.href = "historial_precio.php";
}

function historial_semanal() {
	location.href = "historial_semanal.php";
}

function historial_semanal_curso() {
	location.href = "historial_semanal_curso.php";
}

function HabilitarUsuario() {
	location.href = "habilita_usuario.php";
}

function bienvenido() {
	parent.contenido.location.href = "principal.php";
//if (top != self) top.location.href = "principal.php";
}

