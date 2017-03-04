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
        font:12px verdana,sans-serif;
    }
    #table1{
        font:13px verdana,sans-serif;
        width:100%;
        /*border-collapse:collapse;*/
    }
    #table1 td
    {
        padding:0px;
        margin:5px;
    }
    #tabla-footer td
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
        width:85%;
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
    <div align="center" valign="top"><p><img id="encabezado_img" src="../vista/public/img/encabezado_gobierno.png" width="85%"  height="50"></div>
    <div class="container">
    <div style="width:100%;border-right:1px solid">
    <!--<table border="1" align="center" cellpadding="0" cellspacing="0" style="page-break-before: always;">-->
    <table border="1" align="center" cellpadding="0" cellspacing="0" id="tabla1">
    
        <tr>
            <td colspan="2" class="datos-left"><strong>Tipo de ingreso</strong></td>
            <td>Incorporación</td>
            <td>SI</td>
            <td>Reincorporación</td>
            <td colspan="2">NO</td>
            <td colspan="3"></td>
            
        </tr>

        <tr >
            <td class="titulo" colspan="8" >Datos del ambiente</td>
        </tr>
        <tr>
            <td colspan="1" class="datos-left">Estado</td>
            <td colspan="2">Yaracuy</td>
            <td class="datos-left">Municipio</td>
            <td colspan="2">san felipe</td>
            <td class="datos-left">Parroquia</td>
            <td>San felipe</td>
        </tr>
        <tr>
            <td class="datos-left">Nombre del Plantel o sede</td>
            <td colspan="2">UNIDAD EDUCATIVA LA MOSCA</td>
            <td colspan="2" class="datos-left">Dirección del Plantel</td>
            <td colspan="3">CALLE LA MOSCA CON CALLEJON COUNTRY CLUB</td>

        </tr>
        <tr>
            <td class="datos-left">Código de plantel</td>
            <td>OD04022211</td>
            <td class="datos-left">Plan de estudio</td>
            <td>31050</td>
            <td class="datos-left">Cédula del coordinador(a)</td>
            <td>19605978</td>
            <td class="datos-left">Nombre y apellido coordinador(a)</td>
            <td>juan perez alfonzo</td>
            
        </tr>
        <tr>
            <td class="datos-left">Cédula del facilitador(a)</td>
            <td>13796085</td>
            <td class="datos-left">Nombre apellido facilitador(a)</td>
            <td colspan="2">luis medina parra</td>
            <td colspan="2" class="datos-left">Cohorte del ambiente</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2" class="datos-left">Teléfono del coordinador(a) o ruta</td>
            <td>0412-5446834</td>
            <td colspan="2" class="datos-left">Teléfono del facilitador(a)</td>
            <td colspan="3">04245447895</td>
            
        </tr>
        <tr >
            <td class="titulo" colspan="8" >Datos del Vencedor(a) que ingresa al ambiente</td>
        </tr>
        <tr>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Cédula</td>
            <td colspan="2">Fecha de nacimiento</td>
            <td colspan="2">Lugar de nacimiento</td>
            <td colspan="2">Entidad Federal</td>

        </tr>
        <tr>
            <td>franklin jose</td>
            <td>parraz niñez</td>
            <td>19768094</td>
            <td colspan="2">12/04/1990</td>
            <td colspan="2">San Felipe</td>
            <td>Yaracuy</td>
        </tr>
        <tr>
            <td colspan="2">Teléfono del vencedor(a)</td>
            <td colspan="2">04124556876</td>
            <td colspan="3">Teléfono de referencia</td>
            <td >02542324586</td>
        </tr>
        <tr >
            <td class="titulo" colspan="8" >Datos de procedencia del Vencedor(a) para la reincorporación</td>
        </tr>
        <tr>
            <td class="datos-left">Estado</td>
            <td>San felipe</td>
            <td class="datos-left">Municipio</td>
            <td colspan="2">San Felipe</td>
            <td colspan="2" class="datos-left">Parroquia</td>
            <td>San Felipe</td>
        </tr>
        <tr>
            <td colspan="2">Nombre del plantel</td>
            <td colspan="7">UNIDAD EDUCATIVA LA MOSCA</td>
        </tr>
        <tr>
            <td>Código del plantel</td>
            <td>OD04022211</td>
            <td>Dirección del plantel</td>
            <td colspan="5">CALLE LA MOSCA CON CALLEJON COUNTRY CLUB</td>
        </tr>
        <tr>
            <td>Cohorte original</td>
            <td>cohorte-17</td>
            <td>Semestre</td>
            <td>semestre-1</td>
            <td colspan="3">Fecha de desincorporación</td>
            <td>10/06/2013</td>
        </tr>
        <tr >
            <td class="titulo" colspan="8" >Documentos consignados</td>
        </tr>
        <tr>
            <td>Partida de nacimiento</td>
            <td>SI</td>
            <td>notas certificadas de 9no.grado</td>
            <td>SI</td>
            <td>Fotoscopia de la cédula de identidad</td>
            <td>SI</td>
            <td>Foto</td>
            <td>SI</td>
        </tr>
        
    </table>
    </div>

    <div style="height:10px"></div>
    <div class="obsevaciones">
        <span>Observaciones:</span>
        <p>Los eventos son una característica de los documentos HTML (presente en otros lenguajes de programación también)que permite a los autores agregar interactividad entre el sitio web y el visitante, al ejecutar programas del lado cliente 
            cuando el visitante (u otro programa) realiza una acción. Por ejemplo
         </p>

   </div>
    <div style="height:10px"></div>
    
   <div style="width:95%;height:110px;margin:0 auto;">
    

    <table border="0"  cellpadding="0" cellspacing="0" width="90%" id="tabla-footer">
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


    

   </div>


        </div>
    </body>
</html>
 ';
 



$dompdf = new DOMPDF();
$dompdf->set_paper('letter','landscape');
//$dompdf->set_paper('legal','landscape');
$html=utf8_decode($html);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("pdf".Date('Y-m-d').".pdf");
    
?>
