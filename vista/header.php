
<div id="header"><!--inicio header-->

			<div class="imagen-user">

				<?php 
				$controlUser="../control/Usuariocontrol.php";
				if(file_exists($controlUser)):
					require_once($controlUser);
				else:
					echo" no existe";
					endif;
				?>
			</div>

			<div class="datos-user">
				<h3>Datos del Usuario:</h3>
				<p>Nombres:<?php echo $nom1.'&nbsp;'.$nom2;?></p>
				<p>Apellidos:<?php echo $ap1.'&nbsp;'.$ap2;?></p>
				<p>Sexo:<?php echo $sexo;?></p>
				<p>Perfil:<?php echo $perfil?></p>
				<p><a href="javascript:void(0)" id="logout">Cerrar Sesión<img src="public/img/boton_pagado.png" alt="no"></a></p>
			</div>

			<div class="titulo-sistem">
				<div style="height:30px"></div>
				<h1 class="titulo">S.A.M.R.Y</h1>
				<h3>Sistema Académico Misión Ribas Yaracuy</h3>
			</div>

			<div class="escudo-yaracuy"></div>
				
			</div><!--fin del header-->