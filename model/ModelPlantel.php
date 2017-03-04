<?php
$file="../config/config.php";
require_once($file);

class Plantel extends Conectar
{

private $conex;
	
	public function __construct()
	{
		$this->conex=parent::Conexion();
		
	}

	public function getplantel(){

		$sql="SELECT id_plantel,
		nombre_plantel,
		codigo_plantel,
		direcc_plantel,
		plan_de_estudio 
		FROM plantel ORDER BY id_plantel DESC";
		$query=$this->conex->prepare($sql);
		if(!$query->execute() )return false;
		if($query->rowCount() > 0):

			return $query->fetchAll(PDO::FETCH_ASSOC);


		endif;
	}
	public function addPlantel()
	{
		if(!$_POST["nom_plantel"] || !$_POST["direcc_plantel"] ||  !$_POST["estado"] || !$_POST["municipio"] || !$_POST["parroquia"] || !$_POST["codigo_plantel"] || !$_POST["plan_de_estudio"]):


			$resp[0]='2';

				
			
		else:

			if(!is_numeric($_POST['plan_de_estudio'])):

                    $resp[0]='4';
             else:

             		 try
                    {
                        $sql="INSERT INTO plantel VALUES(NULL,?,?,?,?,?,?,?);";
                        $query=$this->conex->prepare($sql);

                    /*1*/$nom_plantel      = parent::limpiarcampo($_POST['nom_plantel']);
                    /*2*/$direcc_plantel   = parent::limpiarcampo($_POST['direcc_plantel']);
                    /*3*/$estado           = parent::limpiarcampo($_POST['estado']);
                    /*4*/$municipio        = parent::limpiarcampo($_POST['municipio']);
                    /*5*/$parroquia        = parent::limpiarcampo($_POST['parroquia']);
                    /*6*/$codigo_plantel   = parent::limpiarcampo($_POST['codigo_plantel']);
                    /*7*/$plan_de_estudio  = parent::limpiarcampo($_POST['plan_de_estudio']);

                        $query->bindParam(1,$nom_plantel,PDO::PARAM_STR);
                        $query->bindParam(2,$direcc_plantel,PDO::PARAM_STR);
                        $query->bindParam(3,$estado,PDO::PARAM_STR);
                        $query->bindParam(4,$municipio,PDO::PARAM_STR);
                        $query->bindParam(5,$parroquia,PDO::PARAM_STR);
                        $query->bindParam(6,$codigo_plantel,PDO::PARAM_STR);
                        $query->bindParam(7,$plan_de_estudio,PDO::PARAM_INT);

                        $sql2="SELECT * FROM plantel WHERE nombre_plantel = ?";
                        $query2=$this->conex->prepare($sql2);
                        $query2->bindParam(1,$nom_plantel,PDO::PARAM_STR);

                        if(!$query2->execute() )return false;
                        if($query2->rowCount() > 0):

                            $resp[0]='5';

                        else:

                            $query->execute();

                            $resp[0]='1';

                        endif;
                    }catch(PDOException $e){

                        die('error de query'.$e->getMessage() );

                    }

             endif;


			

		endif;

		
		print_r(json_encode($resp));
	}
	public function get_plantel_por_id($id_plantel)
	{

		$sql="SELECT 
		id_plantel,
		nombre_plantel,
		codigo_plantel,
		direcc_plantel,
		estado,
		municipio,
		parroquia,
		plan_de_estudio
		FROM 
		plantel
		WHERE id_plantel = ?;
		";
		$query=$this->conex->prepare($sql);
		$query->bindParam(1,$id_plantel,PDO::PARAM_INT);
		if(!$query->execute(array($id_plantel)) )return false;
		if($query->rowCount() > 0):

			return $query->fetchAll(PDO::FETCH_ASSOC);
		else:

		endif;
	}

	public function editPlantel()
	{

		if(!$_POST["nom_plantel"] || !$_POST["direcc_plantel"] ||  !$_POST["estado"] || !$_POST["municipio"] || !$_POST["parroquia"] || !$_POST["codigo_plantel"] || !$_POST["plan_de_estudio"]):
		

				$resp[0]='2';

		else:

			

		    	$sql="UPDATE plantel SET  
		        nombre_plantel = ?,
		        direcc_plantel = ?,
		        estado = ?,
		        municipio = ?,
		        parroquia = ?,
		        codigo_plantel = ?,
		        plan_de_estudio = ? 
		        WHERE id_plantel = ?;
		        ";
		        $query=$this->conex->prepare($sql);

		        /*1*/$nom_plantel      = parent::limpiarcampo($_POST['nom_plantel']);
		        /*2*/$direcc_plantel   = parent::limpiarcampo($_POST['direcc_plantel']);
		        /*3*/$estado           = parent::limpiarcampo($_POST['estado']);
		        /*4*/$municipio        = parent::limpiarcampo($_POST['municipio']);
		        /*5*/$parroquia        = parent::limpiarcampo($_POST['parroquia']);
		        /*6*/$codigo_plantel   = parent::limpiarcampo($_POST['codigo_plantel']);
		        /*7*/$plan_de_estudio  = parent::limpiarcampo($_POST['plan_de_estudio']);
		        /*9*/$id_plantel       = parent::limpiarcampo($_POST['id_plantel']);

		        $query->bindParam(1,$nom_plantel,PDO::PARAM_STR);
		        $query->bindParam(2,$direcc_plantel,PDO::PARAM_STR);
		        $query->bindParam(3,$estado,PDO::PARAM_STR);
		        $query->bindParam(4,$municipio,PDO::PARAM_STR);
		        $query->bindParam(5,$parroquia,PDO::PARAM_STR);
		        $query->bindParam(6,$codigo_plantel,PDO::PARAM_STR);
		        $query->bindParam(7,$plan_de_estudio,PDO::PARAM_INT);
		        $query->bindParam(8,$id_plantel,PDO::PARAM_INT);

		        if(!$query->execute() )return false;
		        if($query->rowCount() > 0):

		        	$resp[0]='1';

		        else:

		        	$resp[0]='3';

		        endif;




		endif;

		print_r(json_encode($resp));


	}

	public function get_cohorte()
	{
		try
		{

			$sql=" SELECT 
			id_cohorte,
			describe_cohorte,
			tipo_cohorte,
			estado_cohorte,
			anio 
			FROM cohorte
			WHERE estado_cohorte = 'activo'
			ORDER BY id_cohorte DESC
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
	public function get_cohorte_id($id_cohorte)
	{
		try
		{

			$sql=" SELECT 
				id_cohorte,
				describe_cohorte,
				tipo_cohorte,
				estado_cohorte,
				anio 
				FROM cohorte
				WHERE estado_cohorte = 'activo'
				AND id_cohorte = ?;
				";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_cohorte,PDO::PARAM_INT);
			if(!$query->execute() )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);

			endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}

	public function get_semestre_id_cohorte($id_cohorte)
	{
		try
		{

			$sql=" SELECT 
				id_semestre,
				id_cohorte,
				decribe_semestre,
				numero_semestre,
				duracion_semestre
				FROM semestre
				WHERE id_cohorte = ?";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_cohorte,PDO::PARAM_INT);
			if(!$query->execute(array($id_cohorte)) )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);
			else:
				echo'<option value="">No existen semestres asociados a la cohorte</option>';

			endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}

	public function get_semestre_id($id_semestre,$id_cohorte)
	{
		try
		{

			$sql=" SELECT 
				id_semestre,
				id_cohorte,
				decribe_semestre,
				numero_semestre,
				duracion_semestre
				FROM semestre
				WHERE id_semestre = ? 
				AND id_cohorte = ?
				;
				";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_semestre,PDO::PARAM_INT);
			$query->bindParam(2,$id_cohorte,PDO::PARAM_INT);
			if(!$query->execute() )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);

			endif;

		}catch(PDOException $e){

			die("error en el query".$e->getMessage() );

		}
	}

	public function addAmbiente()
	{
		try
		{
			$sql="INSERT INTO ambiente VALUES (NULL,?,?,?,?,?,?,?,?,?,?);";
			$query=$this->conex->prepare($sql);

			$id_plantel          = parent::limpiarcampo($_POST['id_plantel']);
			$nombre_ambiente     = parent::limpiarcampo($_POST['nombre_ambiente']);
			$tipo_ambiente       = parent::limpiarcampo($_POST['tipo_ambiente']);
			$turno_clase         = parent::limpiarcampo($_POST['turno_clase']);
			$horario_clase       = parent::limpiarcampo($_POST['horario_clase']);
			$id_user_facilitador = parent::limpiarcampo($_POST['id_user_facilitador']);
			$id_user_coordinador = parent::limpiarcampo($_POST['id_user_coordinador']);
			$id_user_vocero 	 = parent::limpiarcampo($_POST['id_user_vocero']);
			$id_cohorte          = parent::limpiarcampo($_POST['id_cohorte']);
			$id_semestre         = parent::limpiarcampo($_POST['id_semestre']);

			$query->bindParam(1,$id_plantel,PDO::PARAM_INT);
			$query->bindParam(2,$nombre_ambiente,PDO::PARAM_STR);
			$query->bindParam(3,$tipo_ambiente,PDO::PARAM_STR);
			$query->bindParam(4,$turno_clase ,PDO::PARAM_STR);
			$query->bindParam(5,$horario_clase ,PDO::PARAM_STR);
			$query->bindParam(6,$id_user_facilitador ,PDO::PARAM_INT);
			$query->bindParam(7,$id_user_coordinador ,PDO::PARAM_INT);
			$query->bindParam(8,$id_user_vocero ,PDO::PARAM_INT);
			$query->bindParam(9,$id_cohorte ,PDO::PARAM_INT);
			$query->bindParam(10,$id_semestre  ,PDO::PARAM_INT);

			$sql2="SELECT * FROM ambiente WHERE nombre_ambiente = ?";
            $query2=$this->conex->prepare($sql2);
            $query2->bindParam(1,$nombre_ambiente,PDO::PARAM_STR);

            if(!$query2->execute())return false;
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

			
			

		}catch(PODException $e){

			die('error de query'.$e->getMessage() );

		}


		print_r(json_encode($resp));
	}

	public function editAmbiente()
	{
		try
		{
			$sql="UPDATE ambiente SET
			id_plantel = ?,
			nombre_ambiente = ?,
			tipo_ambiente = ?,
			turno_clase = ?,
			horario_clase = ?,
			id_user_facilitador = ?,
			id_user_coordinador = ?,
			id_user_vocero = ?,
			id_cohorte = ?,
			id_semestre = ?
			WHERE id_ambiente = ?
			;";

			$query=$this->conex->prepare($sql);

			/*1*/$id_plantel          = parent::limpiarcampo($_POST['id_plantel']);
			/*2*/$nombre_ambiente     = parent::limpiarcampo($_POST['nombre_ambiente']);
			/*3*/$tipo_ambiente       = parent::limpiarcampo($_POST['tipo_ambiente']);
			/*4*/$turno_clase         = parent::limpiarcampo($_POST['turno_clase']);
			/*5*/$horario_clase       = parent::limpiarcampo($_POST['horario_clase']);
			/*6*/$id_user_facilitador = parent::limpiarcampo($_POST['id_user_facilitador']);
			/*7*/$id_user_coordinador = parent::limpiarcampo($_POST['id_user_coordinador']);
			/*8*/$id_user_vocero 	  = parent::limpiarcampo($_POST['id_user_vocero']);
			/*9*/$id_cohorte          = parent::limpiarcampo($_POST['id_cohorte']);
			/*10*/$id_semestre        = parent::limpiarcampo($_POST['id_semestre']);
			/*11*/$id_ambiente        = parent::limpiarcampo($_POST['id_ambiente']);

			
			$query->bindParam(1,$id_plantel,PDO::PARAM_INT);
			$query->bindParam(2,$nombre_ambiente,PDO::PARAM_STR);
			$query->bindParam(3,$tipo_ambiente,PDO::PARAM_STR);
			$query->bindParam(4,$turno_clase,PDO::PARAM_STR);
			$query->bindParam(5,$horario_clase,PDO::PARAM_STR);
			$query->bindParam(6,$id_user_facilitador,PDO::PARAM_INT);
			$query->bindParam(7,$id_user_coordinador,PDO::PARAM_INT);
			$query->bindParam(8,$id_user_vocero,PDO::PARAM_INT);
			$query->bindParam(9,$id_cohorte,PDO::PARAM_INT);
			$query->bindParam(10,$id_semestre  ,PDO::PARAM_INT);
			$query->bindParam(11,$id_ambiente,PDO::PARAM_INT);
           
            if(!$query->execute() ) return false;
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

	public function getAmbiente(){

		$sql="SELECT id_ambiente,
		nombre_ambiente
		FROM ambiente ORDER BY id_ambiente DESC";
		$query=$this->conex->prepare($sql);
		if(!$query->execute() )return false;
		if($query->rowCount() > 0):

			return $query->fetchAll(PDO::FETCH_ASSOC);


		endif;
	}
	public function get_ambiente_por_id($id_ambiente)
	{

		try
		{
			$sql="SELECT 
		id_ambiente,
		id_plantel,
		nombre_ambiente,
		tipo_ambiente,
		turno_clase,
		horario_clase,
		id_user_facilitador,
		id_user_coordinador,
		id_user_vocero,
		id_cohorte,
		id_semestre
		FROM 
		ambiente
		WHERE id_ambiente = ?;
		";
		$query=$this->conex->prepare($sql);
		$query->bindParam(1,$id_ambiente,PDO::PARAM_INT);
		if(!$query->execute(array($id_ambiente)) )return false;
		if($query->rowCount() > 0):

			return $query->fetchAll(PDO::FETCH_ASSOC);
		else:

		endif;

		}catch(PDOException $e){

				die('error de query'.$e->getMessage() );

		}
	}

	public function addMaterialParaAmbiente()
	{
		try
		{
			$this->conex->beginTransaction();

				//datos para la tabla DVD
				/*1*/$id_ambiente      = parent::limpiarcampo($_POST['id_ambiente']);
				/*2*/$fec_asig_dvd     = parent::limpiarcampo($_POST['fec_asig_dvd']);
				/*3*/$marca_dvd        = parent::limpiarcampo($_POST['marca_dvd']);
				/*4*/$modelo_dvd       = parent::limpiarcampo($_POST['modelo_dvd']);
				/*5*/$serial_dvd       = parent::limpiarcampo($_POST['serial_dvd']);
				/*6*/$serial_ribas_dvd = parent::limpiarcampo($_POST['serial_ribas_dvd']);

				$sql="SELECT * FROM
				 	ambiente A
					INNER JOIN dvd DV ON A.id_ambiente = DV.id_ambiente
					INNER JOIN televisor TV ON TV.id_ambiente = A.id_ambiente
					INNER JOIN folleto F ON F.id_ambiente = A.id_ambiente
					WHERE A.id_ambiente = ?;
					LIMIT 0 , 30
				";
				$query=$this->conex->prepare($sql);
				$query->bindParam(1,$id_ambiente,PDO::PARAM_INT);
				if(!$query->execute())return false;
				if($query->rowCount() > 0):

						$resp[0]='1';
				else:

					$sql="INSERT INTO dvd VALUES (NULL,?,?,?,?,?,?);";
					$query=$this->conex->prepare($sql);
					$query->bindParam(1,$id_ambiente,PDO::PARAM_INT);
					$query->bindParam(2,$fec_asig_dvd,PDO::PARAM_STR);
					$query->bindParam(3,$marca_dvd ,PDO::PARAM_STR);
					$query->bindParam(4,$modelo_dvd ,PDO::PARAM_STR);
					$query->bindParam(5,$serial_dvd ,PDO::PARAM_STR);
					$query->bindParam(6,$serial_ribas_dvd ,PDO::PARAM_STR);

					$query->execute();

					//datos para la tabla televisor
					/*1*//*id_ambiente !importante*/
					/*2*/$fec_asig_tv     = parent::limpiarcampo($_POST['fec_asig_tv']);
					/*3*/$marca_tv        = parent::limpiarcampo($_POST['marca_tv']);
					/*4*/$modelo_tv       = parent::limpiarcampo($_POST['modelo_tv']);
					/*5*/$serial_tv       = parent::limpiarcampo($_POST['serial_tv']);
					/*6*/$serial_ribas_tv = parent::limpiarcampo($_POST['serial_ribas_tv']);

					$sql="INSERT INTO televisor VALUES (NULL,?,?,?,?,?,?);";
					$query=$this->conex->prepare($sql);
					$query->bindParam(1,$id_ambiente,PDO::PARAM_INT);
					$query->bindParam(2,$fec_asig_tv,PDO::PARAM_STR);
					$query->bindParam(3,$marca_tv,PDO::PARAM_STR);
					$query->bindParam(4,$modelo_tv,PDO::PARAM_STR);
					$query->bindParam(5,$serial_tv,PDO::PARAM_STR);
					$query->bindParam(6,$serial_ribas_tv,PDO::PARAM_STR);

					$query->execute();

					/*datos para la tabla folleto*/
					/*1*//*id_ambiente !importante*/
					/*2*/$fec_asig_folleto = parent::limpiarcampo($_POST['fec_asig_folleto']);
					/*3*/$cantidad_folleto = parent::limpiarcampo($_POST['cantidad_folleto']);
					/*4*/$kit_video_clase  = parent::limpiarcampo($_POST['kit_video_clase']);

					$sql="INSERT INTO folleto VALUES (NULL,?,?,?,?);";
					$query=$this->conex->prepare($sql);
					$query->bindParam(1,$id_ambiente,PDO::PARAM_INT);
					$query->bindParam(2,$fec_asig_folleto,PDO::PARAM_STR);
					$query->bindParam(3,$cantidad_folleto,PDO::PARAM_INT);
					$query->bindParam(4,$kit_video_clase,PDO::PARAM_STR);

					$query->execute();

					$this->conex->commit();
					$resp[0]='2';

				endif;
				

		}catch(PDOException  $e){

			$this->conex->rollBack();
			$resp[0]='3';

			die('error de query'.$e->getMessage() );
		}
		print_r(json_encode($resp));
	}

	public function get_Ambiente_Materiales($id_ambiente)
	{
		try
		{
			$sql="SELECT 
			A.nombre_ambiente,
			A.tipo_ambiente,
			A.turno_clase,
			A.horario_clase,
			A.id_cohorte,
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
	public function editMaterilesAsignadosAmbiente($id_ambiente)
	{
		$sql="UPDATE
			televisor TV 
			INNER JOIN dvd DV
			ON TV.id_ambiente = DV.id_ambiente 
			INNER JOIN folleto FO
			ON FO.id_ambiente = DV.id_ambiente
			SET 
			TV.fec_asignado_tv = ?,
			TV.marca_tv = ?,
			TV.modelo_tv = ?,
			TV.serial_de_fabrica_tv = ?,
			TV.serial_ribas_tv = ?,
			DV.fec_asignado_dvd = ?,
			DV.marca_dvd = ?,
			DV.modelo_dvd = ?,
			DV.serial_fabrica_dvd = ?,
			DV.serial_ribas_dvd = ?,
			FO.fec_asignado_folleto = ?,
			FO.cantidad_folleto = ?,
			FO.kit_video_clase = ?
			WHERE TV.id_ambiente = ? AND  DV.id_ambiente = ? AND FO.id_ambiente = ?";
			$query=$this->conex->prepare($sql);

		//datos para la tabla DVD
				/*1*/$id_ambiente      = parent::limpiarcampo($_POST['id_ambiente']);
				/*2*/$fec_asig_dvd     = parent::limpiarcampo($_POST['fec_asig_dvd']);
				/*3*/$marca_dvd        = parent::limpiarcampo($_POST['marca_dvd']);
				/*4*/$modelo_dvd       = parent::limpiarcampo($_POST['modelo_dvd']);
				/*5*/$serial_dvd       = parent::limpiarcampo($_POST['serial_dvd']);
				/*6*/$serial_ribas_dvd = parent::limpiarcampo($_POST['serial_ribas_dvd']);

				//datos para la tabla televisor
					/*1*//*id_ambiente !importante*/
					/*2*/$fec_asig_tv     = parent::limpiarcampo($_POST['fec_asig_tv']);
					/*3*/$marca_tv        = parent::limpiarcampo($_POST['marca_tv']);
					/*4*/$modelo_tv       = parent::limpiarcampo($_POST['modelo_tv']);
					/*5*/$serial_tv       = parent::limpiarcampo($_POST['serial_tv']);
					/*6*/$serial_ribas_tv = parent::limpiarcampo($_POST['serial_ribas_tv']);

					/*datos para la tabla folleto*/
					/*1*//*id_ambiente !importante*/
					/*2*/$fec_asig_folleto = parent::limpiarcampo($_POST['fec_asig_folleto']);
					/*3*/$cantidad_folleto = parent::limpiarcampo($_POST['cantidad_folleto']);
					/*4*/$kit_video_clase  = parent::limpiarcampo($_POST['kit_video_clase']);


						$query->bindParam(1,$fec_asig_tv,PDO::PARAM_STR);
						$query->bindParam(2,$marca_tv,PDO::PARAM_STR);
						$query->bindParam(3,$modelo_tv,PDO::PARAM_STR);
						$query->bindParam(4,$serial_tv,PDO::PARAM_STR);
						$query->bindParam(5,$serial_ribas_tv,PDO::PARAM_STR);

						$query->bindParam(6,$fec_asig_dvd,PDO::PARAM_STR);
						$query->bindParam(7,$marca_dvd,PDO::PARAM_STR);
						$query->bindParam(8,$modelo_dvd,PDO::PARAM_STR);
						$query->bindParam(9,$serial_dvd,PDO::PARAM_STR);
						$query->bindParam(10,$serial_ribas_dvd,PDO::PARAM_STR);


						$query->bindParam(11,$fec_asig_folleto,PDO::PARAM_STR);
						$query->bindParam(12,$cantidad_folleto,PDO::PARAM_STR);
						$query->bindParam(13,$kit_video_clase,PDO::PARAM_STR);
						
						$query->bindParam(14,$id_ambiente,PDO::PARAM_INT);
						$query->bindParam(15,$id_ambiente,PDO::PARAM_INT);
						$query->bindParam(16,$id_ambiente,PDO::PARAM_INT);

						if(!$query->execute() )return false;
							if($query->rowCount() > 0):

								$resp[0]='1';

							else:

								$resp[0]='2';

							endif;

					print_r(json_encode($resp));		
	}


}



