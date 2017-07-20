
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Empresa</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/signin.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/bootstrap/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <div class="container">

        <form class="form-signin" method="POST" action="<?php echo base_url(); ?>login/validar" id="login-form">
          <h2 class="form-signin-heading">Login - Empresa</h2>
          <label for="user" class="sr-only">Nombre de usuario</label>
          <input type="text" id="user" class="form-control" placeholder="Ingresa Usuario" required autofocus name="usuario">
          <br>
          <label for="inputContrasena" class="sr-only">Contraseña</label>
          <input type="password" id="inputContrasena" class="form-control" placeholder="Contrasena" required name="contrasena">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Recuerdame
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
        </form>

      </div> <!-- /container -->

      <script src="<?php echo base_url();?>assets/bootstrap/js/jquery-1.11.3.min.js"></script>

      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="<?php echo base_url(); ?>assets/bootstrap/js/ie10-viewport-bug-workaround.js"></script>
      <script>
      var baseurl = "<?php echo base_url(); ?>";
      </script>
      <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
    </body>
    </html>
