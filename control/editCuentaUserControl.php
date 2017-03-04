<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
	$classUser=new Usuario();

		if(isset($_POST['tipo']) and $_POST['tipo']=='update'):

			$editCuentaUser=$classUser->editCuentaUser();	
			
		endif;
else:

endif;
