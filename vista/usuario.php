<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
	require_once($file);
$classUser=new Usuario();
$perfil=$classUser->get_perfil();
$perfilUser = $_SESSION['perfil'];
if(isset($_GET["vistaUser"])):

	switch($_GET["vistaUser"])
	{

		case '1':
		?>
			<div class="menu-izquierdo">
						<ul class="list-menu-izquierdo">
							<li><a href="javascript:void(0);" id="nuevo-usuario" >Creación de Usuarios</a></li>
							<li><a href="javascript:void(0);" id="tabla-data-usuario">Modificación básica de Usuarios</a></li>
							<li><a href="javascript:void(0);" id="select-data-usuario">Modificación avanzada de Usuarios</a></li>
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
	<input type="hidden" name="estado" value="activo" id="estado"/>
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<fieldset>
	<div class="titulo"><legend><h2>Registro de nuevo Usuario</legend></h2></div>
		<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
		
		<div class="bloque-datos-left">
			
			<label>Cédula:</label>
				<input type="text" name="ci" id="ci" maxlength="8"/>
			<label>1.er.Nombre:</label>
				<input type="text" name="nombre1" id="nombre1" maxlength="20" placeholder="Primer Nombre"/>
			<label>2.do.Nombre:</label>
				<input type="text" name="nombre2" id="nombre2" maxlength="20" placeholder="Segundo Nombre"/>
			<label>1.er.Apellido:</label>
				<input type="text" name="apellido1" id="apellido1" maxlength="20" placeholder="Primer Apellido"/>
			<label>2.do.Apellido:</label>
				<input type="text" name="apellido2" id="apellido2" maxlength="20" placeholder="Segundo Apellido"/>

			<label>edad:</label>
				<input type="text" name="edad" id="edad" maxlength="2" placeholder="edad"/>
			<label>Fecha.Nacimiento:</label>
				<input type="text" name="fec_nac" id="fec_nac" maxlength="20" placeholder="20/05/1998"/>
			<label>Teléfono:</label>
				<input type="text" name="telef" id="telef" maxlength="12" placeholder="0000-2345697"/>
			<label>Correo:</label>
				<input type="text" name="correo" id="correo" maxlength="50" />

		</div>

		<div class="bloque-datos-left">

			<label>Sexo:</label>
			<select style="width:60%" name="sexo" id="sexo">
				<option value="">Seleccione una opción</option>
				<option value="M">M</option>
				<option value="F">F</option>
			</select>
			<div class="espacio"></div>

			<label>Perfil de Usuario:</label>
			<select style="width:60%" name="perfil" id="perfil" >
				<option value="">seleccione un perfil</option>
				<?php 
				foreach($perfil as $key =>$value):
				?>
				<option  value="<?php echo $value['id_perfil']?>"><?php echo ucfirst($value['perfil']);?></option>
				<?php
				endforeach;
				?>
			</select>	
			<div class="espacio"></div>

			<label>Usuario:</label>
				<input type="text" name="usuario" id="usuario" maxlength="20"/>
			<label>Contraseña:</label>
			<input type="password" name="clave" id="clave" maxlength="20"/>
			<div class="espacio"></div>
			<label>Dirección:</label>
			<textarea name="direcc" id="direcc" maxlength="200"></textarea>
			<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
			<input type="submit" value="Guardar" id="submit-agregar-usuario">
			</div>
		</div>


		

	</fieldset>
</form>
		<?php

		break;
		case '3':
		$data_user=$classUser->get_usuarios();

		?>
		<div id="cont-table-user">
		<blockquote id="cont-form-materia">
			<table cellpadding="0" cellspacing="0" id="tabla" class="display">
	<thead>
		<th>Cod</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Cédula</th>
		<th>Perfil</th>
		<th>estatus</th>
		<th>Fec.Reg</th>
		<th>Datos.G</th>
	</thead>
	<tfoot>
		<th>Cod</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Cédula</th>
		<th>Perfil</th>
		<th>estatus</th>
		<th>Datos.G</th>
	</tfoot>
	<tdbody>
	<?php
	foreach($data_user as $key => $value):
	?>
		<tr>
			<td><?php echo $value['id_user'];?></td>
			<td><?php echo ucfirst($value['nombre1']);?> <?php echo ucfirst($value['nombre2']);?></td>
			<td><?php echo ucfirst($value['apellido1']);?> <?php echo ucfirst($value['apellido2']);?></td>
			<td><?php echo $value['cedula'];?></td>
			<td><?php echo ucfirst($value['perfil']);?></td>
			<td><?php echo ucfirst($value['estado']);?></td>
			<td><?php echo $value['fec_reg'];?></td>
			<td><a   href="javascript:void(0)" data-iduser="<?php echo $value['id_user'];?>" class="ver-data-general-user">
			<img style="margin-left:30px"src="<?php echo Conectar::ruta()?>vista/public/img/mas1.png">
			</a>
			</td>
		</tr>
		<?php
		endforeach;
		?>
	</tdbody>
</table>
</blockquote>
	</div>
		<?php

		break;

		case '4':

			$data_user=$classUser->get_usuarios();

?>
<div id="cont-select-user">
<h2>Modificación avanzada de usuario</h2>
<div class="espacio"></div>
<form id="data-select-id-user">
<select name="usuario" id="select-data-user" class="select-data-user-dinamic">
<?php
foreach($data_user as $key => $value):
?>
	<option class="select-id-data-user" value="<?php echo $value['id_user'];?>">
	<?php echo ucfirst($value['nombre1']);?> &nbsp;&nbsp;
	<?php echo ucfirst($value['apellido1']);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo ucwords($value['direccion']);?> 
	</option>
	

<?php
endforeach;
?>
</select>
<input style="margin-top:-25px;padding: 4px" type="submit" value="buscar Usuario" id="select-buscar-user"/>
</form>
</div><!--fin del cont-select-user-->
<?php


		break;

		case '5':
		sleep(2);
		if(isset($_GET['IdUser']) and is_numeric($_GET['IdUser'])):

			$dato_User_Id=$classUser->get_Usuario_por_Id($_GET['IdUser']);

		?>
			<form id="form-user">
	<input type="hidden" name="estatus" value="<?php echo $_GET['IdUser']?>" id="IdUser"/>
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<input type="hidden" name="IdUser" id="IdUser" value="<?php echo $_GET['IdUser'];?>"/>
	<fieldset>
		<div class="titulo">
		<legend><h2>Modificación avanzada de usuario</h2></legend>
		</div>
		<div style="height:10px"></div>
		<div class="bloque-datos-left">
			<label>Cédula:</label>
				<input type="text" name="ci" id="ci" maxlength="8" readonly="readonly" value="<?php echo $dato_User_Id[0] ['cedula']?>"/>
			<label>1.er.Nombre:</label>
				<input type="text" name="nombre1" id="nombre1" maxlength="20" placeholder="Primer Nombre" value="<?php echo ucfirst($dato_User_Id[0] ['nombre1'])?>"/>
			<label>2.do.Nombre:</label>
				<input type="text" name="nombre2" id="nombre2" maxlength="20" placeholder="Segundo Nombre" value="<?php echo ucfirst($dato_User_Id[0] ['nombre2'])?>"/>
			<label>1.er.Apellido:</label>
				<input type="text" name="apellido1" id="apellido1" maxlength="20" placeholder="Primer Apellido" value="<?php echo ucfirst($dato_User_Id[0] ['apellido1'])?>"/>
			<label>2.do.Apellido:</label>
				<input type="text" name="apellido2" id="apellido2" maxlength="20" placeholder="Segundo Apellido" value="<?php echo ucfirst($dato_User_Id[0] ['apellido2'])?>"/>

			<label>edad:</label>
				<input type="text" name="edad" id="edad" maxlength="2" placeholder="edad" value="<?php echo $dato_User_Id[0] ['edad']?>"/>
			<label>Fecha.Nacimiento:</label>
				<input type="text" name="fec_nac" id="fec_nac" maxlength="20" placeholder="20/05/1998" value="<?php echo $dato_User_Id[0] ['fec_nac']?>"/>
			<label>Teléfono:</label>
				<input type="text" name="telef" id="telef" maxlength="12" placeholder="0000-2345697" value="<?php echo $dato_User_Id[0] ['telef_user']?>"/>
			<label>Correo:</label>
				<input type="text" name="correo" id="correo" maxlength="50" value="<?php echo $dato_User_Id[0] ['correo']?>"/>
		</div>

		<div class="bloque-datos-left">
			<label>Sexo:</label>
			<select style="width:60%" name="sexo" id="sexo">
			<?php $sexo = $dato_User_Id[0] ['sexo'];?>
				<option value="M" <?php if($sexo=="M") echo "selected";?>>M</option>
				<option value="F" <?php if($sexo=="F") echo "selected";?>>F</option>
				
				
			</select>
			<div class="espacio"></div>

			<label>Perfil de Usuario:</label>
			<select style="width:60%" name="perfil" id="perfil" >

				<option value="<?php echo $dato_User_Id[0] ['id_perfil']?>"><?php echo $dato_User_Id[0] ['perfil']?></option>
				<?php 
				foreach($perfil as $key =>$value):
				?>
				<option  value="<?php echo $value['id_perfil']?>"><?php echo $value['perfil']?></option>
				<?php
				endforeach;
				?>
			</select>	
			<div class="espacio"></div>

			<label>Estado:</label>
			<?php
				$estado =  $dato_User_Id[0] ['estado'];
			?>
			<select style="width:60%" name="estado" id="estado" >

				<option value="activo" 		<?php if($estado == 'activo') 		echo 'selected';?> 	>Activo</option>
				<option value="no activo" 	<?php if($estado == 'no activo') 	echo 'selected';?>	>No Activo</option>
				<option value="no activo" 	<?php if($estado == '') 			echo 'selected';?>	>Estado no definido</option>
				
			</select>	
			<div class="espacio"></div>

			<label>Usuario:</label>
				<input type="text" name="usuario" id="usuario" readonly="readonly" maxlength="20" value="<?php echo $dato_User_Id[0] ['login']?>"/>
			<label>Contraseña:</label>
			<input type="password" name="clave" readonly="readonly" id="clave" maxlength="20" value="<?php echo $dato_User_Id[0] ['perfil']?>"/>
			<div class="espacio"></div>
			<label>Dirección:</label>
			<textarea name="direcc" id="direcc" maxlength="200"><?php echo ucwords($dato_User_Id[0] ['direccion']);?></textarea>

			<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
			<input type="submit" value="Actualizar" id="submit-edit-usuario">
			</div>
		
		</div>
		
		
			
	</fieldset>
</form>

		<?php
			else:

				echo"no hay id";
				endif;
		break;

		case '6':
			sleep(1);
		if(isset($_GET['IdUser']) and is_numeric($_GET['IdUser'])):

			$dato_User_Id=$classUser->get_Usuario_por_Id($_GET['IdUser']);

		?>
			<form id="form-user">
	
	<input type="hidden" name="IdUser" value="<?php echo $dato_User_Id[0] ['id_user']?>" id="idUser"/>
	<input type="hidden" name="perfilUser" id="perfilUser" value="<?php echo $perfilUser;?>"/>
	<fieldset>
		<div class="titulo">
		<legend><h2>Modificación basica de usuario</h2></legend><img class="boton-cancelar" src="<?php echo Conectar::ruta()?>vista/public/img/botoncancelar.png"/>
		</div>
		<div style="height:10px"></div>
		<div class="bloque-datos">
			<label>Cédula:</label>
				<input type="text" name="ci" id="ci" maxlength="8" readonly="readonly" value="<?php echo $dato_User_Id[0] ['cedula']?>"/>
			<label>1.er.Nombre:</label>
				<input type="text" name="nombre1" id="nombre1" maxlength="20" placeholder="Primer Nombre" value="<?php echo ucfirst($dato_User_Id[0] ['nombre1'])?>"/>
			<label>2.do.Nombre:</label>
				<input type="text" name="nombre2" id="nombre2" maxlength="20" placeholder="Segundo Nombre" value="<?php echo ucfirst($dato_User_Id[0] ['nombre2'])?>"/>
		</div>
		<div class="bloque-datos">
			<label>1.er.Apellido:</label>
				<input type="text" name="apellido1" id="apellido1" maxlength="20" placeholder="Primer Apellido" value="<?php echo ucfirst($dato_User_Id[0] ['apellido1'])?>"/>
			<label>2.do.Apellido:</label>
				<input type="text" name="apellido2" id="apellido2" maxlength="20" placeholder="Segundo Apellido" value="<?php echo ucfirst($dato_User_Id[0] ['apellido2'])?>"/>
			

		</div>
		<div class="espacio"></div>
		<div class="bloque-datos">
			<label>Dirección:</label>
			<textarea name="direcc" id="direcc"><?php echo ucfirst($dato_User_Id[0] ['direccion'])?></textarea>
		</div>
		

		<div style="width:calc(100% -20%);height:20px;padding:7px;clear:both">
		<input type="submit" value="Actualizar" id="submit-edit-usuario">
		</div>
			
	</fieldset>
</form>

		<?php
			else:

				echo"no hay id";
				endif;
		break;

		default:

		break;
	}

	endif;

else:
echo"no existe";

	endif;
?>