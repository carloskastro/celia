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
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
</head>

<body class="py-5 bg-dark">
	<?php

	require_once 'conn.php';
	session_start();

	if (isset($_POST['validar'])) {
		$result = $conn->prepare('SELECT * FROM administrador WHERE user=?');
		$result->bindParam(1, $_POST['user']);
		$result->execute();

		$data = $result->fetch(PDO::FETCH_ASSOC);
		//Verficamos si hay datos
		if (is_array($data)) {
			//Verficamos si la contraseña es correcta
			if (password_verify($_POST['pass'], $data['pass'])) {
				$_SESSION['admin'] = $data['idadministrador'];
				header('location: home.php');
			} else {
				echo "Contraseña incorrecta";
			}
		} else {
			echo "Datos incorrectos";
		}
	}

	?>
	<main class="py-2 form-signin w-100 m-auto">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col"></div>
					<div class="col text-center">
						<img class="mb-2" src="../media/img/logo.png" alt="Logo Sena" style="height: 48px">
					</div>
					<div class="col text-end">
						<a href="../"><kbd class="bg-danger"><i class="bi bi-x-lg"></i></kbd></a>
					</div>
				</div>
				<div class="text-center">
					<h1 class="display-6 mb-0">Inicio de Sesión</h1>
					<div class="subheading-1 mb-2">ASEM</div>
				</div>
			</div>
			<div class="card-body">
				<form action="" method="post" enctype="application/x-www-form-urlencoded">
					<div class="mb-3 mt-3">
						<label for="user" class="form-label">Usuario:</label>
						<label for="user" class="form-label float-end">No tienes usuario?: <a href="reg_adm.php" class="btn btn-sm btn-warning">Registrarse</a></label>
						<input type="text" class="form-control" placeholder="Ingrese su usuario" name="user" required>
					</div>
					<div class="mb-3">
						<label for="pwd" class="form-label">Contraseña:</label>
						<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="pass" required>
					</div>
					<div class="form-check mb-3">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="remember" required> Recuerdame
						</label>
					</div>
					<div class="btn-group float-end mx-auto w-100">
						<button type="submit" class="btn btn-success" name="validar">Ingresar</button>
						<a href="reg_adm.php" class="btn btn-primary">Registrarse</a>
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