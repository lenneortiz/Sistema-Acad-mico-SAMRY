<?php
$file="../model/ModelCohorte.php";
if(file_exists($file)):
	require_once($file);
	$classCohorte=new  Cohorte();
endif;


$file="../model/ModelPlantel.php";
if(file_exists($file)):
	require_once($file);
	$classPlantel=new  Plantel();
endif;

if(isset($_GET['vistaInforme'])):

	switch ($_GET['vistaInforme']) :

		case '1':
			?>
			<div class="menu-izquierdo">
						<ul class="list-menu-izquierdo">
							<li><a href="javascript:void(0);" id="total-semestres" >Informes de semestres por cohorte</a></li>
							<li><a href="javascript:void(0);" id="tabla-data-usuario">Listado de Matricula inicial</a></li>
							<li><a href="javascript:void(0);" id="informes-materiales-asignado-ambiente">Informes de materiales asignados a un ambiente</a></li>
							<!--<li><a href="javascript:void(0);">Asignación de estudiantes a un sesion</a></li>
							<li><a href="javascript:void(0);">Modificación de estudiantes a una sesion</a></li>
							<li><a href="javascript:void(0);">Modificación de usuarios en sesion y materia</a></li>-->
						</ul>
					</div>

			<?php
			break;

			case '2':

				?>
				<div id="cont-select-user">
					<h2>Informe por semestre</h2>
					<div class="espacio"></div>
					<form id="form" action="<?php echo Conectar::ruta()?>control/controlReporte_semestre.php">
						<select style="width:40%" name="id_cohorte" id="id_cohorte">
						<option value="">Seleccione una cohorte</option>
						<?php
						$selectCohorte=$classCohorte->get_Cohorte();
						foreach($selectCohorte as $key => $value):
						?>

						<option class="select-id-data-user" value="<?php echo $value['id_cohorte']?>">
						<?php echo strtoupper($value['describe_cohorte']);?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo strtoupper($value['tipo_cohorte']);?>
						</option>
						
							

						<?php
						endforeach;
						?>
						</select>

						<select  style="width:30%;position:relative;visibility:hidden" name="id_semestre" id="id_semestre">
							<option value="">Seleccione un semestre</option>
								
						</select>

					
						<input style="visibility:hidden"  type="submit" value="buscar" id="select-buscar-semestre"/>
					</form>
					</div><!--fin del cont-select-user-->
				<?php

			break;

			case '3':
				?>
					<div id="cont-select-user">
					<h2>Informe de materiales asignados a un Ambiente</h2>
					<div class="espacio"></div>
					<form id="data-select-id-user" action="<?php echo Conectar::ruta()?>control/materialesAsignadoAmbienteControl.php">
						<select name="id_ambiente" id="select-data-user" class="select-data-user-dinamic">
						<option value="">SELECCIONE EL AMBIENTE</option>
						<?php
						$selectAmbiente=$classPlantel->getAmbiente();
						foreach($selectAmbiente as $key => $value):
						?>
							
						<option class="select-id-data-user" value="<?php echo $value['id_ambiente']?>">

							<?php echo strtoupper($value['nombre_ambiente']);?>				

							</option>
						
							

						<?php
						endforeach;
						?>
						</select>
						<input type="submit" value="buscar" id="submit-informe-ambiente"/>
					</form>
					</div><!--fin del cont-select-user-->
				<?php

			break;
		
		default:
			# code...
			break;
	endswitch;

else:

endif;

?>