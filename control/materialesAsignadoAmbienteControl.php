<?php
//var_dump($_GET);
$file="../model/ModelReporte.php";
if(file_exists($file)):
	require_once($file);
	$ClassReporte=new Reporte();
	$reporteMaterialAmbiente=$ClassReporte->get_informeMaterialesAmbiente($_GET['id_ambiente']);
endif;

$file='../model/ModelPlantel.php';
if(file_exists($file)):
    require_once($file);
    $plantel=new Plantel();
    $nombreAmbiente = $plantel->get_ambiente_por_id($_GET['id_ambiente']);
endif;

$file="../libs/dompdf_config.inc.php";
if(file_exists($file)):
	require_once($file);

else:
	die("no existe el archivo");
exit;
	endif;

$fecha = date('d-m-Y');

?>


<?php

$fecha_tv = $reporteMaterialAmbiente[0]['fec_asignado_tv'];

if($fecha_tv):

    $html = '

<!DOCTYPE html>
<html lang="es">
<head>
<title>PLanilla de materiales asignados al ambiente</title>
<meta charset="utf-8"/>
<style type="text/css">
    @import url("style-menu.css");

* html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
 caption {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}
 @page { margin: 180px 50px; }

#container
{
    position:relative;
    width:700px;
    height:auto;
    margin:0 auto;
    margin-top:20px;
    margin-bottom:10px
}

   
#header 
{ 
    position: fixed; 
    left: 0px; 
    top: -180px; 
    right: 0px; 
    height: 10px;
}

#body
{
    position:relative;
    width:700px;
    height:auto;
    font: 12px verdana
}
#seccion
{
    position:relative;
    width:700px;
    height:auto;
    float:left;
    margin-top:5px;
    margin-bottom:5px
}
.articulo
{
    position:relative;
    width:240px;
    height:auto;
    margin:10px;
    float:left;
}
#footer
{
position:relative;
width:700px;
height:20px;
clear:both;
margin-top:10px;
}
.tabla
{
    border-collapse: collapse;

    
}
.tabla td
{
    height: 45px
}
caption
{
    width:600px;
    text-align:center;
    margin-left:30px;
    margin-bottom:20px
}
#firmas
{
    position: relative;
    width: 750px;
    height: 80px;
    clear: both;
}
.firmas-conformes
{
    width: 120px;
    height:15px;
    border-bottom:  dotted ; 
    margin:10px;
    margin-left:20px;
    float: left;
}
.conformes
{
    width: 120px;
    height:10px;
    margin:10px;
    margin-top: -5px;
    margin-left:20px;
    float: left;
}


</style>
</head>
<body>
    <div id="container"><!--contenedor  página-->

        <header id="header">
            <img id="encabezado_img" src="../vista/public/img/encabezado_gobierno.png" width="100%" height="50px" > 
        </header>

           
          
             <div style="float:right;margin-left:450px">Fecha de elaboración '.$fecha.'</div>

               
                    
                        <table class="tabla" border="1" align="center" width="685px">
                            <caption>Listado de Materiales asignados al ambiente '.$reporteMaterialAmbiente[0]['nombre_ambiente'].'</caption>
                            <tr align="center">
                                <td style="width:238px">Televisor</td>
                                <td style="width:210px">DVD</td>
                                <td style="width:210px">Folletos</td>
                            </tr>
                                
                                
                        </table>
                        <br>

                        <table class="tabla" border="1" align="center" width="600px">
                            
                            <tr align="center">
                                <td style="width:115px">Fecha de asignación</td>
                                <td style="width:123px">'.$reporteMaterialAmbiente[0]['fec_asignado_tv'].'</td>
                                <td style="width:100px">Fecha de asignación</td>
                                <td style="width:100px">'.$reporteMaterialAmbiente[0]['fec_asignado_dvd'].'</td>
                                <td style="width:104px">Fecha de asignación</td>
                                <td style="width:105px">'.$reporteMaterialAmbiente[0]['fec_asignado_folleto'].'</td>
                                
                            </tr>

                            <tr align="center">
                                <td style="width:115px">Marca</td>
                                <td style="width:123px">'.$reporteMaterialAmbiente[0]['marca_tv'].'</td>
                                <td style="width:100px">Marca</td>
                                <td style="width:104px">'.$reporteMaterialAmbiente[0]['marca_dvd'].'</td>
                                <td colspan="2" style="width:123px">Cantidad de folletos</td>
                                
                                
                                
                            </tr>

                             <tr align="center">
                                <td style="width:115px">Modelo</td>
                                <td style="width:123px">'.$reporteMaterialAmbiente[0]['modelo_tv'].'</td>
                                <td style="width:100px">Modelo</td>
                                <td style="width:104px">'.$reporteMaterialAmbiente[0]['modelo_dvd'].'</td>
                                <td colspan="2"  style="width:115px">'.$reporteMaterialAmbiente[0]['cantidad_folleto'].'</td>
                                
                                
                            </tr>

                             <tr align="center">
                                <td style="width:115px">Serial de fabrica</td>
                                <td style="width:123px">'.$reporteMaterialAmbiente[0]['serial_de_fabrica_tv'].'</td>
                                <td style="width:100px">Serial de fabrica</td>
                                <td style="width:104px">'.$reporteMaterialAmbiente[0]['serial_fabrica_dvd'].'</td>
                                <td colspan="2" style="width:115px">kit de video clase</td>
                               
                                
                            </tr>

                            <tr align="center">
                                <td style="width:115px">Serial de RIBAS</td>
                                <td style="width:123px">'.$reporteMaterialAmbiente[0]['serial_ribas_tv'].'</td>
                                <td style="width:100px">Serial de RIBAS</td>
                                <td style="width:104px">'.$reporteMaterialAmbiente[0]['serial_ribas_dvd'].'</td>
                                <td colspan="2" style="width:115px">'.$reporteMaterialAmbiente[0]['kit_video_clase'].'</td>

                            </tr>

                            </table>
                        
                        <br>
                        <table  class="tabla" border="0" align="center" width="600px">
                            <tr align="center">
                                <td>
                                    Firmas conformes
                                </td>
                            </tr>
                        </table>

                         <br>
                        <table  class="tabla" border="0" align="center" width="600px">
                            <tr align="center">
                                <td> <div class="firmas-conformes"></div></td>
                                <td> <div class="firmas-conformes"></div></td>
                                <td> <div class="firmas-conformes"></div></td>
                                <td> <div class="firmas-conformes"></div></td>
                            </tr>

                            <tr align="center">
                                <td><div class="conformes">Facilitador(a)</div></td>
                                <td><div class="conformes">vocero(a) de ambiente</div></td>
                                <td><div class="conformes">Coord.de plantel o ruta</div></td>
                                <td><div class="conformes">Coord.de logística</div></td>
                            </tr>

                        </table>

                   
               
            
            </div><!--fin de body-->


    </div><!--fin contenedor  página-->
    
</body>
</html>
';
else:

    $html = '

<!DOCTYPE html>
<html lang="es">
<head>
<title>PLanilla de materiales asignados al ambiente</title>
<meta charset="utf-8"/>
<style type="text/css">
    @import url("style-menu.css");

* html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
 caption {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}
 @page { margin: 180px 50px; }

#container
{
    position:relative;
    width:700px;
    height:auto;
    margin:0 auto;
    margin-top:20px;
    margin-bottom:10px
}

   
#header 
{ 
    position: fixed; 
    left: 0px; 
    top: -180px; 
    right: 0px; 
    height: 10px;
}

#body
{
    position:relative;
    width:700px;
    height:auto;
    font: 12px verdana
}
#seccion
{
    position:relative;
    width:700px;
    height:auto;
    float:left;
    margin-top:5px;
    margin-bottom:5px
}
.articulo
{
    position:relative;
    width:240px;
    height:auto;
    margin:10px;
    float:left;
}
#footer
{
position:relative;
width:700px;
height:20px;
clear:both;
margin-top:10px;
}
.tabla
{
    border-collapse: collapse;

    
}
.tabla td
{
    height: 45px
}
caption
{
    width:600px;
    text-align:center;
    margin-left:30px;
    margin-bottom:20px
}
#firmas
{
    position: relative;
    width: 750px;
    height: 80px;
    clear: both;
}
.firmas-conformes
{
    width: 120px;
    height:15px;
    border-bottom:  dotted ; 
    margin:10px;
    margin-left:20px;
    float: left;
}
.conformes
{
    width: 120px;
    height:10px;
    margin:10px;
    margin-top: -5px;
    margin-left:20px;
    float: left;
}


</style>
</head>
<body>
    <div id="container"><!--contenedor  página-->

        <header id="header">
            <img id="encabezado_img" src="../vista/public/img/encabezado_gobierno.png" width="100%" height="50px" > 
        </header>

           
          
             <div style="float:right;margin-left:450px">Fecha de elaboración '.$fecha.'</div>

               
                    
                        <table class="tabla" border="1" align="center" width="685px">
                            <caption>Listado de Materiales asignados al ambiente '.$nombreAmbiente[0]['nombre_ambiente'].'</caption>
                            <tr align="center">
                                <td style="width:238px">Televisor</td>
                                <td style="width:210px">DVD</td>
                                <td style="width:210px">Folletos</td>
                            </tr>
                                
                                
                        </table>
                        <br>

                       <table class="tabla" border="1" align="center" width="600px">
                            
                            <tr align="center">
                                <td style="width:115px">Fecha de asignación</td>
                                <td style="width:123px">no asignada</td>
                                <td style="width:100px">Fecha de asignación</td>
                                <td style="width:100px">no asignada</td>
                                <td style="width:104px">Fecha de asignación</td>
                                <td style="width:105px">no asignada</td>
                                
                            </tr>

                            <tr align="center">
                                <td style="width:115px">Marca</td>
                                <td style="width:123px">no asignado</td>
                                <td style="width:100px">Marca</td>
                                <td style="width:104px">no asignado</td>
                                <td colspan="2" style="width:123px">Cantidad de folletos</td>
                                
                                
                                
                            </tr>

                             <tr align="center">
                                <td style="width:115px">Modelo</td>
                                <td style="width:123px">no asignado</td>
                                <td style="width:100px">Modelo</td>
                                <td style="width:104px">no asignadao</td>
                                <td colspan="2"  style="width:115px">no asignado</td>
                                
                                
                            </tr>

                             <tr align="center">
                                <td style="width:115px">Serial de fabrica</td>
                                <td style="width:123px">no asignado</td>
                                <td style="width:100px">Serial de fabrica</td>
                                <td style="width:104px">no asignado</td>
                                <td colspan="2" style="width:115px">kit de video clase</td>
                               
                                
                            </tr>

                            <tr align="center">
                                <td style="width:115px">Serial de RIBAS</td>
                                <td style="width:123px">no asignado</td>
                                <td style="width:100px">Serial de RIBAS</td>
                                <td style="width:104px">no asignado</td>
                                <td colspan="2" style="width:115px">no asignado</td>

                            </tr>

                            </table>
                        <br>
                        <table  class="tabla" border="0" align="center" width="600px">
                            <tr align="center">
                                <td>
                                    Firmas conformes
                                </td>
                            </tr>
                        </table>

                         <br>
                        <table  class="tabla" border="0" align="center" width="600px">
                            <tr align="center">
                                <td> <div class="firmas-conformes"></div></td>
                                <td> <div class="firmas-conformes"></div></td>
                                <td> <div class="firmas-conformes"></div></td>
                                <td> <div class="firmas-conformes"></div></td>
                            </tr>

                            <tr align="center">
                                <td><div class="conformes">Facilitador(a)</div></td>
                                <td><div class="conformes">vocero(a) de ambiente</div></td>
                                <td><div class="conformes">Coord.de plantel o ruta</div></td>
                                <td><div class="conformes">Coord.de logística</div></td>
                            </tr>

                        </table>

                   
               
            
            </div><!--fin de body-->


    </div><!--fin contenedor  página-->
    
</body>
</html>
';

endif;

 $dompdf = new DOMPDF();
//$dompdf->set_paper('letter','landscape');
//$dompdf->set_paper('legal','landscape');
$html=utf8_decode($html);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("pdf".Date('Y-m-d').".pdf");
    
?>