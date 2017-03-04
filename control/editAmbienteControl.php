<?php
sleep(2);
$file="../model/ModelPlantel.php";
if(file_exists($file)):
	require_once($file);
	

		if(isset($_POST['tipo']) AND $_POST['tipo'] == 'update'):

			//$resp[0]=$_POST;
			//var_dump($_POST);
			$classPlantel=new  Plantel();
			$editAmbiente =$classPlantel->editAmbiente();

		endif;


endif;
//print_r(json_encode($resp));


?>