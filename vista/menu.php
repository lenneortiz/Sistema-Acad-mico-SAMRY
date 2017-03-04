



<?php
			if(isset($perfil) and $perfil=="administrador"):

				?>
					
					<div id="menu-superior"><!--inicio del menu-->

							<ul id="botones-menu-superior">
								<li><a href="home">Inicio</a></li>
								<li><a href="javascript:void(0);" id="cohorte-semestre">Cohorte y semestre</a></li>
								<li><a href="javascript:void(0);" id="plantel-ambiente">Planatel y Ambiente</a></li>
								<li><a href="javascript:void(0);" id="opcion-menu-materias-grados" >Materias</a></li>
								<li><a href="javascript:void(0);" id="opcion-menu-vencedor" >Vencedor(a)</a></li>
								<li><a href="javascript:void(0);" id="opcion-menu-user" >Usuarios</a></li>
								<li><a href="javascript:void(0);" id="informes">Informes</a></li>
								<li><a href="javascript:void(0);">Manual</a></li>
									
									
							</ul>
					</div><!--fin menu superior-->
				<?php


			elseif(isset($perfil) and $perfil=="estudiante" ):

					?>
					<div id="menu-superior"><!--inicio del menu-->

						<ul id="botones-menu-superior">
								<li><a href="home">Inicio</a></li>
								<li><a href="javascript:void(0);" id="">Cohortes y semestres</a></li>
								<li><a href="javascript:void(0);" id="" >Vencedor(a)</a></li>
								<li><a href="javascript:void(0);" id="" >Usuarios</a></li>
								<li><a href="javascript:void(0);">Informes</a></li>
										
										
						</ul>
					</div><!--fin menu superior-->
							
					<?php

			else:
					?>

					<div id="menu-superior"><!--inicio del menu-->

						<ul id="botones-menu-superior">
								<li><a href="home">Inicio</a></li>
								<li><a href="javascript:void(0);" id="">Cohorte y semestre</a></li>
								<li><a href="javascript:void(0);" id="">Planatel y Ambiente</a></li>
								<li><a href="javascript:void(0);" id="" >Materias</a></li>
								<li><a href="javascript:void(0);" id="" >Vencedor(a)</a></li>
								<li><a href="javascript:void(0);" id="" >Usuarios</a></li>
								<li><a href="javascript:void(0);" id="">Informes</a></li>
								<li><a href="javascript:void(0);">Manual</a></li>
										
						</ul>
					</div><!--fin menu superior-->
						
					<?php

					endif;
			?>



















