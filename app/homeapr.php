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

    <!--Datatables Styles-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/css/dataTables.bootstrap5.min.css">

    <!--Datatables Buttons-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/css/buttons.bootstrap5.css">

     <!--Responsive datatables-->
      <script type="text/javascript" src="../assets/datatables/js/dataTables.responsive.min.js"></script>

    <!--Datatables Scripts-->
    <script type="text/javascript" src="../assets/datatables/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/dataTables.bootstrap5.min.js"></script>

    <!--Botones para exportar-->
    <script type="text/javascript" src="../assets/datatables/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/jszip.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/buttons.html5.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/buttons.print.js"></script>


    <script type="text/javascript">
    $(document).ready(function () {
        $('#tableresponsive').DataTable({
            dom: 'Bflrtip',
            responsive: true,
            language: {
                url: '../assets/datatables/es-ES.json'
            },
        });
    });
    </script>
</head>

<body>
    <?php
    require_once 'conn.php';
	session_start();

	if (isset($_SESSION['aprendiz'])) {
		$search=$conn->prepare('SELECT * FROM aprendiz WHERE tipouser=?');
		$search->bindParam(1,$_SESSION['aprendiz']);
		$search->execute();
		
		$data=$search->fetch(PDO::FETCH_ASSOC);

        $user=null;

        if (is_array($data)) {
            $user=$data;
        }
    }

    if (!empty($user)) {
        
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
                            <a class="nav-link" href="#">Sección1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sección2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section3">Sección3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sección4</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="logout.php" class="btn btn-primary"><i class="bi bi-person-fill"></i> Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container p-5 mx-auto mt-5 table-responsive">
        <table class="table table-striped table-bordered table-hover" id="tableresponsive" style="width: 100%;">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12345</td>
                    <td>Carlos Andres</td>
                    <td>Castro Jaramillo</td>
                    <td>Calle 54 # 85 - 40 </td>
                </tr>
            </tbody>
        </table>
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