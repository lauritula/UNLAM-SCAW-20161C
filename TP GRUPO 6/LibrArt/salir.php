<?php

INCLUDE 'include/phpfunciones.php';
session_start();
session_unset();
session_destroy();

header("Location: index.php");   
//mensaje("Usuario desconectado correctamente.","login.php","C");

?>