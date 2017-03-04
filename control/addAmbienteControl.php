<?php
sleep(2);
$file="../model/ModelPlantel.php";
if(file_exists($file)):
	require_once($file);
	

		if(isset($_POST['tipo']) AND $_POST['tipo'] == 'insert'):

			//$resp[0]=$_POST;
			$classPlantel=new  Plantel();
			$addAmbiente =$classPlantel->addAmbiente();

		endif;


endif;
//print_r(json_encode($resp));
?>