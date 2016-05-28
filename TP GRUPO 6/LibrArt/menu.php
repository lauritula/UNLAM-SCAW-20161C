
<!--<form method="post" action="" name="" id="">-->

<?php

INCLUDE 'include/phpfunciones.php';
INCLUDE 'include/conexion.php';

echo "<script src='js/menu.js' type='text/javascript'></script> ";

/* establecer el limitador de caché a 'private' */

//session_cache_limiter('private');
//$cache_limiter = session_cache_limiter();

/* establecer la caducidad de la caché a 1 minutos */
//session_cache_expire(1);
//$cache_expire = session_cache_expire();

session_start();

$nroDoc = $_SESSION["usuarioDoc"];
conectar_mysql("localhost","root","","libreria");

$squery = "select us_habilitado from usuario where us_login='$nroDoc'";

$resultado = ejecutar_sql($squery);

while($row = mysql_fetch_array($resultado))
{
	$habilitado = $row['us_habilitado'];
}
	
$rol = $_SESSION["usuarioRol"];

switch($rol)
{

	case 1: //administrador

?>
	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<img class="img_navbar" src="img/logoQuimicaDaico.png">
                <a class="navbar-brand" href="#"></a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a onClick='bienvenido()'>Inicio</a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a onClick='altaUsuario()'> Alta Usuario</a></li>
							<li><a onClick='bajaUsuario()'>Eliminar Usuario</a></li>
							<li><a onClick='modificaUsuario()'> Modificar Usuario</a></li>
							<li><a onClick='HabilitarUsuario()'> Habilitar Usuario</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
							<li><a  onClick='altaProducto()'> Agregar Producto</a></li>
							<li><a  onClick='modificaProducto()'> Modificar Producto</a></li>
							<li><a  onClick='bajaProducto()'> Eliminar Producto</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comentarios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a onClick='Comentar()'> Comentar</a></li>
                            <li><a onClick='Comentarios()'> Ver Comentarios</a></li>
                        </ul>
                    </li>
                    <li>
                        <a onClick='salir()'>Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php
	break;
	case 2: //usuario


?>
	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="img_navbar" src="img/logoQuimicaDaico.png">
                <!--<a class="navbar-brand" href="#"></a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a onClick='bienvenido()'>Inicio</a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
						<?php
						if ($habilitado == 'S')
						{
							echo "<li><a  onClick='altaPrecio()'> Agregar Precio</a></li>";
						}
						?>
							<li><a onClick='historial()'>Ver Historial </a></li>
							<li><a onClick='historial_semanal()'>Ver Historial semanal</a></li>
							<li><a onClick='historial_semanal_curso()'>Ver Historial semanal en curso</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comentarios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a onClick='Comentar()'> Comentar </a></li>
                            <li><a onClick='Comentarios()'> Ver Comentarios</a></li>
                        </ul>
                    </li>
                    <li>
                        <a onClick='salir()'>Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php
	break;	

	
}	
	
?>

<!--</form>-->
