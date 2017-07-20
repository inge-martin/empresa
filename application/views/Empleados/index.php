<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Proyecto Empresa</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		body {
			padding-top: 60px;

		}
		.contenido{
			padding: 10px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url(); ?>">Empresa</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url(); ?>empleados">Empleados</a></li>
					<li><a href="<?php echo base_url(); ?>">Usuarios</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Bienvenido: <?php echo $this->session->userdata('usuario'); ?>
							<i class="fa fa-user fa-fw"></i><b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a></li>
							<li><a href="javascript:void(0)" id="cerrar"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<section class="contenido">
			<div class="row">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Registrar Empleado</a></li>
					<li><a id="tab-consultar" href="#tab2" data-toggle="tab">Consultar</a></li>
				</ul>
				<div class="tab-content">

					<div class="tab-pane active" id="tab1">
						<div class="row">

							<div class="col-lg-12 text-center">
								<h3>Nuevo Empleado</h3>
							</div>
							<div class="col-lg-4 col-md-offset-4 alert alert-danger" id="msg-error" style="text-align: left;">
								<strong>¡Importante!Corregir los siguientes errores.</strong>
								<div class="list-errores"></div>
							</div>
						</div>
						<form id="form-create-empleado" class="form-horizontal" role="form" action="<?php base_url();?>empleados/guardar" method="POST">
							<div class="col-lg-4 col-md-offset-1">
								<!-- <h3>Datos Personales</h3> -->
								<div class="form-group">
									<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su Nombre" maxlength="15" autofocus="true" />
								</div>
								<div class="form-group">
									<input type="text" name="paterno" id="paterno" class="form-control" placeholder="Ingrese su Apellido Paterno  "/>
								</div>
								<div class="form-group">
									<input type="text" name="materno" id="materno" class="form-control" placeholder="Ingrese su Apellido Materno  "/>
								</div>		            			
								<div class="form-group">
									<input type="date" name="nacimiento" class="form-control"/>
								</div>
								<div class="form-group">
									<select name="sexo" class="form-control">
										<option value="">Seleccione Sexo:</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
								</div>
								<div class="form-group">
									<input type="file" name="fotografia" class="form-control" required="true" />
								</div>
							</div>
							<div class="col-lg-4 col-md-offset-2">
								<!-- <h3>Datos de Acceso</h3> -->
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Ingrese su Email"/>
								</div>
								<div class="form-group">
									<input type="number" name="telefono" class="form-control" placeholder="Ingrese su Telefono Local"/>
								</div>
								<div class="form-group">
									<input type="number" name="celular" class="form-control" placeholder="Ingrese su Telefono Celular"/>
								</div>								
								<div class="form-group">
									<input type="text" name="usuario" class="form-control" placeholder="Ingrese su Usuario"/>
								</div>
								<div class="form-group">
									<input type="password" name="contrasena" class="form-control" placeholder="Ingrese su contraseña"/>
								</div>
								<div class="form-group">
									<input type="password" name="confirmar" class="form-control" placeholder="Confirme su contraseña"/>
								</div>																			
							</div>
							<div class="col-lg-4 col-md-offset-4 text-center">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" value="Registrar">Registrar</button>
								</div>
							</div>					
						</form>
					</div>

					<div class="tab-pane fade" id="tab2">

						<div class="row">
							<br>
							<div class="col-lg-7"></div>
							<div class="col-lg-3">
								<input type="text" class="form-control" id="buscar" placeholder="Buscar por nombre">
							</div>
							<div class="col-lg-2">
								<input type="button" class="btn btn-primary btn-block" id="btnbuscar" value="Mostrar Todo" data-toggle='modal' data-target='#basicModal'>
							</div>
						</div>
						<hr>
						<div class="row">
							<div id="listaEmpleados" class="col-lg-12">

							</div>

							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">Editar Empleado</div>
									<div class="panel-body">
										<form id="form-actualizar" class="form-horizontal" action="<?php echo base_url();?>empleados/actualizar" method="post" role="form" style="padding:0 10px;">
											<div class="form-group">
												<input type="hidden" id="idEdit" name="idEdit">
												<label>Nombre:</label>
												<input type="text" name="nombreEdit" id="nombreEdit" class="form-control">
											</div>
											<div class="form-group">
												<label>Apellido Paterno:</label>
												<input type="text" name="paternoEdit" id="paternoEdit" class="form-control">
											</div>
											<div class="form-group">
												<label>Apellido Materno:</label>
												<input type="text" name="maternoEdit" id="maternoEdit" class="form-control">
											</div>
											<div class="form-group">
												<label>F. Nacimiento:</label>
												<input type="date" name="nacimientoEdit" id="nacimientoEdit" class="form-control">
											</div>
											<div class="form-group">
												<label>Telefono Local:</label>
												<input type="number" name="telefonoEdit" id="telefonoEdit" class="form-control">
											</div>
											<div class="form-group">
												<label>Telefono Celular:</label>
												<input type="number" name="celularEdit" id="celularEdit" class="form-control">
											</div>											
											<div class="form-group">
												<label>Email:</label>
												<input type="email" name="emailEdit" id="emailEdit" class="form-control">
											</div>
											<div class="form-group">
												<label>Fotografia:</label>
												<input type="file" name="foto_nueva" class="form-control">
											</div>											
											<div class="form-group">
												<button type="button" id="btnActualizar" class="btn btn-success btn-block">Guardar</button>

											</div>
										</form>

									</div>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</section>
	</div>

	<script src="<?php echo base_url();?>assets/bootstrap/js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script>
		var baseurl = "<?php echo base_url(); ?>";
	</script>
	<script src="<?php echo base_url();?>assets/js/Empleados/empleado.js"></script>

</body>
</html>
</body>
</html>