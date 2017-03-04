
<?php
$file="../model/ModelMateria.php";
if(file_exists($file)):
	require_once($file);
$classMateria=new  Materia();

if(isset($_GET["vistaMateria"])):

	switch($_GET["vistaMateria"])
	{

		case '1':
		?>
			
			<div class="menu-izquierdo">
						<ul class="list-menu-izquierdo">
							<li><a href="javascript:void(0);" id="admin-materias">Administración de Materias</a></li>
					
							
						</ul>
					</div>

		

		<?php

		break;

		case '2':
		?>
			

<div class="titulo-menu"><h3>Administración de Materias</h3></div>
<div id="accordion">

 

 
<h5>Modificar<span></span></h5>

<div>
<blockquote id="cont-form-materia">

<table cellpadding="0" cellspacing="0" border="1" id="tabla" class="display">
	<thead>
		<th>Cod</th>
		<th>Materia</th>
		<th>Estado</th>
		<th>Modificar</th>
	</thead>
	<tfoot>
		<th>Cod</th>
		<th>Materia</th>
		<th>Estado</th>
		<th>Modificar</th>
	</tfoot>
	<tdbody>
	<?php
	$materia=$classMateria->getMateria();
	foreach($materia as $key => $value):
	?>
		<tr>
			<td><?php echo $value['id_materia']?></td>
			<td><?php echo $value['descripcion']?></td>
			<td><?php echo $value['estado']?></td>
			<td class="edit-materia" data-materia="<?php echo $value['id_materia']?>"><a href="javascript:void(0)">Modificar</a></td>
			
		</tr>
		<?php
		endforeach;
		?>
	</tdbody>
</table>
</blockquote>
</div>

<h5>Agregar<span></span></h5>

<div>
<blockquote id="cont-form-materia">

<form id="form-registro-materia">
	<fieldset>
		<legend>Registro de nueva Materia</legend>
		
			<label>Materia:</label><label>Estado:</label>
				<input style="width:31%" type="text" name="materia" id="materia" maxlength="35"/>
				<select style="width:31%" name="estado" id="estado">
					
					<option value="activo">Activo</option>
					<option value="no activo">No activo</option>
				</select>
				
				<p class="bloq-submit">
				<br>
				<input type="submit" value="Guardar" id="submit-agregar-materia">
				</p>
			
	</fieldset>
</form>


</blockquote>


</div>




<h5>Eliminar<span></span></h5>

<div>
	<blockquote id="cont-form-materia">
<?php
$select_materia=$classMateria->getSelectMateria();
?>		
<form id="form-materia">
	<fieldset>
		<legend>Eliminar Materia</legend>
		
			<label>seleccione:</label><br>
				
				<select style="width:33%" name="materia" id="materia">
					<?php
					foreach($select_materia as $nombrematria => $value):
					?>
					<option  class="select-id-data-materia" value="<?php echo $value['id_materia']?>"><?php echo $value['descripcion']?></option>
					
					<?php
					endforeach;
					?>
				</select>
				
				<p class="bloq-submit">
				<br>
				<input type="submit" value="Eliminar" id="submit-eliminar-materia">
				</p>
			
	</fieldset>
</form>
	</blockquote>
</div>







  <!-- y seguimos agregando elementos enlace + contenido -->
</div>



		<?php

		break;

		case '3':

		if(isset($_GET['idmateria']) and is_numeric($_GET['idmateria']) ):

				$materia_por_id=$classMateria->gettMateriaId($_GET['idmateria']);
			

		endif;
		

			?>

			

<blockquote id="cont-form-materia">

<form id="form-materia">
	<fieldset>
		<legend>Modificación de Materia</legend>
		<input type="hidden" name="id_materia" id="id_materia" value="<?php echo $materia_por_id[0] ['id_materia']?>"/>
			<label>Materia:</label><label>Estado:</label>
				<br><br><br><br>
				<input style="width:31%" type="text" name="materia" id="materia" size="20em" maxlength="50" readonly="readonly" value="<?php echo $materia_por_id[0] ['descripcion']?>"/>
				
				<select style="width:31%"name="estado" id="estado">
					
					<option value="<?php echo $materia_por_id[0] ['estado']?>"><?php echo $materia_por_id[0] ['estado']?></option>
					<option value="no activo">No activo</option>
					<option value="activo">Activo</option>
				</select>
				<p class="bloq-submit">
				<br>
				<input type="submit" value="Editar" id="submit-edit-materia">
				</p>
			
	</fieldset>
</form>


</blockquote>



			<?php


		break;

		case '4':
		
		break;

		case '5':
			
		break;

		default:

		break;
	}

	endif;

else:
echo"no existe";

	endif;
?>






























