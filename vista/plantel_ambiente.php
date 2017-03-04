
<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
$classUser=new Usuario();


endif;
////////////////////////////////

$file="../model/ModelPlantel.php";
if(file_exists($file)):
	require_once($file);
$classPlantel=new  Plantel();

if(isset($_GET["vistaP_A"])):

	switch($_GET["vistaP_A"])
	{

		case '1':
		?>
			
			<div class="menu-izquierdo">
						<ul class="list-menu-izquierdo">
							<li><a href="javascript:void(0);" id="add-plantel" >Agregar  Plantel</a></li>
							<li><a href="javascript:void(0);" id="update-plantel">Modificación de Plantel</a></li>
							<li><a href="javascript:void(0);" id="add-ambiente">Agregar Ambiente</a></li>
							<li><a href="javascript:void(0);" id="update-ambiente">Modificación Ambiente</a></li>
							<li><a href="javascript:void(0);" id="add-materiales-ambiente">Asignar materiales a un Ambiente</a></li>
							<li><a href="javascript:void(0);" id="asignar-vencedor-ambiente">Asignar vencedor a un Ambiente</a></li>
							<!--<li><a href="javascript:void(0);">Asignación de estudiantes a un sesion</a></li>
							<li><a href="javascript:void(0);">Modificación de estudiantes a una sesion</a></li>
							<li><a href="javascript:void(0);">Modificación de usuarios en sesion y materia</a></li>-->
						</ul>
					</div>

		

		<?php

		break;

		case '2':
		?>
			<form id="form-user">
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<fieldset>
	<div class="titulo"><legend><h2>Registro de Plantel</h2></legend></div>
		
		
		<div class="bloque-data-left">
			
			<label>Nombre:</label>
				<input style="width:80%" type="text" name="nom_plantel" id="nom_plantel" maxlength="100"/>
			<label>Direcc.Plantel:</label>
				<input style="width:80%" type="text" name="direcc_plantel" id="direcc_plantel" maxlength="200" placeholder=""/>
			<label>Estado:</label>
				<input style="width:50%" type="text" name="estado" id="estado" maxlength="30" placeholder=""/>
			<label>Municipio:</label>
				<input style="width:50%" type="text" name="municipio" id="municipio" maxlength="30" placeholder=""/>
			
		
			
			<label>Parroquia:</label>
				<input style="width:50%" type="text" name="parroquia" id="parroquia" maxlength="30" placeholder=""/>

			<label>Cod.Plantel:</label>
				<input style="width:50%" type="text" name="codigo_plantel" id="codigo_plantel" maxlength="30" placeholder=""/>
			<label>Cod.Plan.Estudio:</label>
				<input style="width:50%" type="text" name="plan_de_estudio" id="plan_de_estudio" maxlength="30" placeholder=""/>
		
		</div>
		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Guardar" id="submit-agregar-plantel">

	</fieldset>
</form>


		<?php

		break;

		case '3':
		?>

			<div id="cont-select-user">
			<h2>Modificación de plantel</h2>
			<div class="espacio"></div>
			<form id="data-select-id-user">
			<select name="usuario" id="select-data-user" class="select-data-user-dinamic">
			<?php
			$selectPalntel=$classPlantel->getplantel();
			foreach($selectPalntel as $key => $value):
			?>
				
	<option class="select-id-data-user" value="<?php echo $value['id_plantel'];?>">

		<?php echo strtoupper($value['nombre_plantel']);?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Código DEA</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo ucfirst($value['codigo_plantel']);?>

	</option>
			
				

			<?php
			endforeach;
			?>
			</select>
			<input type="submit" value="buscar" id="select-buscar-plantel"/>
			</form>
			</div><!--fin del cont-select-user-->
		<?php			

		break;

		case '4':

			if(isset($_GET['id_plantel'])):
				//echo $_GET['id_plantel'];
				$datos_plantel=$classPlantel->get_plantel_por_id($_GET['id_plantel']);
				?>
			<form id="form-user">
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<input type="hidden" name="id_plantel" id="id_plantel" value="<?php echo $datos_plantel[0]['id_plantel']?>"/>
	<fieldset>
	<div class="titulo"><legend><h2>Edición de Plantel</h2></legend></div>
		
		
		<div class="bloque-data-left">
			
			<label>Nombre:</label>
				<input type="text" name="nom_plantel" id="nom_plantel" maxlength="100" value="<?php echo strtoupper($datos_plantel[0]['nombre_plantel']);?>"/>
			<label>Direcc.Plantel:</label>
				<input type="text" name="direcc_plantel" id="direcc_plantel" maxlength="200" placeholder="" value="<?php echo strtoupper($datos_plantel[0]['direcc_plantel']);?>"/>
			<label>Estado:</label>
				<input style="width:50%" type="text" name="estado" id="estado" maxlength="30" placeholder="" value="<?php echo ucwords($datos_plantel[0]['estado']);?>"/>
			<label>Municipio:</label>
				<input style="width:50%" type="text" name="municipio" id="municipio" maxlength="30" placeholder="" value="<?php echo ucwords($datos_plantel[0]['municipio']);?>"/>
			<label>Parroquia:</label>
				<input style="width:50%" type="text" name="parroquia" id="parroquia" maxlength="30" placeholder="" value="<?php echo ucwords($datos_plantel[0]['parroquia']);?>"/>
			<label>Cod.Plantel:</label>
				<input style="width:50%" type="text" name="codigo_plantel" id="codigo_plantel" maxlength="30" placeholder="" value="<?php echo $datos_plantel[0]['codigo_plantel']?>"/>
			<label>Plan.Estudio:</label>
				<input style="width:50%" type="text" name="plan_de_estudio" id="plan_de_estudio" maxlength="30" placeholder="" value="<?php echo $datos_plantel[0]['plan_de_estudio']?>"/>
		
		</div>
		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Editar" id="submit-editar-plantel">

	</fieldset>
</form>


		<?php
		

			else:

			endif;
		break;

		case '5':

		?>
			<form id="form-user">
			<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
			<fieldset>
			<div class="titulo"><legend><h2>Registro de nuevo Ambiente</h2></legend></div>
				
		
			<div class="bloque-data-left">
			
				<label>Nombre:</label>
					<input type="text" name="nombre_ambiente" id="nombre_ambiente" maxlength="100"/>
				<label>Tipo de Ambiente:</label>
					<select style="width:40%" name="tipo_ambiente" id="tipo_ambiente">
						<option value="">Seleccione el tipo de Ambiente</option>
						<option value="Robinson">Robinson</option>
						<option value="Penitenciario">Penitenciario</option>
						<option value="Centro de trabajo">Centro de trabajo</option>
						<option value="Indígena">Indígena</option>
						<option value="Con discapacidad">Con discapacidad</option>
						<option value="Alternativo">Alternativo</option>
					</select><br>
				<label>Turno de Clase:</label>
					<select  style="width:40%" name="turno_clase" id="turno_clase">
						<option value="">Seleccione el turno de clase</option>
						<option value="Lunes a Viernes">Lunes a Viernes</option>
						<option value="Sabado a Domingo">Sabado a Domingo</option>
					</select>
			<div class="espacio"></div>
				<label>Horario de Clase:</label>
					<select  style="width:40%" name="horario_clase" id="horario_clase">
						<option value="">Seleccione el horario clase</option>
						<option value="Diurno">Diurno</option>
						<option value="Nocturno">Nocturno</option>
					</select><br>

				<div class="espacio"></div>
				<label>Facilitador:</label>
					<select  style="width:40%" name="id_user_facilitador" id="id_user_facilitador">
						<option value="">Seleccione el Facilitador asignado para el Ambiente</option>
						<?php
						$perfil_facilitador=$classUser->get_usuario_perfil_facilitador();
						foreach($perfil_facilitador as $key => $value):
						?>
						<option value="<?php echo $value['id_user']?>">
						<?php echo $value['nombre1']?>&nbsp;
						<?php echo $value['apellido1']?>
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>
				<div class="espacio"></div>
				<label>Coordinador:</label>
					<select  style="width:40%" name="id_user_coordinador" id="id_user_coordinador">
						<option value="">Seleccione el Coordinador asignado para el Ambiente</option>
						<?php
						$perfil_coordinador=$classUser->get_usuario_perfil_coordinador();
						foreach($perfil_coordinador as $key => $value):
						?>
						<option value="<?php echo $value['id_user']?>">
						<?php echo $value['nombre1']?>&nbsp;
						<?php echo $value['apellido1']?>
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>
					<div class="espacio"></div>
				<label>Vocero:</label>
					<select  style="width:40%" name="id_user_vocero" id="id_user_vocero">
						<option value="">Seleccione el Vocero asignado para el Ambiente</option>
						<?php
						$perfil_vocero=$classUser->get_usuario_perfil_vocero();
						foreach($perfil_vocero as $key => $value):
						?>
						<option value="<?php echo $value['id_user']?>">
						<?php echo $value['nombre1']?>&nbsp;
						<?php echo $value['apellido1']?>
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>


					<div class="espacio"></div>
				<label>Cohorte:</label>
					<select  style="width:40%" name="id_cohorte" id="id_cohorte">
						<option value="">Seleccione la Cohorte asignada al Ambiente</option>
						<?php
						$Cohorte=$classPlantel->get_cohorte();
						foreach($Cohorte as $key => $value):
						?>
						<option value="<?php echo $value['id_cohorte']?>">
						<?php echo $value['describe_cohorte']?>&nbsp;&nbsp;
						<?php echo $value['tipo_cohorte']?>&nbsp;
						
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>
					<label>Semestre:</label>
					<select  style="width:40%" name="id_semestre" id="id_semestre">
						<option value="">Seleccione el semestre asignado al Ambiente</option>
						
					</select><br>


				
				<div class="espacio"></div>
				<label>Plantel:</label>
					<select  style="width:40%" name="id_plantel" id="id_plantel">
						<option value="">Seleccione el Plantel que se asignara al Ambiente</option>
						<?php
						$selectPalntel=$classPlantel->getplantel();
						foreach($selectPalntel as $key => $value):
						?>
						<option value="<?php echo $value['id_plantel'];?>">
						<?php echo strtoupper($value['nombre_plantel']);?>-- 
						<?php echo strtoupper($value['codigo_plantel']);?>--
						
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>
			
			</div>

		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Guardar" id="submit-agregar-ambiente">
		</div>

	</fieldset>
</form>


		<?php
			
		break;

		case '6':
			?>

			<div id="cont-select-user">
			<h2>Modificación de Ambiente</h2>
			<div class="espacio"></div>
			<form id="data-select-id-user">
			<select name="usuario" id="select-data-user" class="select-data-user-dinamic">
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
			<input type="submit" value="buscar" id="select-buscar-ambiente"/>
			</form>
			</div><!--fin del cont-select-user-->
		<?php			

		break;

		case '7':
		if(isset($_GET['id_ambiente'])):
			$ambiente_por_id=$classPlantel->get_ambiente_por_id($_GET['id_ambiente']);

			?>
			<form id="form-user">
			<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
			<input type="hidden" name="id_ambiente" id="id_ambiente" value="<?php echo $_GET['id_ambiente'];?>"/>
			<fieldset>
			<div class="titulo"><legend><h2>Edición de Ambiente</h2></legend></div>

				
			<div class="bloque-data-left">
			
				<label>Nombre:</label>
					<input type="text" name="nombre_ambiente" id="nombre_ambiente" maxlength="100" readonly="readonly" value="<?php echo strtoupper($ambiente_por_id[0]['nombre_ambiente']);?>"/>
				<label>Tipo de Ambiente:</label>
				<?php $tipo =$ambiente_por_id[0]['tipo_ambiente'];?>

					<select style="width:40%" name="tipo_ambiente" id="tipo_ambiente">
						<option value="Robinson"           <?php if($tipo=="Robinson")          echo "selected";?> >Robinson</option>
						<option value="Penitenciario"      <?php if($tipo=="Penitenciario")     echo "selected";?> >Penitenciario</option>
						<option value="Centro de trabajo"  <?php if($tipo=="Centro de trabajo") echo "selected";?> >Centro de trabajo</option>
						<option value="Indígena"           <?php if($tipo=="Indígena")          echo "selected";?> >Indígena</option>
						<option value="Con discapacidad"   <?php if($tipo=="Con discapacidad")  echo "selected";?> >Con discapacidad</option>
						<option value="Alternativo"        <?php if($tipo=="Alternativo")       echo "selected";?> >Alternativo</option>
					</select><br>
					<div class="espacio"></div>
			
				<label>Turno de Clase:</label>
				<?php $turno =$ambiente_por_id[0]['turno_clase'];?>
					<select  style="width:40%" name="turno_clase" id="turno_clase">
						<option value="Lunes a Viernes" <?php  if($turno=='Lunes a Viernes')  	echo "selected"?> >Lunes a Viernes</option>
						<option value="Sabado a Domingo" <?php if($turno=='Sabado a Domingo') 	echo "selected"?> >Sabado a Domingo</option>
					</select>
					<div class="espacio"></div>

				<label>Horario de Clase:</label>
				<?php $horario =$ambiente_por_id[0]['horario_clase'];?>
					<select  style="width:40%" name="horario_clase" id="horario_clase">
						<option value="Diurno" 		<?php  	if($horario == 'Diurno') 	echo 'selected'?>>Diurno</option>
						<option value="Nocturno" 	<?php 	if($horario == 'Nocturno') 	echo 'selected'?>>Nocturno</option>
					</select><br>

				<div class="espacio"></div>

				<label>Facilitador:</label>
				<?php $id_user_f =$ambiente_por_id[0]['id_user_facilitador'];?>

					<select  style="width:40%" name="id_user_facilitador" id="id_user_facilitador">

					<?php $user_id_f = $classUser->get_Usuario_por_Id($id_user_f);?>

						<option value="<?php echo $id_user_f;?>" selected="selected">
						<?php echo $user_id_f[0]['nombre1'];?> 
						<?php echo $user_id_f[0]['apellido1'];?>
						</option>

					<?php

						$perfil_facilitador=$classUser->get_usuario_perfil_facilitador();

						foreach($perfil_facilitador as $key => $value):
						?>
						<option value="<?php echo $value['id_user']?>" >
						<?php echo $value['nombre1']?>&nbsp;
						<?php echo $value['apellido1']?>
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>

				<div class="espacio"></div>
				<label>Coordinador:</label>
				<?php $id_user_c =$ambiente_por_id[0]['id_user_coordinador'];?>

					<select  style="width:40%" name="id_user_coordinador" id="id_user_coordinador">
					<?php $user_id_c = $classUser->get_Usuario_por_Id($id_user_c);?>
					<option value="<?php echo $id_user_c;?>">
						<?php echo $user_id_c[0]['nombre1'];?> 
						<?php echo $user_id_c[0]['apellido1'];?>
						</option>
						
						<?php
						$perfil_coordinador=$classUser->get_usuario_perfil_coordinador();
						foreach($perfil_coordinador as $key => $value):
						?>
						<option value="<?php echo $value['id_user']?>">
						<?php echo $value['nombre1']?>&nbsp;
						<?php echo $value['apellido1']?>
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>

					<div class="espacio"></div>
				<label>Vocero:</label>
				<?php $id_user_v =$ambiente_por_id[0]['id_user_vocero'];?>

					<select  style="width:40%" name="id_user_vocero" id="id_user_vocero">
					<?php $user_id_v = $classUser->get_Usuario_por_Id($id_user_v);?>
					<option value="<?php echo $id_user_v;?>">
						<?php echo $user_id_v[0]['nombre1'];?> 
						<?php echo $user_id_v[0]['apellido1'];?>
						</option>
						
						<?php
						$perfil_vocero=$classUser->get_usuario_perfil_vocero();
						foreach($perfil_vocero as $key => $value):
						?>
						<option value="<?php echo $value['id_user']?>">
						<?php echo $value['nombre1']?>&nbsp;
						<?php echo $value['apellido1']?>
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>


					<div class="espacio"></div>
				<label>Cohorte:</label>
				<?php $id_cohorte =$ambiente_por_id[0]['id_cohorte'];?>

					<select  style="width:40%" name="id_cohorte" id="id_cohorte">
					<?php $id_co = $classPlantel->get_cohorte_id($id_cohorte);?>
						<option value="<?php echo $id_cohorte;?>">
						<?php echo $id_co[0]['describe_cohorte'];?>
						<?php echo $id_co[0]['tipo_cohorte'];?>
						</option>
						<?php
						$Cohorte=$classPlantel->get_cohorte();
						$nombrecorte =  $id_co[0]['describe_cohorte'];
						foreach($Cohorte as $key => $value):
							if($nombrecorte == $value['describe_cohorte']):

								?>
									<option value="<?php echo $value['id_cohorte']?>" selected >
									<?php echo $value['describe_cohorte']?>
									<?php echo $value['tipo_cohorte']?>
								<?php

							else:
								?>
									<option value="<?php echo $value['id_cohorte']?>">
									<?php echo $value['describe_cohorte']?>
									<?php echo $value['tipo_cohorte']?>
								<?php

							endif;
						?>
						
						
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>
					<?php $id_semestre =$ambiente_por_id[0]['id_semestre'];?>
					<label>Semestre:</label>
					<?php $id_s = $classPlantel->get_semestre_id_cohorte($id_cohorte);?>
					<select  style="width:40%" name="id_semestre" id="id_semestre">
						<?php
							foreach ($id_s as $key => $value) :
								?>
									<option value="<?php echo $value['id_semestre']?>">
										<?php echo $value['decribe_semestre']?>
									</option>
								<?php
							endforeach;
						?>
						
					</select><br>

				<div class="espacio"></div>
				<label>Plantel:</label>
				<?php $id_plantel =$ambiente_por_id[0]['id_plantel'];?>
					<select  style="width:auto" name="id_plantel" id="id_plantel">
					<?php $id_plant = $classPlantel->get_plantel_por_id($id_plantel);?>

						<option value="<?php echo $id_plantel;?>">
						<?php echo strtoupper($id_plant[0]['nombre_plantel']);?>&nbsp;&nbsp;Código DEA&nbsp;&nbsp;
						<?php echo $id_plant[0]['codigo_plantel'];?>
						</option>
						<?php
						$selectPalntel=$classPlantel->getplantel();
						foreach($selectPalntel as $key => $value):
						?>
						<option value="<?php echo $value['id_plantel'];?>">
						<?php echo strtoupper($value['nombre_plantel']);?>-- 
						<?php echo strtoupper($value['codigo_plantel']);?>--
						
						</option>
					
						<?php
						endforeach;
						?>
					</select><br>
			
			</div>

		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<a style="padding:4px;margin-left:15px" data-idambiente="<?php echo $_GET['id_ambiente'];?>" class="ui-widget-header" href="javascript:void(0);">
		Ver Materiales asignados</a>
		<input type="submit" value="Guardar" id="submit-edit-ambiente">
		</div>

	</fieldset>
</form>


		<?php
		else:

		endif;
		break;

		case'8':


			?>

			<form id="form-user">
				<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
				<fieldset>
				<div class="titulo"><legend><h2>Materiales</h2></legend></div>
					
		
					<div class="bloque-data-left">
					<label>Seleccione el Ambiente</label>
						<select style="width:60%" name="id_ambiente" id="id_ambiente" >
						<?php
							$selectAmbiente=$classPlantel->getAmbiente();
							foreach($selectAmbiente as $key => $value):
							?>
								<option  value="<?php echo $value['id_ambiente']?>">
								<?php echo strtoupper($value['nombre_ambiente']);?>				
								</option>
						<?php
						endforeach;
						?>
						</select>
						
					</div>
					<div class="bloque-datos-left-2">
						<div class="titulo"><legend><h2>DVD</h2></legend></div>
						<label>Fecha de asignación</label>
						<input style="width:calc(100% - 10%)"type="text" name="fec_asig_dvd" id="fec_asig_dvd" />
						<label>Marca</label>
						<input style="width:calc(100% - 10%)"type="text" name="marca_dvd" id="marca_dvd" />
						<label>Modelo</label>
						<input style="width:calc(100% - 10%)"type="text" name="modelo_dvd" id="modelo_dvd" />
						<label>Serial.Fabrica</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_dvd" id="serial_dvd" />
						<label>Serial.Ribas</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_ribas_dvd" id="serial_ribas_dvd" />
					</div>

					<div class="bloque-datos-left-2">
						<div class="titulo"><legend><h2>TELEVISOR</h2></legend></div>
						<label>Fecha de asignación</label>
						<input style="width:calc(100% - 10%)"type="text" name="fec_asig_tv" id="fec_asig_tv" />
						<label>Marca</label>
						<input style="width:calc(100% - 10%)"type="text" name="marca_tv" id="marca_tv" />
						<label>Modelo</label>
						<input style="width:calc(100% - 10%)"type="text" name="modelo_tv" id="modelo_tv" />
						<label>Serial.Fabrica</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_tv" id="serial_tv" />
						<label>Serial.Ribas</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_ribas_tv" id="serial_ribas_tv" />
					</div>

					<div class="bloque-datos-left-2">
					<div class="titulo"><legend><h2>FOLLETO</h2></legend></div>
					<label>Fecha de asignación</label>
						<input style="width:calc(100% - 10%)"type="text" name="fec_asig_folleto" id="fec_asig_folleto" />
					<label>Cantidad de Folletos</label>
						<input style="width:calc(100% - 10%)"type="text" name="cantidad_folleto" id="cantidad_folleto" />
						<label>Kit de video clases</label>
						<input style="width:calc(100% - 10%)"type="text" name="kit_video_clase" id="kit_video_clase" />	
					</div>

						<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
						<input type="submit" value="Guardar" id="submit-agregar-materiales">

				</fieldset>
		</form>


			<?php

		break;
		case '9':
					if(isset($_GET['id_ambiente']) AND is_numeric($_GET['id_ambiente'])):

					$materialesAmbiente=$classPlantel->get_Ambiente_Materiales($_GET['id_ambiente']);
					$nombreAmbiente = strtoupper($materialesAmbiente[0]['nombre_ambiente']);
						?>
			<div class="hide">

			<form id="form-user">
				<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
				<input type="hidden" name="id_ambiente" id="id_ambiente" value="<?php echo $_GET['id_ambiente'];?>"/>
				<fieldset>
				<div class="titulo">
					<legend>
						<h2>Materiales asignados</h2>
					</legend>
						<img class="boton-cancelar" src="<?php echo Conectar::ruta()?>vista/public/img/botoncancelar.png"/>
				</div>
				<?php
				if(!$nombreAmbiente):
					?>
						<p class="triangle-right top">No existen materiales asignados al Ambiente</p>
						<script>
						$('#submit-activar-edit-materiales').hide();
						</script>
					<?php

				else:

					?>
						<p class="triangle-right top">Ambiente <?php echo $nombreAmbiente;?></p>
					<?php

				endif;
				?>
					
		

					<div class="bloque-datos-left-2">
						<div class="titulo"><legend><h2>DVD</h2></legend></div>
						<label>Fecha de asignación</label>
						<input style="width:calc(100% - 10%)"type="text" name="fec_asig_dvd" id="fec_asig_dvd" readonly="readonly" value="<?php echo $materialesAmbiente[0]['fec_asignado_dvd'];?>"/>
						<label>Marca</label>
						<input style="width:calc(100% - 10%)"type="text" name="marca_dvd" id="marca_dvd" readonly="readonly" value="<?php echo $materialesAmbiente[0]['marca_dvd'];?>"/>
						<label>Modelo</label>
						<input style="width:calc(100% - 10%)"type="text" name="modelo_dvd" id="modelo_dvd" readonly="readonly" value="<?php echo $materialesAmbiente[0]['modelo_dvd'];?>"/>
						<label>Serial.Fabrica</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_dvd" id="serial_dvd" readonly="readonly" value="<?php echo $materialesAmbiente[0]['serial_fabrica_dvd'];?>"/>
						<label>Serial.Ribas</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_ribas_dvd" id="serial_ribas_dvd" readonly="readonly" value="<?php echo $materialesAmbiente[0]['serial_ribas_dvd'];?>"/>
					</div>

					<div class="bloque-datos-left-2">
						<div class="titulo"><legend><h2>TELEVISOR</h2></legend></div>
						<label>Fecha de asignación</label>
						<input style="width:calc(100% - 10%)"type="text" name="fec_asig_tv" id="fec_asig_tv" readonly="readonly" value="<?php echo $materialesAmbiente[0]['fec_asignado_tv'];?>"/>
						<label>Marca</label>
						<input style="width:calc(100% - 10%)"type="text" name="marca_tv" id="marca_tv" readonly="readonly" value="<?php echo $materialesAmbiente[0]['marca_tv'];?>"/>
						<label>Modelo</label>
						<input style="width:calc(100% - 10%)"type="text" name="modelo_tv" id="modelo_tv" readonly="readonly" value="<?php echo $materialesAmbiente[0]['modelo_tv'];?>"/>
						<label>Serial.Fabrica</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_tv" id="serial_tv" readonly="readonly" value="<?php echo $materialesAmbiente[0]['serial_de_fabrica_tv'];?>"/>
						<label>Serial.Ribas</label>
						<input style="width:calc(100% - 10%)"type="text" name="serial_ribas_tv" id="serial_ribas_tv" readonly="readonly" value="<?php echo $materialesAmbiente[0]['serial_ribas_tv'];?>"/>
					</div>

					<div class="bloque-datos-left-2">
					<div class="titulo"><legend><h2>FOLLETO</h2></legend></div>
					<label>Fecha de asignación</label>
						<input style="width:calc(100% - 10%)"type="text" name="fec_asig_folleto" id="fec_asig_folleto" readonly="readonly" value="<?php echo $materialesAmbiente[0]['fec_asignado_folleto'];?>"/>
					<label>Cantidad de Folletos</label>
						<input style="width:calc(100% - 10%)"type="text" name="cantidad_folleto" id="cantidad_folleto" readonly="readonly" value="<?php echo $materialesAmbiente[0]['cantidad_folleto'];?>"/>
						<label>Kit de video clases</label>
						<input style="width:calc(100% - 10%)"type="text" name="kit_video_clase" id="kit_video_clase" readonly="readonly" value="<?php echo $materialesAmbiente[0]['kit_video_clase'];?>"/>	
					</div>

						<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
						<input type="button" value="Activar edición" id="submit-activar-edit-materiales"></div>

				</fieldset>
		</form>

</div>
			<?php

					else:

					endif;
				

		break;

		default:

		break;
	}

	endif;

else:
	?>
		<div id="cont-select-user">
			<h2>no existe</h2>
		</div>
	<?php
endif;
?>






























