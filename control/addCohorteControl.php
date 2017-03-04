<?php
sleep(2);
$file="../model/ModelCohorte.php";
if(file_exists($file)):
	require_once($file);
	

		if(isset($_POST['tipo']) AND $_POST['tipo'] == 'insert'):

			//$resp[0]=$_POST;
			//var_dump($_POST);
			$classCohorte=new  Cohorte();
			$addCohorte =$classCohorte->addCohorte();

		endif;


endif;
//print_r(json_encode($resp));


?>