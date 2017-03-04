<?php
require_once("../model/ModelUsuario.php");
session_destroy();
$_SESSION['nombre1'] = "0";
$_SESSION['apellido1'] = "";
header("Cache-Control: private");
header("Location:".Usuario::ruta()."?r=5 ");
?>