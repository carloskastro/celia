<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homeadm</title>
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
	session_start();

	if (isset($_SESSION['admin'])) {
		$search=$conn->prepare('SELECT * FROM administrador WHERE tipouser=?');
		$search->bindParam(1,$_SESSION['admin']);
		$search->execute();
		$data=$search->fetch(PDO::FETCH_ASSOC);

    }

    if (is_array($data)) {
       
        
    ?>
    <header class="mb-auto fixed-top">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../media/img/logo.png" alt="Logo WebApp" style="width:40px;" class="rounded-pill">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar" aria-label="button navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Homeadm.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=tabla">Tabla</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section3">Sección3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sección4</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="logout.php" class="btn btn-primary"><i class="bi bi-person-fill"></i><?php echo $data['nombre']." ".$data['apellido']; ?> Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container p-5 mx-auto mt-5 table-responsive">

        <?php
        //Controlador del navbar
        $page=isset($_GET['page']) ? strtolower($_GET['page']) : 'homeadm';
        require_once './'.$page.'.php';

        if ($page=='homeadm') {
            require_once 'inicio.php';
        }

        ?>


    </main>
    <footer>
        
    </footer>

    <?php
        }else{
            header('location: ./');
        }
    ?>
</body>
</html>