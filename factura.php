<?php
// inicio de sesion
session_start();
if (isset($_SESSION['user_id'])) {
    echo 'bienvenido, ' . $_SESSION['username'];
} else {
    // echo 'no hay sesion iniciada';
    header("Location:controllers/controll_logout.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/ plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>

<body>
    <!--navbar  -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li> -->

            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <a href="controllers/controll_logout.php" class="btn btn-danger">cerrar sesiòn</a>
            <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header"></span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>
                        <span class="float-right text-muted text-sm"></span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- finish nav -->

    <h1>ESTA ES LA VENTANA PARA FACTURAR EN LA PANADERIA </h1>
    <h2>Y SE INGRESA DIRECTAMENTE CON EL ROL DE OPERADOR </h2>


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="template/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="template/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>