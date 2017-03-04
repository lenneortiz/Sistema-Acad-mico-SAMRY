<?php
sleep(1);
$file="../model/ModelMateria.php";
if(file_exists($file)):
	require_once($file);
	$classMateria=new Materia();

	if(isset($_POST['tipo']) AND $_POST['tipo']=='insert'):

		$classMateria->addMateria();

	endif;
	

endif;


?>