<?php
error_reporting(E_ALL || E_NOTICE);
ini_set("display_errors",1);
abstract class Conectar
{

	protected $dbh;

	public function Conexion()

	{

			try
			{
				$dsn='mysql:host=localhost;dbname=SAMRY';
				$User='root';
				$Password='12345';
				$this->dbh=new PDO($dsn,$User,$Password);
				$this->dbh->exec("SET NAMES'UTF8'");
				$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $this->dbh;

				//echo "conexion exitosa";

			} catch(PDOException $e) {

				die("error de conexion".$e->getMessage() ); 

			}
	}

	public function ruta()
    {
        return "http://localhost/Ribas/";
    }

    public  function VerificaPassword($password, $hashedPassword) 
      {
             return crypt($password, $hashedPassword) == $hashedPassword;
      }

	public function mkdir_recursivo($pathname, $mode)
	{
		umask(0);
		is_dir(dirname($pathname)) || mkdir_recursive(dirname($pathname), $mode);
		return is_dir($pathname) || mkdir($pathname, $mode);
	}

	public function calculaedad($fechanacimiento)
	{
		list($ano,$mes,$dia) = explode("-",$fechanacimiento);
			$ano_diferencia = date("Y") - $ano;
			$mes_diferencia = date("m") - $mes;
			$dia_diferencia = date("d") - $dia;

			if ($mes_diferencia==0 && $dia_diferencia < 0 || $mes_diferencia < 0)

			$ano_diferencia--;

			return $ano_diferencia;
	}

	public function cambiarFormatoFecha($fecha)
	{
    	list($anio,$mes,$dia)=explode("/",$fecha);
    	return $dia."-".$mes."-".$anio;
	}

	public function limpiarcampo($campo)
	{
		$campo=strip_tags(trim(htmlspecialchars($campo, ENT_QUOTES, "ISO-8859-1")));
		return $campo;
	}

	
public  function merge($dato){

		return array_merge($dato);
	}


}
?>