<?php
$file="../config/config.php";
require_once($file);
ini_set("session.cookie_lifetime","7220");
ini_set("session.gc_maxlifetime","7220");
session_start();
class Cohorte extends Conectar
{
	private $conex;
	
	public function __construct()
	{
		$this->conex=parent::Conexion();
		
	}
	public function addCohorte()
	{
		try
		{

			$sql="INSERT INTO cohorte VALUES (NULL,?,?,?,?,?,NOW(),NOW() );";
			$query=$this->conex->prepare($sql);
			/*1*/$nom_cohorte      = parent::limpiarcampo($_POST['nom_cohorte']);
			/*2*/$tipo_cohorte     = parent::limpiarcampo($_POST['tipo_cohorte']);
			/*3*/$fec_inic_cohorte = parent::limpiarcampo($_POST['fec_inic_cohorte']);
			/*4*/$fec_fin_cohorte  = parent::limpiarcampo($_POST['fec_fin_cohorte']);
			/*5*/$estado_cohorte   = parent::limpiarcampo($_POST['estado_cohorte']);

			$query->bindParam(1,$nom_cohorte,PDO::PARAM_STR);
			$query->bindParam(2,$tipo_cohorte,PDO::PARAM_STR);
			$query->bindParam(3,$fec_inic_cohorte,PDO::PARAM_STR);
			$query->bindParam(4,$fec_fin_cohorte,PDO::PARAM_STR);
			$query->bindParam(5,$estado_cohorte,PDO::PARAM_STR);

			$sql2="SELECT * FROM cohorte WHERE describe_cohorte = ? AND tipo_cohorte = ?";
			$query2=$this->conex->prepare($sql2);
			$query2->bindParam(1,$nom_cohorte,PDO::PARAM_STR);
			$query2->bindParam(2,$tipo_cohorte,PDO::PARAM_STR);
			if(!$query2->execute()) return false;
			if($query2->rowCount() > 0):

						$resp[0]='3';
			else:

				$query->execute();
				if($query->rowCount() > 0):
					$resp[0]='1';
				else:
					$resp[0]='2';
				endif;

			endif;


		}catch(PDOException  $e){

			die('error de query'.$e->getMessage() );
		}

		print_r(json_encode($resp));
	}

	public function get_Cohorte()
	{
			$sql="SELECT id_cohorte, describe_cohorte, tipo_cohorte, anio
			FROM cohorte
			/*WHERE estado_cohorte ='activo'*/
			ORDER BY id_cohorte
			LIMIT 0 , 30 ";
			$query=$this->conex->prepare($sql);
			if(!$query->execute())return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);

			endif;
	}
	public function get_Cohorte_Activa()
	{
			$sql="SELECT id_cohorte, describe_cohorte, tipo_cohorte, anio
			FROM cohorte
			WHERE estado_cohorte ='Activo'
			ORDER BY id_cohorte
			LIMIT 0 , 30 ";
			$query=$this->conex->prepare($sql);
			if(!$query->execute())return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);

			endif;
	}
	public function get_cohorte_id($id_cohorte)
	{
		$sql="SELECT id_cohorte,describe_cohorte,tipo_cohorte,fec_inic,fec_fin,estado_cohorte
		FROM cohorte WHERE id_cohorte = ?";
		$query=$this->conex->prepare($sql);
		$query->bindParam(1,$id_cohorte,PDO::PARAM_INT);
		if(!$query->execute(array($id_cohorte))) return false;
		if($query->rowCount() > 0):

			return $query->fetchAll();

		endif;
	}

	public function editCohorte()
	{
		try
		{
			$sql="UPDATE 
			cohorte 
			SET
			tipo_cohorte = ?,
			fec_inic = ?,
			fec_fin = ?,
			estado_cohorte = ?
			WHERE id_cohorte = ?
			";
			$query=$this->conex->prepare($sql);

			/*1*/$tipo_cohorte      	= parent::limpiarcampo($_POST['tipo_cohorte']);
			/*2*/$fec_inic_cohorte      = parent::limpiarcampo($_POST['fec_inic_cohorte']);
			/*3*/$fec_fin_cohorte      	= parent::limpiarcampo($_POST['fec_fin_cohorte']);
			/*4*/$estado_cohorte     	= parent::limpiarcampo($_POST['estado_cohorte']);
			/*5*/$id_cohorte      		= parent::limpiarcampo($_POST['id_cohorte']);

			$query->bindParam(1,$tipo_cohorte,PDO::PARAM_STR);
			$query->bindParam(2,$fec_inic_cohorte,PDO::PARAM_STR);
			$query->bindParam(3,$fec_fin_cohorte,PDO::PARAM_STR);
			$query->bindParam(4,$estado_cohorte,PDO::PARAM_STR);
			$query->bindParam(5,$id_cohorte,PDO::PARAM_STR);

			if(!$query->execute())return false;
			if($query->rowCount() > 0):

				$resp[0]='1';
			else:
				$resp[0]='2';
			endif;



		}catch(PDOException $e){

			die('error de query'.$e->getMessage() );
		}
		print_r(json_encode($resp));

	}

	public function addSemeste()
	{

		try
	{

			$this->conex->beginTransaction();


			$id_cohorte=$_POST['id_cohorte'];
			$nombre_semestre=$_POST['nombre_semestre'];
			$numero_semestre=$_POST['numero_semestre'];
			$fec_inic_semestre=$_POST['fec_inic_semestre'];
			$fec_fin_semestre=$_POST['fec_fin_semestre'];
			$num_semana_duracion=$_POST['num_semana_duracion'];
			$video_clase=$_POST['video_clase'];


			$id_materia=$_POST['materia'];
			$horas=$_POST['horas'];
			$tipo_semana=$_POST['semana'];


			foreach($horas as $clave=>$valor):
				if(empty($valor)) 
				unset($horas[$clave]);
			endforeach;

			foreach($tipo_semana as $clave=>$valor):
				if(empty($valor)) 
				unset($tipo_semana[$clave]);
			endforeach;

			foreach($video_clase as $clave=>$valor):
				if(empty($valor)) 
				unset($video_clase[$clave]);
			endforeach;

			foreach($id_materia as $clave=>$valor):
				if(empty($valor)) 
				unset($id_materia[$clave]);
			endforeach;



			$id_mat 	= 	parent::merge($id_materia);
			$ho 		= 	parent::merge($horas);
			$semana 	=	parent::merge($tipo_semana);
			$video 		=	parent::merge($video_clase);

			$sql="INSERT INTO semestre VALUES(NULL,?,?,?,?,?,NOW(),?);";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_cohorte,PDO::PARAM_INT);
			$query->bindParam(2,$nombre_semestre,PDO::PARAM_STR);
			$query->bindParam(3,$numero_semestre,PDO::PARAM_INT);
			$query->bindParam(4,$fec_inic_semestre,PDO::PARAM_STR);
			$query->bindParam(5,$fec_fin_semestre,PDO::PARAM_STR);
			$query->bindParam(6,$num_semana_duracion,PDO::PARAM_STR);

			$sql2="SELECT * FROM semestre WHERE decribe_semestre = ? AND id_cohorte = ?";
			$query2=$this->conex->prepare($sql2);
			$query2->bindParam(1,$nombre_semestre,PDO::PARAM_STR);
			$query2->bindParam(2,$id_cohorte,PDO::PARAM_INT);
			if(!$query2->execute())return false;
			if($query2->rowCount() > 0):

				$resp[0]='3';

			else:

				if($query->execute()):
				$id_semestre = $this->conex->lastInsertId();


						//truncate table materia_id
						// Insertamos los valores en la tabla hora_clase
						for($i = 0 ;$i < count($id_materia) ; $i++)
						{
						    
							if($id_materia > 0):

									$sql = "INSERT INTO hora_clase VALUES (NULL,'$id_semestre','$id_mat[$i]','$ho[$i]','$semana[$i]')";
							    	$query=$this->conex->prepare($sql);
							    	$query->execute();

							else:

									break;
							endif;

						}
						// Insertamos los valores en la tabla materia_semestre
							
								for($i = 0 ;$i < count($id_materia) ; $i++)
								{
						    
									if($id_materia > 0):

										$sql="INSERT INTO materia_semestre VALUES('$id_semestre','$id_mat[$i]');";
							    		$query=$this->conex->prepare($sql);
							    		$query->execute();

									else:
										break;
									endif;

								}

								//Insertamos los valores en la tabla video_clase
								for($i = 0 ;$i < count($id_materia) ; $i++)
								{
						    
									if($id_materia > 0):

										$sql="INSERT INTO video_clase_area VALUES('$id_semestre','$id_mat[$i]','$video[$i]');";
							    		$query=$this->conex->prepare($sql);
							    		$query->execute();

									else:
										break;
									endif;

								}
						////////////////////////////////////////////////////////////


									$this->conex->commit();

								$resp[0]='1';



			else:

				$resp[0]='2';



			endif;


			endif;
			
			}catch(PDOException $e){
					$this->conex->rollBack();

				die("error de consulta".$e->getMessage() );
			}


	print_r(json_encode($resp));

	}

	
	
	

}

