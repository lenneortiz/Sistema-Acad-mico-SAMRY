<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
//print_r($_SESSION);
else:
	$ruta='http://www.ribas.com/';
	$archivo=$file;
	header("Location:".$ruta."control/errorControl.php?file='".$archivo."'");
	
endif;
if(isset($_SESSION['nombre1']) ):
	$nom1 	= $_SESSION['nombre1'];
	$nom2 	= $_SESSION['nombre2'];
	$ap1 	= $_SESSION['apellido1'];
	$ap2 	= $_SESSION['apellido2'];
	$sexo 	= $_SESSION['sexo'];
	$perfil = $_SESSION['perfil'];
	
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>S.A.A.M.R.Y</title>
		<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/default.css" media="all"/>
		<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/form-registro-user.css" media="all"/>
		<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/demo_table_jui.css" media="all"/>
		<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/jquery-ui-1.10.4.custom.css" media="all"/>
		<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/tooltip.css" media="all"/>
		<!--<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/bootstrap.min.css" media="all"/>
		<link rel="stylesheet" href="<?php echo Conectar::ruta()?>vista/public/css/bootstrap-theme.css" media="all"/>-->
		
		
      	<!--<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/bootstrap.js"/></script>
      	<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/bootstrap.min.js"/></script>-->
		
		<script type="text/javascript">

		</script>
		
		<style type="text/css">
		.loader
		{
			display: none
		}
		</style>
	</head>
	
	<body>
	 
		<div id="cont-pag">

          			<?php require_once'header.php';?>
          			
          			<?php require_once'menu.php';?>

          			   <div id="body"><!--inicio body-->

          				
                				    <div id="seccion"><!--inicio seccioon-->

                				              <div class="articulo"></div>

                            </div><!--fin seccioon-->


                				    <div id="barra-izquierda"><!--inicio barra izquierda-->

                					         <div class="modulo"></div><!--fin del modulo-->

                            </div><!--fin barra izquierda-->

                			
                				      <?php require_once'footer.php';?>

          			   </div><!--fin body-->

          		    <?php require_once'beforeSend.php';?>	
          		   
          	<?php require_once'modal.php';?>

		</div><!--fin cont-pag-->
		<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/jquery-1.9.1.min.js"/></script>
		<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/funciones.js"/></script>
    	<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/jsProyect.js"></script>
		<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/jquery.dataTables.min.js"/></script>
		<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/jquery-ui-1.10.3.custom.min.js"/></script>
		<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/modernizr.js"/></script>
    	<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/jquery.jrumble.1.3.min.js"/></script>
      	<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/prettify.js"/></script>
      	<script type="text/javascript" src="<?php echo Conectar::ruta()?>vista/public/js/config_calendario.js"/></script>
	</body>
</html>
<?php
else:
header("Location:".Usuario::ruta()."index.php?r=4");
endif;
?>