<?php
$file="../model/ModelMateria.php";
if(file_exists($file)):
	require_once($file);
$classMateria=new  Materia();

	if(isset($_GET['tipo']) AND $_GET['tipo'] == 'delete'):

		$deleteMateria=$classMateria->deleteMateria($_GET['idMateria']);

	endif;

endif;
?>