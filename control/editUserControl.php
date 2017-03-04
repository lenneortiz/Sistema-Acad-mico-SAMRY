<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
	
	if(isset($_GET['tipo']) and $_GET['tipo']=='update'):

		$classUser=new Usuario();
		$editBasicUser=$classUser->editUserBasico();

	endif;

else:
	$archivo=$file;
	header("Location:http://localhost/Ribas/control/errorControl.php?file='".$archivo."'");
	
endif;

?>