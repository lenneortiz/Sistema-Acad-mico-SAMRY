<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):

	require_once($file);
	$classUser=new Usuario();
	$logueo=$classUser->loginUser($_POST['login'],$_POST['pass']);
	//var_dump($_POST);
else:
	echo"no existe";

endif;

?>