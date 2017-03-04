<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <title>Recuperar cuenta</title>
<link href="public/css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/login.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
  $(function(){

      $("#textfield").keypress(function(){

          if( $("#textfield").val().length > 2){

              $(".h4").hide();
          }
      });

      $('.forgotlink').on('click',function(){

        window.location='../'
      });

  });
</script>
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
  <?php
  if(isset($_GET['r'])):
    switch($_GET['r']):
      case 1:
            ?>
              <h4 class="h4">Debe agregar un número de Cédula</h4>
            <?php
      break;
       case 2:
            ?>
              <h4 class="h4">El nombre de usuario o contraseña no existen</h4>
            <?php
      break;
       case 3:
            ?>
              <h4 class="h4">Disculpe Usuario no encontrado en el sistema</h4>
            <?php
      break;
      case 4:
            ?>
              <h4 class="h4">debe iniciar sesión</h4>
            <?php
      break;
      case 5:
            ?>
              <h4 class="h4">Se ha cerrado sesión correctamente</h4>
            <?php
      break;

    endswitch;

  endif;
  ?>
      <h1>Buscar Usuario</h1>
      <div id="login">
               
        <form id="formBuscador" name="busqueda" method="POST" action="../control/ControlBuscarUser.php">
        <input type="hidden" name="tipo" value="select"/>
          <p>
            <label><strong>Cédula:</strong>
<input type="text" name="ci" class="inputText" id="ci" />
            </label>
          </p>
          
        <a class="black_button" href="javascript:void(0);"onclick="document.busqueda.submit();"onclick="return val_form_this_page();"><span>Buscar Usuario</span></a>
        
        
                       
        </form>
      <br clear="all" />
      </div>
        <div id="forgot">
        <br clear="all" />
        <a href="javascript:void(0)" class="forgotlink"><span>Volver</span></a></div>
  </div>
</div>
<br clear="all" />
</body>
</html>
