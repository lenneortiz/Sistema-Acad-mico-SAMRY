<?php
sleep(1);
$file="../model/ModelPeriodo.php";
if(file_exists($file)):
	require_once($file);
	

	if(isset($_POST['tipo']) AND $_POST['tipo']=='insert'):

		$classPeriodo=new Periodo();
		$addPeriod = $classPeriodo->addPeriodo();



	endif;
	

endif;


?>