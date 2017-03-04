<?php
$file="../config/config.php";
require_once($file);
ini_set("session.cookie_lifetime","7220");
ini_set("session.gc_maxlifetime","7220");
session_start();
class Usuario extends Conectar
{
	private $conex;
	
	public function __construct()
	{
		$this->conex=parent::Conexion();
		
	}

	public function get_usuarios()
	{
		try
		{

			$sql=" SELECT 
				U.id_user,
				U.cedula,
				U.nombre1,
				U.nombre2,
				U.apellido1,
				U.apellido2,
				U.id_perfil,
				U.fec_reg,
				U.direccion,
				U.estado,
				P.perfil
				FROM
				usuario U
				INNER JOIN perfil P
				ON U.id_perfil = P.id_perfil
				ORDER BY id_user DESC";
				$query=$this->conex->prepare($sql);
				if(!$query->execute() )return false;
				if($query->rowCount() > 0):

					return $query->fetchAll(PDO::FETCH_ASSOC);

				endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}
	public function get_usuario_perfil_facilitador()
	{
		try
		{

			$sql=" SELECT 
			U.id_user,
			U.nombre1, 
			U.apellido1, 
			U.cedula, 
			P.perfil
			FROM usuario U
			INNER JOIN perfil P ON U.id_perfil = P.id_perfil
			WHERE U.id_perfil =2 AND U.estado = 'Activo'
			ORDER BY id_user DESC
			LIMIT 0 , 100 ";
				$query=$this->conex->prepare($sql);
				if(!$query->execute() )return false;
				if($query->rowCount() > 0):

					return $query->fetchAll(PDO::FETCH_ASSOC);

				endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}
	public function get_usuario_perfil_coordinador()
	{
		try
		{

			$sql=" SELECT 
			U.id_user,
			U.nombre1, 
			U.apellido1, 
			U.cedula, 
			P.perfil
			FROM usuario U
			INNER JOIN perfil P 
			ON U.id_perfil = P.id_perfil
			WHERE U.id_perfil = 3 AND U.estado = 'Activo'
			ORDER BY id_user DESC
			LIMIT 0 , 100 ";
				$query=$this->conex->prepare($sql);
				if(!$query->execute() )return false;
				if($query->rowCount() > 0):

					return $query->fetchAll(PDO::FETCH_ASSOC);

				endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}
	public function get_usuario_perfil_vocero()
	{
		try
		{

			$sql=" SELECT 
			U.id_user,
			U.nombre1, 
			U.apellido1, 
			U.cedula, 
			P.perfil
			FROM usuario U
			INNER JOIN perfil P 
			ON U.id_perfil = P.id_perfil
			WHERE U.id_perfil = 4 AND U.estado = 'Activo'
			ORDER BY id_user DESC
			LIMIT 0 , 100 ";
				$query=$this->conex->prepare($sql);
				if(!$query->execute() )return false;
				if($query->rowCount() > 0):

					return $query->fetchAll(PDO::FETCH_ASSOC);

				endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}


	public function get_perfil()
	{
		$sql="select * from perfil";
		$query=$this->conex->prepare($sql);
		if(!$query->execute() )return false;
		if($query->rowCount()>0)
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addUser()
	{
		if(!empty($_POST["nombre1"]) OR !empty($_POST["apellido1"]) or !empty($_POST["direccion"])):

			if(isset($_POST['perfilUser']) AND $_POST['perfilUser'] == 'administrador'):
        	
				/*1*/ $ci=strip_tags(trim(htmlspecialchars($_POST['cedula'], ENT_QUOTES, "ISO-8859-1")));
				/*2*/ $nom1=strip_tags(trim(htmlspecialchars($_POST['nombre1'], ENT_QUOTES, "ISO-8859-1")));
				/*3*/ $nom2=strip_tags(trim(htmlspecialchars($_POST['nombre2'], ENT_QUOTES, "ISO-8859-1")));
				/*4*/ $ape1=strip_tags(trim(htmlspecialchars($_POST['apellido1'], ENT_QUOTES, "ISO-8859-1")));
				/*5*/ $ape2=strip_tags(trim(htmlspecialchars($_POST['apellido2'], ENT_QUOTES, "ISO-8859-1")));
				/*6*/ $edad=strip_tags(trim(htmlspecialchars($_POST['edad'], ENT_QUOTES, "ISO-8859-1")));
				/*7*/ $fec_nac=strip_tags(trim(htmlspecialchars($_POST['fec_nac'], ENT_QUOTES, "ISO-8859-1")));
				/*8*/ $direcc=strip_tags(trim(htmlspecialchars($_POST['direcc'], ENT_QUOTES, "ISO-8859-1")));
				/*9*/ $login=strip_tags(trim(htmlspecialchars($_POST['usuario'], ENT_QUOTES, "ISO-8859-1")));
				/*10*/$pass=strip_tags(trim(htmlspecialchars($_POST['clave'], ENT_QUOTES, "ISO-8859-1")));
				/*11*/$sexo=strip_tags(trim(htmlspecialchars($_POST['sexo'], ENT_QUOTES, "ISO-8859-1")));
				/*12*/$tlf=strip_tags(trim(htmlspecialchars($_POST['telef'], ENT_QUOTES, "ISO-8859-1")));
				/*13*/$correo=strip_tags(trim(htmlspecialchars($_POST['correo'], ENT_QUOTES, "ISO-8859-1")));
				/*14*/$perfil=strip_tags(trim(htmlspecialchars($_POST['perfil'], ENT_QUOTES, "ISO-8859-1")));
				/*14*/$estado=strip_tags(trim(htmlspecialchars($_POST['estado'], ENT_QUOTES, "ISO-8859-1")));





					$fecha = time() - strtotime(parent::cambiarFormatoFecha($fec_nac));
					$edad_calc = floor((($fecha / 3600) / 24) / 360);

					/*verificamos que la fecha concuerde con edad ingresada*/
					if($edad == $edad_calc):

					/////////////////////////////////////////////////////////////////////////////////
					try
					{
				
						$sql="INSERT INTO usuario VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now() )";
						$query=$this->conex->prepare($sql);
						$salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
            			$crypt_pass=crypt($pass, $salt);//funcion que encripta los datos


						$query->bindParam(1,$ci,PDO::PARAM_INT);
						$query->bindParam(2,$nom1,PDO::PARAM_STR);
						$query->bindParam(3,$nom2,PDO::PARAM_STR);
						$query->bindParam(4,$ape1,PDO::PARAM_STR);
						$query->bindParam(5,$ape2,PDO::PARAM_STR);
						$query->bindParam(6,$edad,PDO::PARAM_INT);
						$query->bindParam(7,$fec_nac,PDO::PARAM_STR);
						$query->bindParam(8,$direcc,PDO::PARAM_STR);
						$query->bindParam(9,$login,PDO::PARAM_STR);
						$query->bindParam(10,$crypt_pass,PDO::PARAM_STR);
						$query->bindParam(11,$sexo,PDO::PARAM_STR);
						$query->bindParam(12,$tlf,PDO::PARAM_STR);
						$query->bindParam(13,$correo,PDO::PARAM_STR);
						$query->bindParam(14,$perfil,PDO::PARAM_INT);
						$query->bindParam(15,$estado,PDO::PARAM_STR);

					//preparamos una nueva consulta para buscar la cedula 
						$buscar_ci="SELECT * FROM usuario WHERE cedula=? ";
						$encuentra_ci=$this->conex->prepare($buscar_ci);
						$encuentra_ci->bindParam(1,$ci,PDO::PARAM_INT);
						$encuentra_ci->execute();
						if($encuentra_ci->rowCount() > 0):
							$resp[0]='2';
						else:
							//preparamos otra una nueva consulta para buscar el login 
								$buscar_login="SELECT * FROM usuario WHERE login=? ";
								$encuentra_login=$this->conex->prepare($buscar_login);
								$encuentra_login->bindParam(1,$login,PDO::PARAM_STR);
								$encuentra_login->execute();
								if($encuentra_login->rowCount() > 0):
									$resp[0]='3';

								else:
									$query->execute();
									$resp[0]='5';

								endif;

							

						endif;
				
					}catch(PDOException $e){

						$resp[0]='error de query';
					}


					////////////////////////////////////////////////////////////////////////////////////
					else:

						/*si no es correcta enviamos un mensaje*/
						$resp[0]='6';
					endif;

			
			else:
				$resp[0]='4';

			endif;


			
			else:
				
				$resp[0]='1';

			endif;
			
			print_r(json_encode($resp) );
	}
	
	public function get_Usuario_por_Id($Id_User)
	{

		try
		{
			$sql="SELECT 
			U.id_user,
			U.cedula,
			U.nombre1,
			U.nombre2,
			U.apellido1,
			U.apellido2,
			U.id_perfil,
			U.fec_nac,
			U.fec_reg,
			U.edad,
			U.sexo,
			U.direccion,
			U.telef_user,
			U.correo,
			U.login,
			P.perfil,
			U.estado
			FROM
			usuario U
			INNER JOIN perfil P
			ON U.id_perfil = P.id_perfil
			WHERE U.id_user = ?
			ORDER BY id_user ASC
			";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$Id_User,PDO::PARAM_STR);
			if(!$query->execute(array($Id_User)) )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);
			endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );
		}
	}

	public function loginUser($login,$pass)
	{
		if(!empty($login) and !empty($pass)):

			$sql="SELECT 
			U.id_user,
			U.nombre1,
			U.nombre2,
			U.apellido1,
			U.apellido2,
			U.sexo,
			U.id_perfil,
			U.login,
			U.pass,
			P.perfil
			FROM
			usuario U
			INNER JOIN perfil P
			ON U.id_perfil = P.id_perfil
         	WHERE login = ? ";
          	$query = $this->conex->prepare($sql);

          	

          	/*1*/ $usuario=strip_tags(trim(htmlspecialchars($login, ENT_QUOTES, "ISO-8859-1")));
			/*2*/ $clave=strip_tags(trim(htmlspecialchars($pass, ENT_QUOTES, "ISO-8859-1")));

					$query->bindParam(1,$usuario,PDO::PARAM_STR);
					

		          	$query->execute();
          			if($row = $query->fetch()):

			                $dbHash = $row["pass"];
			                $nom1 	= $row['nombre1'];
			                $nom2 	= $row['nombre2'];
			                $ap1 	= $row['apellido1'];
			                $ap2 	= $row['apellido2'];
			                $sexo	= $row['sexo'];
			                $perfil = $row['perfil'];
			                		// Recalculamos a ver si el hash coincide.//////////////
			                          if (parent::VerificaPassword($clave,  $dbHash)):

			                          	$_SESSION['nombre1'] 	= $nom1;
			                          	$_SESSION['nombre2'] 	= $nom2;
			                          	$_SESSION['apellido1']	= $ap1;
			                          	$_SESSION['apellido2'] 	= $ap2;
			                          	$_SESSION['sexo'] 		= $sexo;
			                          	$_SESSION['perfil'] 	= $perfil;

			                            header("Location:".Usuario::ruta()."vista/home");

			                          else:
			                                header("Location:".Usuario::ruta()."?r=3");
			                          endif;
			                 /////////////////////////////////////////////////////

		             else:
		                    header("Location:".Usuario::ruta()."?r=2");
		            endif;

        else:
        		header("Location:".Usuario::ruta()."?r=1");
		endif;
	}

	public function editUserBasico()
	{
		//preguntamos si existe una variable llamada perfilUser y si es igual a administrador y si es asi ejecutamos la consulta
        if(isset($_GET['perfilUser']) AND $_GET['perfilUser']=='administrador'):

        	try
        	{
	        		$sql="UPDATE usuario 
			        SET 
			        nombre1 = ?,
			        nombre2 =?,
			        apellido1 =?,
			        apellido2 =?,
			        direccion =?
			        WHERE id_user =?;";
					$query=$this->conex->prepare($sql);

				/*1*/$nom1   = parent::limpiarcampo($_GET['nombre1']);
				/*2*/$nom2   = parent::limpiarcampo($_GET['nombre2']);
				/*3*/$ape1   = parent::limpiarcampo($_GET['apellido1']);
				/*4*/$ape2   = parent::limpiarcampo($_GET['apellido2']);
				/*5*/$direcc = parent::limpiarcampo($_GET['direcc']);
				/*6*/$idUser = parent::limpiarcampo($_GET['idUser']);

					$query->bindParam(1,$nom1,PDO::PARAM_STR);
					$query->bindParam(2,$nom2,PDO::PARAM_STR);
					$query->bindParam(3,$ape1,PDO::PARAM_STR);
					$query->bindParam(4,$ape2,PDO::PARAM_STR);
					$query->bindParam(5,$direcc,PDO::PARAM_STR);
					$query->bindParam(6,$idUser,PDO::PARAM_INT);

					if(!$query->execute())return false;
					if($query->rowCount() > 0):
						echo "actualizacion exitosa";
					else:
						echo" Disculpe los datos no han sido actualizados,esto puede deberse a que no ha cambiado ningun valor de los datos del usuario";
					endif;

        	}catch(PDOException $e){

        		die('error de consulta'.$e->getMessage() );
        	}

        else://si no existe enviamos un mensage

        	echo'Disculpe esta opción solo esta disponible para usuarios con priveligios de Administrador ..';

        endif;
	}

	public function editAvanzadoUser()
	{
		if(isset($_POST['perfilUser']) AND $_POST['perfilUser']=='administrador'):


			/*1*/ $nom1 	= parent::limpiarcampo($_POST['nombre1']);
			/*2*/ $nom2 	= parent::limpiarcampo($_POST['nombre2']);
			/*3*/ $ape1 	= parent::limpiarcampo($_POST['apellido1']);
			/*4*/ $ape2 	= parent::limpiarcampo($_POST['apellido2']);
			/*5*/ $edad 	= parent::limpiarcampo($_POST['edad']);
			/*6*/ $fec_nac 	= parent::limpiarcampo($_POST['fec_nac']);
			/*7*/ $direcc 	= parent::limpiarcampo($_POST['direcc']);
			/*8*/ $sexo 	= parent::limpiarcampo($_POST['sexo']);
			/*9*/ $tlf 		= parent::limpiarcampo($_POST['telef']);
			/*10*/$correo 	= parent::limpiarcampo($_POST['correo']);
			/*11*/$perfil 	= parent::limpiarcampo($_POST['perfil']);
			/*11*/$estado 	= parent::limpiarcampo($_POST['estado']);
			/*12*/$idUser 	= parent::limpiarcampo($_POST['idUser']);
				
				
				

				$fecha = time() - strtotime(parent::cambiarFormatoFecha($fec_nac));
					$edad_calc = floor((($fecha / 3600) / 24) / 360);

					/*verificamos que la fecha concuerde con edad ingresada*/
					if($edad == $edad_calc):

					///////////////////////////////////////////////////////////////////////////////
					try
						{
							$sql="UPDATE usuario 
					        SET 
					        nombre1 = ?,
					        nombre2 = ?,
					        apellido1 = ?,
					        apellido2 = ?,
					        edad = ?,
					        fec_nac = ?,
					        direccion = ?,
					        sexo = ?,
					        telef_user = ?,
					        correo = ?,
					        id_perfil = ?,
					        estado = ?
					        WHERE id_user =?;";
					        $query=$this->conex->prepare($sql);

					        $query->bindParam(1,$nom1,PDO::PARAM_STR);
					        $query->bindParam(2,$nom2,PDO::PARAM_STR);
					        $query->bindParam(3,$ape1,PDO::PARAM_STR);
					        $query->bindParam(4,$ape2,PDO::PARAM_STR);
					        $query->bindParam(5,$edad,PDO::PARAM_STR);
					        $query->bindParam(6,$fec_nac,PDO::PARAM_STR);
					        $query->bindParam(7,$direcc,PDO::PARAM_STR);
					        $query->bindParam(8,$sexo,PDO::PARAM_STR);
					        $query->bindParam(9,$tlf,PDO::PARAM_STR);
					        $query->bindParam(10,$correo,PDO::PARAM_STR);
					        $query->bindParam(11,$perfil,PDO::PARAM_INT);
					         $query->bindParam(12,$estado,PDO::PARAM_STR);
							$query->bindParam(13,$idUser,PDO::PARAM_INT);

							if(!$query->execute()) return false;
							if($query->rowCount() > 0):

									$resp[0]='3';
							else:
									$resp[0]='4';
							endif;
						}catch(PDOException $e){

							die('error de consulta'.$e->getMessage() );
						}
					////////////////////////////////////////////////////////////////////////////////////
					else:

						/*si no es correcta enviamos un mensaje*/
						$resp[0]='5';
					endif;


		else:

			$resp[0]='2';

		endif;

		print_r(json_encode($resp));


	}
	public function busquedaUser($ci)
	{
		if(!empty($_POST['ci'])):

			try
		{
			$sql="SELECT id_user,cedula FROM usuario WHERE cedula=?";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$ci,PDO::PARAM_STR);
			if(!$query->execute(array($ci))) return false;
			if($row = $query->fetch()):

				$id = $row['id_user'];


				header("Location:".Usuario::ruta()."vista/updateCuentaUsuario.php?id_user=".$id."");
			else:

				header("Location:".Usuario::ruta()."vista/recuperCuenta.php?r=3");

			endif;

		}catch(PDOException $e){

			die("hubo un error en la consulta".$e->getMessage() );

		}

	

		else:

			header("Location:".Usuario::ruta()."vista/recuperCuenta.php?r=1");

		endif;


}
	public function editCuentaUser()
	{

		if(empty($_POST['login']) OR empty($_POST['pass'])):

			header("Location:".Usuario::ruta()."vista/updateCuentaUsuario.php?r=1 ");exit;
		endif;


$sql="UPDATE usuario 
      SET 
      login = ?,
      pass =?
      WHERE id_user =?;";
		$query=$this->conex->prepare($sql);



		/*1*/ 	$login=strip_tags(trim(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1")));
		/*2*/ 	$pass=strip_tags(trim(htmlspecialchars($_POST['pass'], ENT_QUOTES, "ISO-8859-1")));
		/*3*/ 	$id_user=strip_tags(trim(htmlspecialchars($_POST['id_user'], ENT_QUOTES, "ISO-8859-1")));

				$salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
	            $crypt_pass=crypt($pass, $salt);//funcion que encripta los datos
			
				$query->bindParam(1,$login,PDO::PARAM_STR);
				$query->bindParam(2,$crypt_pass,PDO::PARAM_STR);
				$query->bindParam(3,$id_user,PDO::PARAM_INT);
				

			if(!$query->execute())return false;
			if($query->rowCount() > 0):

				header("Location:".Usuario::ruta()."index.php?r=6 ");
			else:
				
				header("Location:".Usuario::ruta()."vista/updateCuentaUsuario.php?r=7 ");
			endif;





	}


}

?>
