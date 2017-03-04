<?php
$file="../model/ModelVencedor.php";
if(file_exists($file)):
	require_once($file);
$ClassVencedores=new Vencedor();

endif;

if(isset($_GET['vistaVencedor'])):

switch($_GET["vistaVencedor"])
	{

		case '1':
		?>
			
			<div class="menu-izquierdo">
						<ul class="list-menu-izquierdo">
							<li><a href="javascript:void(0);" id="add-vencedor">Agregar Vencedor</a></li>
							<li><a href="javascript:void(0);" id="update-vencedor">Modificar de Vencedor</a></li>
							
					
							
						</ul>
					</div>

		

		<?php

		break;

		case '2':
			?>

				<form id="form-user">
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<input type="hidden" name="estado" id="estado" value="ACTIVO"/>
	<fieldset>
	<div class="titulo"><legend><h2>Registro de nuevo Vencedor</h2></legend></div>
		<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
		
		<div class="bloque-datos-left">
			
			<label>Cédula:</label>
				<input type="text" name="ci" id="ci" maxlength="8"/>
				<label>Nacionalidad:</label>
				<select style="width:25%" name="nacionalidad" id="nacionalidad">
					<option value="">Seleccione</option>
					<option value="E">E</option>
					<option value="V">V</option>
				</select>
			<label>1.er.Nombre:</label>
				<input type="text" name="nombre1" id="nombre1" maxlength="20" placeholder="Primer Nombre"/>
			<label>2.do.Nombre:</label>
				<input type="text" name="nombre2" id="nombre2" maxlength="20" placeholder="Segundo Nombre"/>
			<label>1.er.Apellido:</label>
				<input type="text" name="apellido1" id="apellido1" maxlength="20" placeholder="Primer Apellido"/>
			<label>2.do.Apellido:</label>
				<input type="text" name="apellido2" id="apellido2" maxlength="20" placeholder="Segundo Apellido"/>

			<label>edad:</label>
				<input style="width:10%" type="text" name="edad" id="edad" maxlength="2" placeholder="edad"/>
			<label>Fecha.Nacimiento:</label>
				<input type="text" name="fec_nac" id="fec_nac" maxlength="20" placeholder="20/05/1998"/>
			<label>Teléfono:</label>
				<input type="text" name="telef" id="telef" maxlength="12" placeholder="0000-2345697"/>
			
		</div>

		<div class="bloque-datos-right">

		<label>Lugar de Nacimiento:</label>
				<input type="text" name="lugar_nacimiento" id="lugar_nacimiento" maxlength="80" />
		<label>Estado de Nacimiento:</label>
				<input type="text" name="estado_nac" id="estado_nac" maxlength="80" />


		<label>Sexo:</label>
			<select style="width:60%" name="sexo" id="sexo">
				<option value="">Seleccione una opción</option>
				<option value="M">M</option>
				<option value="F">F</option>
		</select>

		<label>Ultimo añio aprobado</label>
		<select style="width:60%" name="anio_aprobado" id="anio_aprobado">
			<option value="">Seleccione el anio aprobado</option>
			<option value="9">9&#176;</option>
			<option value="6">6&#176;</option>
		</select>

		<label>Robinson</label>
		<input type="text" name="anio_robinson_aprobado" id="anio_robinson_aprobado"/>
		<label>Discapacidad:</label>

			<select style="width:25%" name="discapacidad" id="discapacidad" >
				<option value="">Seleccione</option>
				<option value="AU">Auditiva(AU)</option>
				<option value="PS">Síquica(PS)</option>
				<option value="FI">Física(FI)</option>
				<option value="VI">Visual(VI)</option>
				<option value="OT">Otro tipo(OT)</option>
				<option value="NO">NO</option>
			</select>	
			<div class="espacio"></div>
			<label>Etnia Indigena:</label>
			<input style="width:15%" type="text" name="etnia" id="etnia"/><br>

			<label>Becado:</label>
				<select style="width:25%" name="becado" id="becado">
					<option value="">Seleccione</option>
					<option value="SI">SI</option>
					<option value="No">NO</option>
				</select>
				<div class="espacio"></div>

				<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
				<input type="submit" value="Guardar" id="submit-agregar-vencedor">
				</div>
				
		</div>

		<div class="espacio"></div>

		
		
		


		

	</fieldset>
</form>
			<?php

		break;

		case '3':
		$listar_vencedores=$ClassVencedores->get_vencedor();
			?>
			<table id="tabla" class="display">
			<thead>
				<th >Cédula</th>
				<th >Nacionalidad</th>
				<th >Nombres</th>
				<th >Apellidos</th>
				<th >Teléfono</th>
				<th >Estado</th>
				<th >D.Generales</th>

			</thead>
			<tfoot>
				<th >Cédula</th>
				<th >Nacionalidad</th>
				<th >Nombres</th>
				<th >Apellidos</th>
				<th >Teléfono</th>
				<th >Estado</th>
				<th >D.Generales</th>

			</tfoot>
			<tdbody>
			<?php
				foreach($listar_vencedores as $key => $value):
			?>
				<tr>
					<td><?php echo $value['cedula']?></td>
					<td><?php echo $value['nacionalidad']?></td>
					<td><?php echo ucwords($value['nombres']);?></td>
					<td><?php echo ucwords($value['apellidos']);?></td>
					<td><?php echo $value['telf_vencedor']?></td>
					<td><?php echo $value['estado']?></td>
					<td>
					<a class="data-vencedor" data-idvencedor=<?php echo $value['id_vencedor']?> href="javascript:void(0);">
					<img style="margin-left:30px"src="<?php echo Conectar::ruta()?>vista/public/img/mas1.png">
					</a>
					</td>

				</tr>
			<?php
			endforeach;
			?>

			</tdbody>
				
			</table>
			<?php

		break;
		case '4':

				if(isset($_GET['id_vencedor']) AND is_numeric($_GET['id_vencedor'])):
					$datos_vencedor=$ClassVencedores->get_Vencedor_por_id($_GET['id_vencedor'] );
					?>
				<div class="hide">

				<form id="form-user">
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<input type="hidden" name="id_vencedor" id="id_vencedor" value="<?php echo $_GET['id_vencedor'];?>"/>
	<input type="hidden" name="id_documento" id="id_documento" value="<?php echo $datos_vencedor[0]['id_documento'];?>"/>
	
	<fieldset>
	<div class="titulo"><legend><h2>Datos del Vencedor</h2><img class="boton-cancelar" src="<?php echo Conectar::ruta()?>vista/public/img/botoncancelar.png"/></legend></div>
		<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
		
		<div class="bloque-datos-left">
			
			<label>Cédula:</label>
				<input type="text" name="ci" id="ci" maxlength="8" readonly="readonly" value="<?php echo $datos_vencedor[0]['cedula']?>"/>
				<label>Nacionalidad:</label>
				<?php $nacionalidad = $datos_vencedor[0]['nacionalidad']?>
				<select style="width:10%" name="nacionalidad" id="nacionalidad">
					
					<option value="E" <?php if($nacionalidad == 'E') 	echo 'selected';?> >E</option>
					<option value="V" <?php if($nacionalidad == 'V')	echo 'selected';?> >V</option>
				</select>
			<label>1.er.Nombre:</label>
				<input type="text" name="nombre1" id="nombre1" maxlength="20" placeholder="Primer Nombre" value="<?php echo ucfirst($datos_vencedor[0]['nombre1']);?>"/>
			<label>2.do.Nombre:</label>
				<input type="text" name="nombre2" id="nombre2" maxlength="20" placeholder="Segundo Nombre" value="<?php echo ucfirst($datos_vencedor[0]['nombre2']);?>"/>
			<label>1.er.Apellido:</label>
				<input type="text" name="apellido1" id="apellido1" maxlength="20" placeholder="Primer Apellido" value="<?php echo ucfirst($datos_vencedor[0]['apellido1']);?>"/>
			<label>2.do.Apellido:</label>
				<input type="text" name="apellido2" id="apellido2" maxlength="20" placeholder="Segundo Apellido" value="<?php echo ucfirst($datos_vencedor[0]['apellido2'])?>"/>

			<label>edad:</label>
				<input style="width:10%" type="text" name="edad" id="edad" maxlength="2" placeholder="edad" value="<?php echo $datos_vencedor[0]['edad']?>"/>
			<label>Fecha.Nacimiento:</label>
				<input type="text" name="fec_nac" id="fec_nac" maxlength="20" placeholder="20/05/1998" value="<?php echo $datos_vencedor[0]['fec_nac']?>"/>
			<label>Teléfono:</label>
				<input type="text" name="telef" id="telef" maxlength="12" placeholder="0000-2345697" value="<?php echo $datos_vencedor[0]['telf_vencedor']?>"/>
			
		</div>

		<div class="bloque-datos-left">

		<label>Lugar de Nacimiento:</label>
				<input type="text" name="lugar_nacimiento" id="lugar_nacimiento" maxlength="80" value="<?php echo ucfirst($datos_vencedor[0]['lugar_nacimiento']);?>"/>
		<label>Estado de Nacimiento:</label>
				<input type="text" name="estado_nac" id="estado_nac" maxlength="80" value="<?php echo ucfirst($datos_vencedor[0]['estado_nac'])?>"/>


		<label>Sexo:</label>
			<select style="width:10%" name="sexo" id="sexo">
				<option value="M" <?php if($datos_vencedor[0]['sexo']=='M') echo'selected';?> >M</option>
				<option value="F" <?php if($datos_vencedor[0]['sexo']=='F') echo'selected';?> >F</option>
		</select><br>

		<label>Ultimo añio aprobado</label>
		<?php $anio_aprobado = $datos_vencedor[0]['ultimo_anio_aprobado']?>
		<select style="width:10%" name="anio_aprobado" id="anio_aprobado">
			
								
								<option value="9" <?php if($anio_aprobado == '9') echo 'selected'?> >9&#176;</option>
								<option value="6" <?php if($anio_aprobado == '6') echo 'selected'?> >6&#176;</option>
		
	</select>















		<label>Robinson</label>
		<input type="text" name="anio_robinson_aprobado" id="anio_robinson_aprobado" Value="<?php echo $datos_vencedor[0]['grado_robinson']?>"/>
		<label>Discapacidad:</label>
			<select style="width:25%" name="discapacidad" id="discapacidad" >
				<option value="">Seleccione</option>
				<option value="AU" <?php if($datos_vencedor[0]['discapacidad']=='UA') echo'selected';?>>Auditiva(AU)</option>
				<option value="PS" <?php if($datos_vencedor[0]['discapacidad']=='PS') echo'selected';?>>Síquica(PS)</option>
				<option value="FI" <?php if($datos_vencedor[0]['discapacidad']=='FI') echo'selected';?>>Física(FI)</option>
				<option value="VI" <?php if($datos_vencedor[0]['discapacidad']=='VI') echo'selected';?>>Visual(VI)</option>
				<option value="OT" <?php if($datos_vencedor[0]['discapacidad']=='OT') echo'selected';?>>Otro tipo(OT)</option>
				<option value="NO" <?php if($datos_vencedor[0]['discapacidad']=='NO') echo'selected';?> >NO</option>
			</select>	

			<div class="espacio"></div>
			<label>Etnia Indigena:</label>
			<input style="width:15%" type="text" name="etnia" id="etnia" Value="<?php echo $datos_vencedor[0]['etnia_indigena']?>"/><br>

			<label>Becado:</label>
				<select style="width:10%" name="becado" id="becado">
					<option value="SI" <?php if($datos_vencedor[0]['becado']=='SI') echo'selected';?> >SI</option>
					<option value="NO" <?php if($datos_vencedor[0]['becado']=='NO') echo'selected';?> >NO</option>
				</select>
				<div class="espacio"></div>
				<label>Estatus:</label>
				<select style="width:20%" name="estatus" id="estatus">
					<option value="ACTIVO" 		<?php if($datos_vencedor[0]['estado']=='ACTIVO') echo'selected';?> >ACTIVO</option>
					<option value="NO ACTIVO" <?php if($datos_vencedor[0]['estado']=='NO ACTIVO') echo'selected';?> >NO ACTIVO</option>
				</select>
				<div class="espacio"></div>
				<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
				<input type="submit" value="Guardar" id="submit-edit-vencedor">
				</div>
		</div>

		<div class="espacio"></div>

		
		


		

	</fieldset>
</form>

	</div>
			<?php



				else:
					?>
					<div class="hide">

						<form id="form-user">
			
							<fieldset>
								<div class="titulo">
									<legend>
										<h2>Datos del Vencedor</h2>
										<img class="boton-cancelar" src="<?php echo Conectar::ruta()?>vista/public/img/botoncancelar.png"/>

									</legend>
								</div>
								<p class="triangle-right top">No existe el vencedor</p>

							</fieldset>
						</form>
					</div>
			

			<?php

				endif;
		break;

		case '5':

		break;

		case '6':

		break;

		case '7':

		break;

	}

endif;
?>