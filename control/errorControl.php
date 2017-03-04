<?php

	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf8"/>
		<title>S.A.A.M.R.Y</title>
		<link rel="stylesheet" href="../../vista/public/default.css" media="all"/>
		<link rel="stylesheet" href="" media="all"/>
		<link rel="stylesheet" href="" media="all"/>
	</head>
	<body>
	<?php

	if(isset($_GET["file"])):
	$file=$_GET["file"];
?>
		<div id="bloque-error">
			<div class="error-file">El archivo con el nombre <strong><?php echo $file;?></strong> no se encontro.<br>
			Por favor verifique que la ruta sea la correcta.</div>
		</div>
		<?php
	endif;
		?>
	</body>
</html>
