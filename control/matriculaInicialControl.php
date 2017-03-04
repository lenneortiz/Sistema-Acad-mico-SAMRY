<?php
//var_dump($_GET);
$file="../model/ModelReporte.php";
if(file_exists($file)):
	require_once($file);
	$ClassReporte=new Reporte();
	
	//$reporteSemestre=$ClassReporte->getImpreReporteSemestre($_GET['id_cohorte'],$_GET['id_semestre']);

	$fecha = date('d-m-Y');
endif;

$file="../libs/dompdf_config.inc.php";
if(file_exists($file)):
	require_once($file);

else:
	die("no existe el archivo");
exit;
	endif;
?>

<?php
$html ='
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf8"/>
    <style type="text/css">
    body
    {
        font:11px verdana,sans-serif;
    }
    @page { margin: 180px 50px; }


#header 
{ 
    position: fixed; 
    left: 0px; 
    top: -150px; 
    right: 0px; 
    height: 50px;
}
    .table1{
        font:13px verdana,sans-serif;
        border-collapse:collapse;
    }
    caption
    {
        font:14px verdana,sans-serif;
        font-weight:bold;
    }
    .table1 td
    {
        padding:0px;
        margin:5px;

    }
    .tabla-footer td
    {
        text-align: left
    }
    .datos-left
    {
        width:auto;
    }
    .titulo
    {
        text-align:center;
        font-weight:bold;
        padding:2px;
    }
    p
    {
        /*text-decoration:underline;*/
        font:13px verdana,sans-serif;
        width: 100%
    }
    .container
    {
        position:relative;
        margin:0 auto;
        width:95%;
        height:auto;
        
    }
    .obsevaciones
    {
         width:95%;
         margin:0 auto;
         height:60px;
         margin-bottom:28px;
         text-align: justify;
    }
    .subrayado-texto
    {
        border-bottom:1px solid;
    }
    .col-left
    {
        position:relative;
        float.left;
        width:250px;
        height:145px;
        border:1px solid;
    }
    .col-right
    {
        position:relative;
        float:right;
        width:250px;
        height:100px;
        border:1px solid;
    }
    
    </style>
        
    </head>
    <body>
    <div class="container">
    <div id="header">
    <img  src="../vista/public/img/encabezado_gobierno.png" width="100%"  height="50px">
    </div>
    
    <div style="width:100%;">

    <!--<table border="1" align="center" cellpadding="0" cellspacing="0" style="page-break-before: always;">-->
    <table border="1" align="center" cellpadding="0" cellspacing="0" class="tabla1" width="98%">
    
        <caption>Matricula Inicial</caption>

        <tr >
            <td class="titulo" colspan="10" >Datos del ambiente</td>
        </tr>
        <tr>
            <td colspan="1" class="datos-left">Estado</td>
            <td colspan="2">Yaracuy</td>
            <td class="datos-left">Municipio</td>
            <td colspan="2">san felipe</td>
            <td class="datos-left">Parroquia</td>
            <td colspan="3">San felipe</td>
        </tr>
        <tr>
            <td class="datos-left">Nombre del Plantel o sede</td>
            <td colspan="2">UNIDAD EDUCATIVA LA MOSCA</td>
            <td colspan="2" class="datos-left">Dirección del Plantel</td>
            <td colspan="5">CALLE LA MOSCA CON CALLEJON COUNTRY CLUB</td>

        </tr>
        <tr>
            <td class="datos-left">Código de plantel</td>
            <td>OD04022211</td>
            <td class="datos-left">Plan de estudio</td>
            <td>31050</td>
            <td class="datos-left">Cédula del coordinador(a)</td>
            <td>19605978</td>
            <td colspan="2" class="datos-left">Nombre y apellido coordinador(a)</td>
            <td colspan="2">juan perez alfonzo</td>
            
        </tr>
        <tr>
            <td class="datos-left">Cédula del facilitador(a)</td>
            <td>13796085</td>
            <td colspan="3" class="datos-left">Nombre apellido facilitador(a)</td>
            <td colspan="5">luis medina parra</td>

            
        </tr>
        <tr>
            <td colspan="2" class="datos-left">Teléfono del coordinador(a) o ruta</td>
            <td>0412-5446834</td>
            <td colspan="2" class="datos-left">Teléfono del facilitador(a)</td>
            <td colspan="5">04245447895</td>
            
        </tr>
        <tr align="center">
            <td>Tipo de ambiente</td>
            <td>Robinson</td>
            <td>Cohorte del ambiente</td>
            <td>cohorte-18</td>
            <td>Nivel</td>
            <td>A</td>
            <td>Semestre</td>
            <td>1</td>
            <td>Turno</td>
            <td>diurno</td>
        </tr>';

        $html.='</table>';
 
        
    $html.='
            <table border="1" align="center" cellpadding="0" cellspacing="0"  width="98%">
            <caption>Datos del Vencedor(a)</caption>
            <tr>
            <td align="center" style="width:2%">Nº</td>
            <td align="center">Cédula</td>
            <td align="center">Apellidos</td>
            <td align="center"colspan="2">Nombres</td>
            <td align="center">sexo</td>
            <td align="center" colspan="3">Fecha de nacimiento</td>
            <td align="center" colspan="">Ultimo anio aprobado</td>

        </tr>';
$total = 30;
for ($i=0; $i < $total; $i++){
        $html.='
            <tr align="center">
                <td style="width:2%">1</td>
                <td>19768094</td>
                <td>parraz lopez</td>
                <td  colspan="2">jesus manuel</td>
                <td>M</td>
                <td colspan="3">12/05/1989</td>
                <td>9º</td>
            </tr>';
     }

    $html.=' </table>';

    $html.='

    <div style="height:10px"></div>
    
   
    

    <table border="0"  cellpadding="0" cellspacing="0" width="98%" id="tabla-footer" align="center">
        <tr valign="bottom">
            <td>Firma</td>
            <td><div class="subrayado-texto">sssdsdsd</div></td>
            <td>Firma</td>
            <td><div class="subrayado-texto">sssdsdsd</div></td>
            <td>Firma</td>
            <td><div class="subrayado-texto">sssdsdsd</div></td>
            
        </tr>
        <tr>
            <td>Nombre de facilitador</td>
            <td><div class="subrayado-texto">luis alberto</div></td>
            <td>Nombre del coord.de plantel o ruta</td>
            <td><div class="subrayado-texto">gerardo ruiz</div></td>
            <td>Nombre del administrador</td>
            <td>alfonzo parra</td>
        </tr>
        <tr>
            <td>Teléfono del facilitador</td>
            <td><div class="subrayado-texto">0412-3045324</div></td>
            <td>Teléfono del coordinador</td>
            <td><div class="subrayado-texto">0412-3785324</div></td>
            <td>Teléfono</td>
            <td><div class="subrayado-texto">0424-3785324</div></td>
        </tr>

        <tr>
            <td>Fecha de ingreso del vencedor</td>
            <td><div class="subrayado-texto">05/04/2014</div></td>
            <td>Fecha de recibido</td>
            <td><div class="subrayado-texto">09/04/2014</div></td>
            <td>Fecha de recibido</td>
            <td><div class="subrayado-texto">10/04/2014</div></td>
        </tr>
        <tr><td></td><td></td></tr>
        <tr>
            <td>Firma</td>
            <td><div class="subrayado-texto">09/04/2014</div></td>
        </tr>
        <tr>
            <td>Nombre del vocero(a)<br>del ambiente</td>
            <td><div class="subrayado-texto">elaine ruiz</div></td>
        </tr>
        <tr>
            <td>Cédula de vocero</td>
            <td><div class="subrayado-texto">13456087</div></td>
        </tr>
        
    </table>


    

   ';

   $html.='
</tr>       
</table>   
<br><table style="page-break-after:always;"></br></table><br>   
<table border="1" align="center" cellpadding="0" cellspacing="0" id="tabla1">  
   ';

$thml.='
        </div><!--fin del container-->
    </body>
</html>
';
 



$dompdf = new DOMPDF();
//$dompdf->set_paper('letter','landscape');
//$dompdf->set_paper('legal','landscape');
$html=utf8_decode($html);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("pdf".Date('Y-m-d').".pdf");
    
?>

