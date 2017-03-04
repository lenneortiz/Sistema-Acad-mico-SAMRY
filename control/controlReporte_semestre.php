<?php
//var_dump($_GET);
$file="../model/ModelReporte.php";
if(file_exists($file)):
	require_once($file);
	$ClassReporte=new Reporte();
	
	$reporteSemestre=$ClassReporte->getImpreReporteSemestre($_GET['id_cohorte'],$_GET['id_semestre']);

	$fecha = date('d-m-Y');
endif;

$file="../libs/dompdf_config.inc.php";
if(file_exists($file)):
	require_once($file);

else:
	die("no existe el archivo");
exit;
	endif;


	$html =
'
<!DOCTYPE html>
<html lang="es">
<meta charset="utf8">
<head>
<style type="text/css">
@page { margin: 180px 50px; }
.container
    {
        position:relative;
        margin:0 auto;
        width:80%;
        height:auto;
        
    }
   
#header 
{ 
    position: fixed; 
    left: 0px; 
    top: -150px; 
    right: 0px; 
    height: 10px;
}
#encabezado_img
    {
    	position:relative;
    	width:100%;
    	height:50px
    }
 #table
    {
    	border-collapse:collapse;
    	
    }
</style>
</head>
<body class="container">
<div id="header">
<img id="encabezado_img" src="../vista/public/img/encabezado_gobierno.png" >
</div>
';
 $html .='
 <div style="height:100px"></div>
<table id="table" border="1" align="center">
 <caption><strong>'.$reporteSemestre[0]['decribe_semestre'].'</strong></caption>
 <tr>
    <td><strong>Áreas de conocimiento</strong></td>
    <td><strong>Horas<br>Semanales</strong></td>
    <td><strong>Número de video<br>Clase por área</strong></td>
    <td><strong>Duración del semestre</strong></td>
    </tr>
 ';
 for ($i=0; $i< count($reporteSemestre); $i++){
$html .= '

 <tr align="center">
    <td>'.$reporteSemestre[$i]['descripcion'].'</td>
    <td>'.$reporteSemestre[$i]['hora'].' '.$reporteSemestre[$i]['tipo_clase'].'</td>
    <td>'.$reporteSemestre[$i]['cantidad'].'</td>
    <td>'.$reporteSemestre[$i]['duracion_semestre'].' semanas</td>
    </tr>';
}
$html .= '
</table>';


$html .='
<div style="height:100px"></div>
<table id="table" border="1" align="center">
 <caption><strong>Consolidación de las video clases</strong></caption>
	 <tr>
	    <td><strong>LOS DÍAS VIERNES EJERCITCIÓN.<br>MENSUALMENTE LA ASAMBLEA DE EVALUACIÓN</strong></td>
	 
	 </tr>
 ';
 $html .= '
</table>';


$html.='
 </div> <!--fin de container-->
</body>
</html>';
$dompdf = new DOMPDF();
//$dompdf->set_paper('letter','landscape');
//$dompdf->set_paper('legal','landscape');
$html=utf8_decode($html);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("pdf".Date('Y-m-d').".pdf");
	
?>

