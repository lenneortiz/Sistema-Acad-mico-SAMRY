<?php
sleep(2);
$file="../model/ModelVencedor.php";
if(file_exists($file)):

	require_once($file);
	if(isset($_POST['tipo']) AND $_POST['tipo'] == 'insert'):

		//;$resp[0]=$_POST;
		$ClassVencedor	=	new Vencedor();
		$addVencedor	=	$ClassVencedor-> addVencedor();

	endif;

else:

	echo 'el archivo "'.$file.'" no existe';
endif;

//print_r(json_encode($resp));

?>