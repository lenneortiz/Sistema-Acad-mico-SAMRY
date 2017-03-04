<?php
sleep(2);

$file='../model/ModelPlantel.php';
if(file_exists($file)):

		require_once($file);
		if(isset($_POST['tipo']) AND $_POST['tipo'] == 'insert'):

			$plantel=new Plantel();
			$addplantel=$plantel->addPlantel();

		//$resp[0]=$_POST;

		endif;

else:

	//echo 'el archivo "'.$file.'" no existe';

endif;


//print_r(json_encode($resp));

?>