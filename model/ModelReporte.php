<?php
$file="../config/config.php";
require_once($file);

class Reporte extends Conectar
{

private $conex;
	
	public function __construct()
	{
		$this->conex=parent::Conexion();
		
	}

	public function getImpreReporteSemestre($id_cohorte,$id_semestre){

		try
		{
			$sql="SELECT  DISTINCT
			S.decribe_semestre,
			S.duracion_semestre,
				M.descripcion,
					VC.cantidad,
						HC.hora,
						HC.tipo_clase
			FROM semestre S
				INNER JOIN cohorte C
  					ON S.id_cohorte = C.id_cohorte
 				INNER JOIN materia_semestre MS
 					ON MS.id_semestre = S.id_semestre
 				INNER JOIN materia M
 					ON M.id_materia = MS.id_materia
 				INNER JOIN video_clase_area VC
 					ON VC.id_materia = M.id_materia
 				INNER JOIN hora_clase HC 
 				ON HC.id_materia = M.id_materia
 			WHERE S.id_semestre = ? AND C.id_cohorte = ? AND VC.id_semestre = ? AND HC.id_semestre = ? ;";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_semestre,PDO::PARAM_INT);
			$query->bindParam(2,$id_cohorte,PDO::PARAM_INT);
			$query->bindParam(3,$id_semestre,PDO::PARAM_INT);
			$query->bindParam(4,$id_semestre,PDO::PARAM_INT);
			if(!$query->execute() )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll();


			endif;

		}catch(PDOException $e){

			die('erro de query'.$e->getMessage() );
		}
	}

	public function get_informeMaterialesAmbiente($id_ambiente)
	{
		try
		{
			$sql="SELECT 
            A.nombre_ambiente,
            DV.id_dvd,
            DV.fec_asignado_dvd,
            DV.marca_dvd,
            DV.modelo_dvd,
            DV.serial_fabrica_dvd,
            DV.serial_ribas_dvd,
            TV.id_televisor,
            TV.fec_asignado_tv,
            TV.marca_tv,
            TV.modelo_tv,
            TV.serial_de_fabrica_tv,
            TV.serial_ribas_tv,
            F.id_folleto,
            F.fec_asignado_folleto,
            F.cantidad_folleto,
            F.kit_video_clase
            FROM 
            ambiente A
            INNER JOIN dvd DV
            ON A.id_ambiente = DV.id_ambiente
            INNER JOIN televisor TV
            ON TV.id_ambiente = A.id_ambiente
            INNER JOIN folleto F
            ON F.id_ambiente = A.id_ambiente
            WHERE A.id_ambiente = ?";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_ambiente,PDO::PARAM_INT);
			if(!$query->execute() )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);
			

			endif;

		}catch(PDOEXecption $e){

			die('error de query'.$e->getMessage() );
		}
	}
	


}



