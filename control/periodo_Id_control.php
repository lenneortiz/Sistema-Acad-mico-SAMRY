<?php

$file="../model/ModelPlantel.php";
if(file_exists($file)):
	require_once($file);
	$classPlantel=new  Plantel();
	$semestre =$classPlantel->get_semestre_id_cohorte($_GET['id_cohorte']);

		if(isset($_GET['id_cohorte'])):
			foreach($semestre as $key => $value):
			?>
			<option value="<?php echo $value['id_semestre']?>"><?php echo $value['decribe_semestre']?></option>
			<?php
			endforeach;

		else:

		endif;

endif;
?>