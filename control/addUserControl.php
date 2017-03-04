<?php
sleep(2);
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
	$classUser=new Usuario();

		if(isset($_POST['tipo']) and $_POST['tipo']=='insert'):

			$addUser=$classUser->addUser();

		endif;
else:

endif;


?>