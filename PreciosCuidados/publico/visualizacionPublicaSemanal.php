
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visualización de precios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">


<?php
session_start();
$host='localhost';
$user='root';
$pass='';


$semana= date("W");

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query 	= "SELECT * FROM precios WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
$query_cosulta = "SELECT descripcion, MAX(valor) maximo, MIN(valor) minimo, AVG(valor) promedio FROM precios WHERE semana = '$semana' GROUP BY descripcion";  //consulta de los productos y sus precios filtrado semana actual
$filtro_semana = mysql_query($query_cosulta, $conexion)or die("Error en: " . mysql_error());
?>

   <?php
                
            $query_cosulta_comentario = "SELECT comentarios.texto , empleado.nombre, comentarios.fecha_hora FROM comentarios INNER JOIN empleado ON comentarios.id_comentarista = empleado.id_empleado where comentarios.semana = '$semana'";  //consulta de los productos y sus precios filtrado semana actual
            $filtro_comentario = mysql_query($query_cosulta_comentario, $conexion) or die ("Error en: " . mysql_error());
          ?>

<div class="container-fluid">
    <div class="row">

     <div class="col-sm-4">
     </div>

     <div class="col-sm-4">
      <h3>Visualizaci&oacute;n de precios actuales</h3>
      <?php
      if ($row = mysql_fetch_array($filtro_semana))
{
 echo "<table class='table table-bordered'> \n";
 echo "<tr><td>Producto</td><td>Maximo</td><td>Minimo</td><td>Promedio</td></tr> \n";
  do 
  { 
    echo "<tr><td>".$row["descripcion"]."</td><td>".$row["maximo"]."</td><td>".$row["minimo"]."</td><td>".$row["promedio"]."</td></tr> \n"; 
  } 
  while ($row = mysql_fetch_array($filtro_semana)); echo "</table> \n";

  } 
  else 
    { 
      echo '<div class="alert alert-warning">¡ No se ha encontrado ningún registro !</div>';
    }
      ?>

      <h3>Comentarios</h3>
                        <?php
                        if ($row = mysql_fetch_array($filtro_comentario))
                        {
                         echo "<table class='table table-bordered'> \n";
                         echo "<tr><td>Comentario</td><td>Nombre</td><td>Fecha</td></tr> \n";
                         do 
                         { 
                          echo "<tr><td>".$row["texto"]."</td><td>".$row["nombre"]."</td><td>".$row["fecha_hora"]."</td></tr> \n"; 
                        } 
                        while ($row = mysql_fetch_array($filtro_comentario)); echo "</table> \n";

                      } 
                      else 
                      { 
                         echo '<div class="alert alert-warning">¡ No se ha encontrado ningún registro !</div>';
                      }
                      ?>
      
           <div class="col-sm-16">
                     
                          <form action= "altaComentario.php" method="post" autocomplete="off"><br>
                            <div class="form-group">
                             <label class="control-label col-sm-16" for="email"> Ingrese su comentario</label>
                               <div class="col-sm-16">
                                  <textarea class="form-control" rows="3" name="comentario"></textarea>
                               </div>
                            </div>
                            <div class="col-sm-6">
                              <br><input type="submit" class="btn btn-info" value="Envìar comentario" class="boton"/></br>
                            </div>

                         </form>
                      <div class="col-sm-6">
                        <br><input type="submit" class="btn btn-danger" value="Volver" onClick="location.href = 'indexPublico.php' "></br>
                     </div>
                    </div>
    
    </div>
  </div>

</div>


</div>
</body>
</html>