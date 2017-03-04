<?php
//echo'<pre>';
//echo print_r($_GET);
//echo'<pre>';
sleep(2);
$file="../model/ModelVencedor.php";
if(file_exists($file)):

	require_once($file);
	if(isset($_POST['tipo']) AND $_POST['tipo'] == 'update'):

		//$resp=var_dump($_POST);
		$ClassVencedor	=	new Vencedor();
		$editVencedor	=	$ClassVencedor-> editVencedor($_POST['id_vencedor']);

	endif;

else:

	echo 'el archivo "'.$file.'" no existe';
endif;

//print_r(json_encode($resp));

?>