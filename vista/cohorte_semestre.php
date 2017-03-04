<?php
$file="../model/ModelCohorte.php";
if(file_exists($file)):
	require_once($file);
	$classCohorte=new  Cohorte();
endif;


$file="../model/ModelMateria.php";
if(file_exists($file)):
	require_once($file);
$classMateria=new  Materia();
$materia =$classMateria->getMateria();

endif;







if(isset($_GET['vista_C_S']) ):

	switch($_GET['vista_C_S']):


case '1':

	?>
		<div class="menu-izquierdo">
						<ul class="list-menu-izquierdo">
							<li><a href="javascript:void(0);" id="crear-periodo" >Creación de Cohorte</a></li>
							<li><a href="javascript:void(0);" id="modificar-cohorte">Modificación de Cohorte </a></li>
							<li><a href="javascript:void(0);" id="crear-semestre">Creación de semestres</a></li>
							<li><a href="javascript:void(0);" id="modificar-semestre">Modificación de semestres </a></li>
							<!--<li><a href="javascript:void(0);">Modificación de tipo de Calificación</a></li>-->
						</ul>
					</div>



	<?php

break;

case '2';

	?>
	<form id="form-user">
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<fieldset>
	<div class="titulo"><legend><h2>Registro de Cohorte</h2></legend></div>
		
		
		<div class="bloque-data-left">
			
			<label>Nombre:</label>
				<input style="width:30%" type="text" name="nom_cohorte" id="nom_cohorte" maxlength="12" placeholder="cohorte-00"/><br>
				<label>Tipo:</label>
			<select style="width:30%" name="tipo_cohorte" id="tipo_cohorte">
				<option value="">Seleccione el tipo cohorte</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select><br>
			<label>Estado:</label>
				<select style="width:30%" name="estado_cohorte" id="estado_cohorte">
				<option value="">Seleccione el estado de la cohorte</option>
				<option value="Activo">Activo</option>
				<option value="No Activo">No Activo</option><br>
				</select><br>
			<label>Fec.Inicio:</label>
				<input style="width:30%" type="text" name="fec_inic_cohorte" id="fec_inic_cohorte" maxlength="10" placeholder="00/00/0000"/><br>
			
			<label>Fec.Fin:</label>
				<input style="width:30%" type="text" name="fec_fin_cohorte" id="fec_fin_cohorte" maxlength="10" placeholder="00/00/0000"/><br>
		
		</div>
		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Guardar" id="submit-agregar-cohorte">

	</fieldset>
</form>

		

	<?php

break;

case '3':

?>
		<div id="cont-select-user">
			<h2>Cohortes</h2>
			<div class="espacio"></div>
			<form id="form">
			<select name="id_cohorte" id="id_cohorte">
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
			<input type="submit" value="buscar" id="select-buscar-cohorte"/>
			</form>
			</div><!--fin del cont-select-user-->
<?php

break;
case '4':

	if(isset($_GET['id_cohorte'])):

			$editCohorte=$classCohorte->get_cohorte_id($_GET['id_cohorte']);
		?>
	<form id="form-user">
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<input type="hidden" name="id_cohorte" id="id_cohorte" value="<?php echo $editCohorte[0]['id_cohorte'];?>"/>
	<fieldset>
	<div class="titulo"><legend><h2>Editar Cohorte</h2></legend></div>
		
		
		<div class="bloque-data-left">
			
			<label>Nombre:</label>
				<input style="width:30%" type="text" name="nom_cohorte" id="nom_cohorte" readonly="readonly" maxlength="12" placeholder="cohorte-00" value="<?php echo $editCohorte[0]['describe_cohorte'];?>"/><br>
				<label>Tipo:</label>
				<?php $tipo_corte = $editCohorte[0]['tipo_cohorte'];?>
			<select style="width:30%" name="tipo_cohorte" id="tipo_cohorte">
				<option value="A" <?php if($tipo_corte == 'A')echo 'selected' ;?> >A</option>
				<option value="B" <?php if($tipo_corte == 'B')echo 'selected' ;?> >B</option>
			</select><br>
			<label>Estado:</label>
				<?php $estado_corte = $editCohorte[0]['estado_cohorte'];?>
				<select style="width:30%" name="estado_cohorte" id="estado_cohorte">

					<?php
			if($estado_corte == 'Activo'):
				?>
					
					<option value="No Activo" <?php echo 'selected;'?>>Activo</option>
					<option value="No Activo">No Activo</option>
				<?php

			elseif ($estado_corte == 'No Activo') :
				?>
					
					<option value="No Activo" <?php echo 'selected;'?>>No Activo</option>
					<option value="Activo">Activo</option>
				<?php

			endif;

			?>
				</select><br>
			<label>Fec.Inicio:</label>
				<input style="width:30%" type="text" name="fec_inic_cohorte" id="fec_inic_cohorte" maxlength="10" placeholder="00/00/0000" value="<?php echo $editCohorte[0]['fec_inic'];?>"/><br>
			
			<label>Fec.Fin:</label>
				<input style="width:30%" type="text" name="fec_fin_cohorte" id="fec_fin_cohorte" maxlength="10" placeholder="00/00/0000" value="<?php echo $editCohorte[0]['fec_fin'];?>"/><br>
		
		</div>
		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Editar" id="submit-edit-cohorte">

	</fieldset>
</form>

		

	<?php

	endif;


break;

case '5':

?>
	<form id="form-user">
	<input type="hidden" name="estatus" value="activo" id="estatus"/>
	<fieldset>
	<div class="titulo"><legend><h2>Registro de nuevo Semestre</legend></h2></div>
		<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
		<input type="hidden" name="tipo" id="tipo" value="insert"/>
		
		
			<div class="bloque-datos-left">
				<label>Cohorte:</label>
					
				<select style="width:55%" name="id_cohorte" id="id_cohorte">
				<option value="">Seleccione</option>
				<?php
				$selectCohorte=$classCohorte->get_Cohorte_Activa();
				foreach($selectCohorte as $key => $value):
				?>
				<option value="<?php echo $value['id_cohorte']?>">
					<?php echo strtoupper($value['describe_cohorte']);?><?php echo strtoupper($value['tipo_cohorte']);?>
				</option>
				
				<?php
				endforeach;
				?>
				</select><br>
		
				<div id="div_select_semestre"></div><br>

				<label>N&#176;.Semestre:</label>
					<select style="width:10%"name="numero_semestre" id="numero_semestre">
						<option value=""></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select><br>
				
			</div>
			<div class="bloque-datos-right">
				
				<label>Fecha de Inicio:</label>
					<input style="width:55%" type="text" name="fec_inic_semestre" id="fec_inic_semestre" maxlength="10"><br>	
				<label>Fecha Fin:</label>
					<input style="width:55%" type="text" name="fec_fin_semestre" id="fec_fin_semestre" maxlength="10"><br>
				<label>Semanas de duración:</label>
					<select style="width:55%" name="num_semana_duracion" id="num_semana_duracion">
						<option value="">Seleccione</option>
						<option value="21">21 semanas</option>
						<option value="28">28 semanas</option>
					</select><br>		

			</div>
			<div class="bloque-data-left">
				

				<div class="container-30">
					
					<div class="titulo"><h2>Áreas de Conocimineto</h2></div>
					<ul>
					<?php
					$totalMateria = count($materia);
					foreach($materia as $key => $value):
					?>
						
						<li style="margin-bottom:1px"><input style="margin-bottom:1px" type="checkbox" name="materia[]" id="materia" value="<?php echo $value['id_materia']?>"><?php echo $value['descripcion']?></li>
						
					<?php
					endforeach;
					?>
					</ul>

					
				</div>

				<div class="container-20">
					
					<div class="titulo"><h2>Horas Semanales</h2></div>
					
					<ul>
					<?php
					for($i = 0;$i<$totalMateria; $i++):
					?>
					<li><input style="margin-left:50%;margin-bottom:1px;width:10%;height:14px" type="text" name="horas[]" id="horas" maxlength="1"></li>
					<?php
					endfor;
					?>
					
					</ul>
						
				</div>

				<div class="container-25">
				<div class="titulo"><h2>Semanales/Quincenales</h2></div>

				<ul>
					<?php
					for($i = 0;$i<$totalMateria; $i++):
					?>
					<li><input style="margin-left:17%;margin-bottom:1px;width:70%;height:14px" type="text" name="semana[]" id="semana" maxlength="13"></li>
					<?php
					endfor;
					?>
					
					</ul>
				</div>

				<div class="container-15">
					
					<div class="titulo"><h2>Nº.Video/área</h2></div>
					<?php
					for($i = 0;$i<$totalMateria; $i++):
					?>
					<input style="margin-left:50%;margin-bottom:1px;width:20%;height:14px" type="number" name="video_clase[]" id="video_clase" maxlength="2">
					<?php
					endfor;
					?>
				</div>
				
				
			

			

		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Guardar" id="submit-agregar-semestre">
		</div>

	</fieldset>
</form>

	


<?php
break;

case'6':
	




break;

	endswitch;

		
	

endif;
?>