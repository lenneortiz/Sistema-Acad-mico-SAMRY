<?php
sleep(1);
$file="../model/ModelPeriodo.php";
if(file_exists($file)):
	require_once($file);
	

	if(isset($_POST['tipo']) AND $_POST['tipo']=='update'):

		$classPeriodo=new Periodo();
		$editPeriod = $classPeriodo->edit_periodo();

		
	endif;
	

endif;



?>