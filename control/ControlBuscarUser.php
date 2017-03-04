<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
	$classUser=new Usuario();

		if(isset($_POST['tipo']) and $_POST['tipo']=='select'):

			$buscar=$classUser->busquedaUser($_POST['ci']);
			
		endif;
else:

endif;


?>