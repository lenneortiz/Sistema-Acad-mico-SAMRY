

<?php
			if(isset($perfil) and $perfil=="administrador" and isset($sexo) and $sexo=="M"):

				?>
					<img src="<?php echo Conectar::ruta()?>vista/public/img/avatar_administrador.jpg"/>
				<?php

			elseif (isset($perfil) and $perfil=="administradora" and isset($sexo) and $sexo=="F"):

				?>
					<img src="<?php echo Conectar::ruta()?>vista/public/img/avatar_administradora.jpeg"/>
				<?php

			elseif(isset($perfil) and $perfil=="estudiante" and isset($sexo) and $sexo=="F"):

					?>
						<img src="<?php echo Conectar::ruta()?>vista/public/img/avatar_alumno.png"/>
					<?php

			else:
					?>
						<img src="<?php echo Conectar::ruta()?>vista/public/img/avatar_profesor.jpg"/>
					<?php

			endif;
			?>