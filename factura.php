<?php
// Inicio de sesión
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: controllers/controll_logout.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <style>
        .producto-card {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .producto-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Inicio</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a href="controllers/controll_logout.php" class="btn btn-danger">Cerrar sesión</a>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h1 class="text-center">Punto de Venta</h1>
                    <div class="row">
                        <!-- Productos -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <input type="text" class="form-control" placeholder="Buscar producto...">
                                </div>
                                <div class="card-body d-flex flex-wrap justify-content-start" id="productos-container">
                                    <!-- Productos simulados -->
                                    <div class="card producto-card m-2" style="width: 150px;">
                                        <img src="img/pan.jpg" class="card-img-top" alt="Pan">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Pan</h5>
                                            <p class="card-text">$1.00</p>
                                        </div>
                                    </div>
                                    <div class="card producto-card m-2" style="width: 150px;">
                                        <img src="img/pastel.jpg" class="card-img-top" alt="Pastel">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Pastel</h5>
                                            <p class="card-text">$2.50</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carrito -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">Resumen de Compra</div>
                                <div class="card-body" id="carrito-container">
                                    <!-- Carrito vacío -->
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success btn-block">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Scripts -->
    <script src="template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <script src="template/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>