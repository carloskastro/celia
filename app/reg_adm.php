<!DOCTYPE html>
<html lang="es-CO">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Proyecto</title>
	<meta name="theme-color" content="#ff2e01">
	<meta name="MobileOptimized" content="width">
	<meta name="HandhledFriendly" content="true">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar" content="black-traslucent"> 

	<!--Tags SEO-->
	<meta name="author" content="Miproyecto">
	<meta name="description" content="Aplicativo para enseñanza de Bootstrap">
	<meta name="keyworks" content="SENA, sena, Sena, Web App, web app, WEB APP">

	<!--Favicon-->
	<link rel="icon" type="image/x-icon" href="../media/img/logo.png">
	<link rel="apple-touch-icon" type="image/png" href="../media/img/logo.png">
	<link rel="apple-touch-startup-image" type="image/png" href="../media/img/logo.png">

	<!--Styles Bootstrap 5.3.1 Alpha-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>
	<?php
	require_once 'conn.php';

	if (isset($_POST['guardar'])) {
		$insert=$conn->prepare('INSERT INTO administrador (nombre,apellido,cedula,user,pass) VALUES (?,?,?,?,?)');
		$insert->bindParam(1,$_POST['nombre']);
		$insert->bindParam(2,$_POST['apellido']);
		$insert->bindParam(3,$_POST['cedula']);
		$insert->bindParam(4,$_POST['user']);
		$insert->bindParam(5,$_POST['pass']);

		if ($insert->execute()) {
			echo 'Datos registrados';
		}else{
			echo "Datos no registrados";
		}
	}
	?>
	<main class="form-reg w-100 m-auto">
		<?php

		if ($msg1!='') {
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>'.$msg1.'!</strong>
			</div>';
		}elseif ($msg2!='') {
			echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>'.$msg2.'!</strong>
			</div>';
		}
		?>
		<div class="card">
			<div class="card-header">
				<img class="mb-2" src="../media/img/logo.png" alt="Logo Sena" style="height: 48px">
				<span class="float-end">
					<a href="../"><kbd class="bg-danger"><i class="bi bi-x-lg"></i></kbd></a>
				</span>
				<div class="text-center">
					<h1 class="display-6 mb-0">Registro de Usuario</h1>
					<div class="subheading-1 mb-2">ASEM</div>
				</div>
			</div>
			<div class="card-body">
				<form action="" method="post" enctype="application/x-www-form-urlencoded">
					<div class="row">
						<div class="col">
							<div class="mb-3 mt-3">
								<label for="user" class="form-label">Nombres:</label>
								<input type="text" class="form-control" id="user" placeholder="Ingrese sus nombres" name="nombre">
							</div>
						</div>
						<div class="col">
							<div class="mb-3 mt-3">
								<label for="apellidos" class="form-label">Apellidos:</label>
								<input type="text" class="form-control"  placeholder="Ingrese sus apellidos" name="apellido">
							</div>
						</div>
					</div>
					<div class="col">
						<div class="mb-3 mt-3">
							<label for="cedula" class="form-label">Cédula:</label>
							<input type="text" class="form-control"placeholder="Ingrese su número de documento" name="cedula" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
							</div>
						</div>

						<div class="mb-3 mt-3">
							<label for="user" class="form-label">Usuario:</label>
							<input type="text" class="form-control" placeholder="Ingrese su usuario" name="user">
						</div>
						<div class="mb-3">
							<label for="pwd" class="form-label">Contraseña:</label>
							<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="pass">
						</div>
						<div class="form-check mb-3">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="remember"> Recuerdame
							</label>
						</div>
						<div class="btn-group mx-auto">
							<button type="submit" class="btn btn-success" name="guardar">Guardar</button>
							<a href="./" class="btn btn-primary">Ingresar</a>
						</div>				
					</form>
				</div>
				<div class="card-footer text-center">
					© 2023 Copyright
				</div>
			</div>
		</main>
	</body>
	</html>