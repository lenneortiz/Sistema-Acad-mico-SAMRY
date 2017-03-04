<?php
sleep(1);
$file="../model/ModelMateria.php";
if(file_exists($file)):
	require_once($file);
	$classMateria=new  Materia();

	if(isset($_GET['tipo']) AND $_GET['tipo']=='update'):

		$editMateria=$classMateria->editMateria();

	endif;

else:

echo"no existe el archivo '".$file."'";
endif;




?>

