<?php
sleep(2);

$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
	$classUser=new Usuario();

	if(isset($_POST['tipo']) and $_POST['tipo']=='update'):

		$editAvanzadoUser=$classUser->editAvanzadoUser();

	endif;

else:
	$archivo=$file;
	header("Location:http://localhost/Ribas/control/errorControl.php?file='".$archivo."'");exit;
	
endif;



?>
