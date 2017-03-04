<?php
$file="../config/config.php";
require_once($file);

class Materia extends Conectar
{

private $conex;
	
	public function __construct()
	{
		$this->conex=parent::Conexion();
		
	}

public function getMateria()
{
	$sql="SELECT id_materia,descripcion,estado FROM materia ";
	$query=$this->conex->prepare($sql);
	if(!$query->execute()) return false;
	if($query->rowCount() > 0):

		return $query->fetchAll(PDO::FETCH_ASSOC);
		$this->conex=null;
	endif;

}

public function getSelectMateria()
{
	$sql="SELECT id_materia,descripcion FROM materia ";
	$query=$this->conex->prepare($sql);
	if(!$query->execute()) return false;
	if($query->rowCount() > 0):

		return $query->fetchAll(PDO::FETCH_ASSOC);
		$this->conex=null;
	endif;

}

public function gettMateriaId($id_materia)
{
	try
	{

			$sql="SELECT id_materia,descripcion,estado FROM materia WHERE id_materia=?";
			$query=$this->conex->prepare($sql);
			$query->bindParam(1,$id_materia,PDO::PARAM_STR);
			if(!$query->execute(array($id_materia)) )return false;
			if($query->rowCount() > 0):

				return $query->fetchAll(PDO::FETCH_ASSOC);
				$this->conex=null;
			endif;

	}catch(PDOException $e){

		die("error de consulta".$e->getMessage() );

	}
}

public function editMateria()
{

	$sql="UPDATE 
	materia 
	SET 
	estado=?
	WHERE id_materia=?
	";
	$query=$this->conex->prepare($sql);

	//$materia=strip_tags(trim(htmlspecialchars($_GET['materia'], ENT_QUOTES, "ISO-8859-1")));
   	$estado=strip_tags(trim(htmlspecialchars($_GET['estado'], ENT_QUOTES, "ISO-8859-1")));
   	$IdMateria=strip_tags(trim(htmlspecialchars($_GET['IdMateria'], ENT_QUOTES, "ISO-8859-1")));

   	//$query->bindParam(1,$materia,PDO::PARAM_STR);
   	$query->bindParam(1,$estado,PDO::PARAM_STR);
   	$query->bindParam(2,$IdMateria,PDO::PARAM_INT);

   	if(!$query->execute())return false;
   	if($query->rowCount() > 0):
   		echo 'la meteria ha sido actualizada con exito';
   		$this->conex=null;
   	else:
   		echo'Los datos no pudieron ser actualizados';
   		
   	endif;

	
}

public function addMateria()
{
	


	try
	{

		$sql="INSERT INTO materia VALUES(null,?,?)";
		$query=$this->conex->prepare($sql);	

		$materia=strip_tags(trim(htmlspecialchars($_POST['materia'], ENT_QUOTES, "ISO-8859-1")));
		$estado=strip_tags(trim(htmlspecialchars($_POST['estado'], ENT_QUOTES, "ISO-8859-1")));
	
		$query->bindParam(1,$materia,PDO::PARAM_STR);
		$query->bindParam(2,$estado,PDO::PARAM_STR);
		
		$sql2="SELECT * FROM materia WHERE descripcion=?";
		$query2=$this->conex->prepare($sql2);
		$query2->bindParam(1,$materia,PDO::PARAM_STR);
		if(!$query2->execute()) return false;
		if($query2->rowCount() > 0):

			$resp[0]='1';
		else:
			$query->execute();
			$resp[0]='2';
			$this->conex=null;
		endif;

	}catch(PDOException $e){


		die("error de consulta".$e->getMessage() );

	}

	
	
print_r(json_encode($resp));



}

public function deleteMateria($id_materia)
{
	try
	{
		$sql="DELETE FROM materia WHERE id_materia=? ";
		$query=$this->conex->prepare($sql);
		$query->bindParam(1,$id_materia,PDO::PARAM_INT);
		$query->execute(array($id_materia));
		if($query->rowCount() > 0):

			echo'Se ha sido eliminado la Materia';
			$this->conex=null;
	
		endif;

	}catch(PDOException $e){

		die('error de consulta'.$e->getMessage() );
	}

}

}