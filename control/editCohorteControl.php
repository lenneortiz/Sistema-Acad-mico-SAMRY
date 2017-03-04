<?php
sleep(2);
$file="../model/ModelCohorte.php";
if(file_exists($file)):
	require_once($file);
	

		if(isset($_POST['tipo']) AND $_POST['tipo'] == 'update'):

			//$resp[0]=$_POST;
			//var_dump($_POST);
			$classCohorte=new  Cohorte();
			$editCohorte =$classCohorte->editCohorte();

		endif;


endif;
//print_r(json_encode($resp));


?>