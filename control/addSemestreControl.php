<?php
sleep(2);
$file="../model/ModelCohorte.php";
if(file_exists($file)):
	require_once($file);
			
			//echo '<pre>';
			//print_r($_GET);
			//echo '</pre>';
			//$resp[0]=$_POST;
			//var_dump($_POST);
			$classCohorte=new  Cohorte();
			$addCohorte =$classCohorte->addSemeste();

		


endif;
//print_r(json_encode($resp));


?>