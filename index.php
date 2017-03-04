<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" type="image/png" href="http://localhost/Ribas/vista/public/img/ribas.png" />
  <!--<link rel="shortcut icon" href="/favicon.ico">-->
  <!--<link rel="icon" type="image/png" href="vista/public/img/mifavicon.png" />-->
  <title>inicio seccion</title>
<link href="vista/public/css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="vista/public/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="vista/public/css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="vista/public/css/login.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="vista/public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
  $(function(){

      $("#textfield").keypress(function(){

          if( $("#textfield").val().length > 2){

              $(".h4").hide();
          }
      });
      $('.forgotlink').on('click',function(){

      	window.location='vista/recuperCuenta.php'
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
              <h4 class="h4">Debe agregar un nombre de usuario y contraseña</h4>
            <?php
      break;
       case 2:
            ?>
              <h4 class="h4">El nombre de usuario o contraseña no existen</h4>
            <?php
      break;
       case 3:
            ?>
              <h4 class="h4">Disculpe Usuario no se encuentra activo en el sistema</h4>
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
       case 6:
            ?>
              <h4 class="h4">Los datos han sido actualizados</h4>
            <?php
      break;

    endswitch;

  endif;
  ?>
      <h1>Iniciar Sesión</h1>
      <div id="login">
               
        <form id="form1" name="login" method="POST" action="control/LoginUserControl.php">
        <input type="hidden" name="estado" value="activo"/>
          <p>
            <label><strong>Login:</strong>
<input type="text" name="login" class="inputText" id="textfield" />
            </label>
          </p>
          <p>
            <label><strong>Contraseña:</strong>
  <input type="password" name="pass" class="inputText" id="textfield2" />
            </label>
          </p>
        <a class="black_button" href="javascript:void(0);"onclick="document.login.submit();"onclick="return val_form_this_page();"><span>Autentificación</span></a>
        
        
                       
        </form>
      <br clear="all" />
      </div>
        <div id="forgot">
        <br clear="all" />
        <a href="javascript:void(0)" class="forgotlink"><span>¿Ha olvidado su nombre de usuario o contraseña?</span></a></div>
  </div>
</div>
<br clear="all" />
</body>
</html>
