<?php
$file="../config/config.php";
require_once($file);
ini_set("session.cookie_lifetime","7220");
ini_set("session.gc_maxlifetime","7220");
session_start();
class Vencedor extends Conectar
{
	private $conex;
	
	public function __construct()
	{
		$this->conex=parent::Conexion();
		
	}

	public function get_vencedor()
	{
		$sql="SELECT 
		id_vencedor,
		cedula,
		nacionalidad,
		telf_vencedor,
		estado,
		CONCAT_WS(',',nombre1,nombre2) AS nombres,
		CONCAT_WS(',',apellido1,apellido2) AS apellidos
		FROM vencedor
		ORDER BY id_vencedor DESC";
		$query=$this->conex->prepare($sql);
		if(!$query->execute()) return false;
		if($query->rowCount() > 0):

			return $query->fetchAll();

		endif;
	}

	public function addVencedor()
	{

		try
		{
			$this->conex->beginTransaction();



			//datos para la tabla vencedor
			/*1*/$edula   					= parent::limpiarcampo($_POST['ci']);
			/*2*/$nacionalidad   			= parent::limpiarcampo($_POST['nacionalidad']);
			/*3*/$nombre1   				= parent::limpiarcampo($_POST['nombre1']);
			/*4*/$nombre2   				= parent::limpiarcampo($_POST['nombre2']);
			/*5*/$apellido1   				= parent::limpiarcampo($_POST['apellido1']);
			/*6*/$apellido2   				= parent::limpiarcampo($_POST['apellido2']);
			/*7*/$sexo   					= parent::limpiarcampo($_POST['sexo']);
			/*8*/$telf_vencedor   			= parent::limpiarcampo($_POST['telef']);
			/*9*/$fec_nac   				= parent::limpiarcampo($_POST['fec_nac']);
			/*10*/$edad   					= parent::limpiarcampo($_POST['edad']);
			/*11*/$lugar_nacimiento   		= parent::limpiarcampo($_POST['lugar_nacimiento']);
			/*12*/$estado_nac   			= parent::limpiarcampo($_POST['estado_nac']);
			/*13*/$anio_aprobado   			= parent::limpiarcampo($_POST['anio_aprobado']);
			/*14*/$anio_robinson_aprobado   = parent::limpiarcampo($_POST['anio_robinson_aprobado']);
			/*15*/$discapacidad   			= parent::limpiarcampo($_POST['discapacidad']);
			/*16*/$etnia_indigena   		= parent::limpiarcampo($_POST['etnia']);
			/*17*/$becado   				= parent::limpiarcampo($_POST['becado']);
			/*18*/$estado   				= parent::limpiarcampo($_POST['estado']);

			//datos para la tabla documentos

			/*1*/$partida_naci   = parent::limpiarcampo($_POST['partida_naci']);
			/*2*/$nota_certificada_9_grado   = parent::limpiarcampo($_POST['nota_certificada_9_grado']);
			/*3*/$fotocopia_cedula   = parent::limpiarcampo($_POST['fotocopia_cedula']);
			/*4*/$foto   = parent::limpiarcampo($_POST['foto']);
			
				$fecha_nac_vencedor = time() - strtotime(parent::cambiarFormatoFecha($fec_nac));
					$edad_calc = floor((($fecha_nac_vencedor / 3600) / 24) / 360);

					/*verificamos que la fecha concuerde con edad ingresada*/
					if($edad == $edad_calc):

						$sql="INSERT INTO vencedor 
							VALUES 
							(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
						$query=$this->conex->prepare($sql);

						$query->bindParam(1,$edula,PDO::PARAM_INT);
						$query->bindParam(2,$nacionalidad,PDO::PARAM_STR);
						$query->bindParam(3,$nombre1,PDO::PARAM_STR);
						$query->bindParam(4,$nombre2,PDO::PARAM_STR);
						$query->bindParam(5,$apellido1,PDO::PARAM_STR);
						$query->bindParam(6,$apellido2,PDO::PARAM_STR);
						$query->bindParam(7,$sexo,PDO::PARAM_STR);
						$query->bindParam(8,$telf_vencedor,PDO::PARAM_STR);
						$query->bindParam(9,$fec_nac,PDO::PARAM_STR);
						$query->bindParam(10,$edad,PDO::PARAM_INT);
						$query->bindParam(11,$lugar_nacimiento,PDO::PARAM_STR);
						$query->bindParam(12,$estado_nac,PDO::PARAM_STR);
						$query->bindParam(13,$anio_aprobado,PDO::PARAM_STR);
						$query->bindParam(14,$anio_robinson_aprobado,PDO::PARAM_STR);
						$query->bindParam(15,$discapacidad,PDO::PARAM_STR);
						$query->bindParam(16,$etnia_indigena,PDO::PARAM_STR);
						$query->bindParam(17,$becado,PDO::PARAM_STR);
						$query->bindParam(18,$estado,PDO::PARAM_STR);

						if(!$query->execute())return false;
						if($query->rowCount() > 0):


							$id_vencedor	=	$this->conex->lastInsertId();

							$sql="INSERT INTO documentos
								VALUES
								(NULL,?,?,?,?,?);";
							$query=$this->conex->prepare($sql);

								$query->bindParam(1,$id_vencedor,PDO::PARAM_INT);
								$query->bindParam(2,$partida_naci,PDO::PARAM_STR);
								$query->bindParam(3,$nota_certificada_9_grado,PDO::PARAM_STR);
								$query->bindParam(4,$fotocopia_cedula,PDO::PARAM_STR);
								$query->bindParam(5,$foto,PDO::PARAM_STR);
								
							$query->execute();

								$resp[0]='1';

						else:
								$resp[0]='3';

						endif;

						

					else:
						$resp[0]='2';

					endif;

			$this->conex->commit();

		}catch(PDOException $e){

			$this->conex->rollBack();

			die('error en el query'.$e ->getMessage() );


		}

		print_r(json_encode($resp));
	}

	public function get_Vencedor_por_id($id_vencedor)
	{
		$sql="SELECT
			V.cedula,
			V.nacionalidad,
			V.nombre1,
			V.nombre2,
			V.apellido1,
			V.apellido2,
			V.sexo,
			V.telf_vencedor,
			V.fec_nac,
			V.edad,
			V.lugar_nacimiento,
			V.estado_nac,
			V.ultimo_anio_aprobado,
			V.grado_robinson,
			V.discapacidad,
			V.etnia_indigena,
			V.becado,
			V.estado,
			DC.id_documento,
			DC.partida_naci,
			DC.nota_certificada_9_grado,
			DC.fotocopia_cedula,
			DC.foto
			FROM vencedor V
			INNER JOIN documentos DC
			ON V.id_vencedor = DC.id_vencedor
			WHERE V.id_vencedor = ?
			";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_vencedor,PDO::PARAM_STR);
			if(!$query->execute())return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);

			endif;
	}
	public function editVencedor($id_vencedor)
	{
		try
		{
			//datos para la tabla vencedor
			/*1*/$nacionalidad   			= parent::limpiarcampo($_POST['nacionalidad']);
			/*2*/$nombre1   				= parent::limpiarcampo($_POST['nombre1']);
			/*3*/$nombre2   				= parent::limpiarcampo($_POST['nombre2']);
			/*4*/$apellido1   				= parent::limpiarcampo($_POST['apellido1']);
			/*5*/$apellido2   				= parent::limpiarcampo($_POST['apellido2']);
			/*6*/$sexo   					= parent::limpiarcampo($_POST['sexo']);
			/*7*/$telf_vencedor   			= parent::limpiarcampo($_POST['telef']);
			/*8*/$fec_nac   				= parent::limpiarcampo($_POST['fec_nac']);
			/*9*/$edad   					= parent::limpiarcampo($_POST['edad']);
			/*10*/$lugar_nacimiento   		= parent::limpiarcampo($_POST['lugar_nacimiento']);
			/*11*/$estado_nac   			= parent::limpiarcampo($_POST['estado_nac']);
			/*12*/$anio_aprobado   			= parent::limpiarcampo($_POST['anio_aprobado']);
			/*13*/$anio_robinson_aprobado   = parent::limpiarcampo($_POST['anio_robinson_aprobado']);
			/*14*/$discapacidad   			= parent::limpiarcampo($_POST['discapacidad']);
			/*15*/$etnia_indigena   		= parent::limpiarcampo($_POST['etnia']);
			/*16*/$becado   				= parent::limpiarcampo($_POST['becado']);
			/*17*/$estado   				= parent::limpiarcampo($_POST['estado']);
			/*18*/$id_vencedor   			= parent::limpiarcampo($_POST['id_vencedor']);


			//datos para la tabla documentos

			/*1*/$partida_naci   				= parent::limpiarcampo($_POST['partida_naci']);
			/*2*/$nota_certificada_9_grado   	= parent::limpiarcampo($_POST['nota_certificada_9_grado']);
			/*3*/$fotocopia_cedula   			= parent::limpiarcampo($_POST['fotocopia_cedula']);
			/*4*/$foto   						= parent::limpiarcampo($_POST['foto']);
			/*5*/$id_documento   				= parent::limpiarcampo($_POST['id_documento']);

		
				$fecha_nac_vencedor = time() - strtotime(parent::cambiarFormatoFecha($fec_nac));
					$edad_calc = floor((($fecha_nac_vencedor / 3600) / 24) / 360);

					/*verificamos que la fecha concuerde con edad ingresada*/
					if($edad == $edad_calc):

						$sql="UPDATE vencedor
						            SET 
						            nacionalidad = ?,
						            nombre1 = ?,
						            nombre2 = ?,
						            apellido1 = ?,
						            apellido2 = ?,
						            sexo = ?,
						            telf_vencedor = ?,
						            fec_nac = ?,
						            edad = ?,
						            lugar_nacimiento = ?,
						            estado_nac = ?,
						            ultimo_anio_aprobado = ?,
						            grado_robinson = ?,
						            discapacidad = ?,
						            etnia_indigena = ?,
						            becado = ?,
						            estado = ?
						            WHERE id_vencedor = ?;";
						            $query=$this->conex->prepare($sql);

									$query->bindParam(1,$nacionalidad,PDO::PARAM_STR);
						            $query->bindParam(2,$nombre1,PDO::PARAM_STR);
						            $query->bindParam(3,$nombre2,PDO::PARAM_STR);
						            $query->bindParam(4,$apellido1,PDO::PARAM_STR);
						            $query->bindParam(5,$apellido2,PDO::PARAM_STR);
						            $query->bindParam(6,$sexo,PDO::PARAM_STR);
						            $query->bindParam(7,$telf_vencedor,PDO::PARAM_STR);
						            $query->bindParam(8,$fec_nac,PDO::PARAM_STR);
						            $query->bindParam(9,$edad,PDO::PARAM_INT);
						            $query->bindParam(10,$lugar_nacimiento,PDO::PARAM_STR);
						            $query->bindParam(11,$estado_nac,PDO::PARAM_STR);
						            $query->bindParam(12,$anio_aprobado,PDO::PARAM_STR);
						            $query->bindParam(13,$anio_robinson_aprobado,PDO::PARAM_STR);
						            $query->bindParam(14,$discapacidad,PDO::PARAM_STR);
						            $query->bindParam(15,$etnia_indigena,PDO::PARAM_STR);
						            $query->bindParam(16,$becado,PDO::PARAM_STR);
						            $query->bindParam(17,$estado,PDO::PARAM_STR);
						            $query->bindParam(18,$id_vencedor,PDO::PARAM_INT);
						            
						            if($query->execute()):
						            
									$sql2="UPDATE documentos 
						            	SET
						            	partida_naci = ?,
						            	nota_certificada_9_grado = ?,
						            	fotocopia_cedula = ?,
						            	foto = ?
						            	WHERE id_documento = ?  AND id_vencedor = ?
						            	";
						            	$query2=$this->conex->prepare($sql2);

						            	$query2->bindParam(1,$partida_naci,PDO::PARAM_STR);
						            	$query2->bindParam(2,$nota_certificada_9_grado,PDO::PARAM_STR);
										$query2->bindParam(3,$fotocopia_cedula,PDO::PARAM_STR);
										$query2->bindParam(4,$foto,PDO::PARAM_STR);
										$query2->bindParam(5,$id_documento,PDO::PARAM_INT);
										$query2->bindParam(6,$id_vencedor,PDO::PARAM_INT);

						            	$query2->execute();
						            	
										$resp='Los datos del  vencedor han sido actualizados con exito';
						            else:
						            	$resp='Los datos del  vencedor no fueron actualizados';

						            endif;

					else:

						$resp="Disculpe la fecha de nacimiento ingresada no coincidi con la edad";

					endif;

		}catch(PDOException $e){

			die('error'.$e->getMessage() );
		}
		print_r(json_encode($resp));
	}

}


?>