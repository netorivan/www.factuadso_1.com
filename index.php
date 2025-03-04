<!-- esta es la que estoy haciendo por mi cuenta con plantillas de adminlte
 base de datos conectada a esta es factuadso3 -->


<?php
// inicio de sesion
session_start();
if (isset($_SESSION['user_id'])) {
    echo 'bienvenido, ' . $_SESSION['username'];
} else {
    // echo 'no hay sesion iniciada';
    header("Location:controllers/controll_logout.php");
}
// use PSpell\Config;

@include('controllers/conex_bd.php');
// consulta y se guarda en la variable consulta

$usuarios = [];
$query = "SELECT u.*, r.nombre_rol AS rol, r.fecha_creacion AS fyh_create, r.fecha_actualizacion AS fyh_update 
          FROM usuarios u
          LEFT JOIN roles r ON u.id_roles = r.id_roles"; // Asegúrate de que 'id_rol' sea la columna 



try {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Obtener todos los resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener usuarios: " . $e->getMessage();
}



?>



<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mundo del Pandebono | Mejorado</title>
    <!--  estilos de Font Awesome alojada en el CDN de Cloudflare. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/ plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- libreria de alertas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="public/jv/funtions.js"></script>
    <!-- boostratp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- estilos mios -->
    <link rel="stylesheet" href="public/css/styles_mios.css">
    <style>
        /* Estilo general para la tabla */
        .table {
            width: 100%;
            /* Asegura que la tabla ocupe toda la pantalla */
            border-collapse: collapse;
            /* Quita los espacios entre celdas */
            overflow: hidden;
            /* Evita el desbordamiento */
        }

        /* Estilo para las celdas de la tabla */
        .table th,
        .table td {
            padding: 10px;
            /* Espaciado interno */
            text-align: left;
            /* Alineación del texto */
            border: 1px solid #ddd;
            /* Borde suave */
        }

        /* Estilo para el encabezado */
        .table thead th {
            background-color: #f2f2f2;
            /* Color de fondo del encabezado */
            font-weight: bold;
            /* Negrita */
        }

        /* Estilo para las filas al pasar el mouse */
        .table tbody tr:hover {
            background-color: #f5f5f5;
            /* Color de fondo al pasar el mouse */
        }

        /* Estilo para botones */
        button {
            background-color: #007bff;
            /* Color de fondo del botón */
            color: white;
            /* Color del texto del botón */
            border: none;
            /* Sin borde */
            padding: 5px 10px;
            /* Espaciado interno */
            cursor: pointer;
            /* Cursor de mano */
            border-radius: 4px;
            /* Bordes redondeados */
        }

        input,
        select {
            width: 100%;
            box-sizing: border-box;
            /* Asegura que el padding y el border se incluyan en el ancho total */
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <!-- wrapper envuelve todo el contenido para alinearlo mejor, sin embargo es una funcion para boosttrap -->
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="factura.php" class="nav-link">Factura</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <!-- cerrar sesion -->
                    <a href="controllers/controll_logout.php" class="btn btn-danger">cerrar sesiòn</a>

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
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container// esta seccion es le menu desplegable que se ve en la parte izquierda de la pantalla -->
        <!-- el aside es una funcion de html que crea un cuadro desplegable -->
        <!-- el main siderbar es una funcion que indica que este menu desplegable es el principal-->
        <!-- el sidebar-dark-primary es el color que se le da vamos a probar otro  -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- <aside class="main-sidebar sidebar-blue-primary elevation-4"> hubo una confucion y no uspe bien como es la funciion -->
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="template/AdminLTE-3.2.0/dist/img/logo_freepick.jpg" alt="pandebono_logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">(¡bienvendo!)</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">admin</a>
                    </div>
                </div> -->

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <form action="buscar.php" method="GET" class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" name="query" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar" type="submit">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Gestion contable
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="#" onclick="showContent('ventas')" class="nav-link ">
                                        <!-- <i class="far fa-circle nav-icon"> </i> -->
                                        <p>Gestion de Ventas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="showContent('productos')" class="nav-link ">
                                        <!-- <i class="far fa-circle nav-icon">Gestion de Productos </i> -->
                                        <p>Gestion de Productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="showContent('proveedores')" class="nav-link ">
                                        <!-- <i class="far fa-circle nav-icon">Gestion de proveedores </i> -->
                                        <p>Gestion de proveedores </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="showContent('clientes')" class="nav-link ">
                                        <!-- <i class="far fa-circle nav-icon"> </i> -->
                                        <p>Gestion de clientes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" onclick="showContent('reportes')" class="nav-link">
                                <!-- <i class="nav-icon fas fa-th"></i> -->
                                <p>
                                    Reportes y Analisis
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="showContent('confi_usu')" class="nav-link">
                                <!-- icono de cuadritos -->
                                <!-- <i class="nav-icon fas fa-th"></i> -->
                                <p>
                                    Configuracion de Usuarios
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar menu desplegable fin -->
        </aside>
        <!-- ---------------------------------------------------------------------------------- -->
        <!-- Content Wrapper. Contains page content //envoltorio del contenido osea envuelve todo el contenido de la pagina-->
        <div class="content-wrapper">
            <!-- seccion de ventas -->
            <div id="ventas" class="gestion-section" style="display: none;">
                <!-- Content Header (Page header) //encabezado de lla pagina-->
                <div class="content-header">

                    <!-- clase de boostrap contenedor fluido que ocupa todo el ancho de la pantalla
                 y hace que se puedan organizar en filas y columnas  -->

                    <div class="container-fluid">
                        <!-- crea una fila inferior a mb 2 -->
                        <div class="row mb-2">
                            <!-- aqui esta indicando que ocupa 6 de las 12 columnas que tiene la pantalla
                         lo que basicamente hace que se divida en dos a un lado el titulo que esta al lado izquierdo
                         de la pantalla y el otro lado esta el enlace de actualizacion  -->
                            <div class="col-sm-6">
                                <h1 class="m-0"> Gestion de Ventas</h1>
                            </div><!-- /.col -->
                            <!-- este es el otro lado de la divicion anterior de columnas la parte derecha -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>


                                    <li class="breadcrumb-item active">bueno</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content-header -->

                <!-- /.content-header--- -->
            </div>
            <!-- id="ventas"  fin de seccion------------------------------>
            <!-- seccion de productos -->
            <div id="productos" class="gestion-section" style="display: none;">
                <!-- Content Header (Page header) //encabezado de lla pagina-->
                <div class="content-header">

                    <!-- clase de boostrap contenedor fluido que ocupa todo el ancho de la pantalla
                 y hace que se puedan organizar en filas y columnas  -->

                    <div class="container-fluid">
                        <!-- crea una fila inferior a mb 2 -->
                        <div class="row mb-2">
                            <!-- aqui esta indicando que ocupa 6 de las 12 columnas que tiene la pantalla
                         lo que basicamente hace que se divida en dos a un lado el titulo que esta al lado izquierdo
                         de la pantalla y el otro lado esta el enlace de actualizacion  -->
                            <div class="col-sm-6">
                                <h1 class="m-0"> Gestion de productos</h1>
                            </div><!-- /.col -->
                            <!-- este es el otro lado de la divicion anterior de columnas la parte derecha -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>


                                    <li class="breadcrumb-item active">y ahora que?</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content-header -->

                <!-- /.content-header--- -->
            </div>
            <!-- id="productos"  fin de seccion------------------------------>
            <!-- seccion de proveedores -->
            <div id="proveedores" class="gestion-section" style="display: none;">
                <!-- Content Header (Page header) //encabezado de lla pagina-->
                <div class="content-header">

                    <!-- clase de boostrap contenedor fluido que ocupa todo el ancho de la pantalla
                 y hace que se puedan organizar en filas y columnas  -->

                    <div class="container-fluid">
                        <!-- crea una fila inferior a mb 2 -->
                        <div class="row mb-2">
                            <!-- aqui esta indicando que ocupa 6 de las 12 columnas que tiene la pantalla
                         lo que basicamente hace que se divida en dos a un lado el titulo que esta al lado izquierdo
                         de la pantalla y el otro lado esta el enlace de actualizacion  -->
                            <div class="col-sm-6">
                                <h1 class="m-0"> Gestion de proveedores</h1>
                            </div><!-- /.col -->
                            <!-- este es el otro lado de la divicion anterior de columnas la parte derecha -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>


                                    <li class="breadcrumb-item active">y ahora que *2?</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content-header -->

                <!-- /.content-header--- -->
            </div>
            <!-- id="proveedores"  fin de seccion------------------------------>
            <!-- seccion de proveedores -->
            <div id="clientes" class="gestion-section" style="display: none;">
                <!-- Content Header (Page header) //encabezado de lla pagina-->
                <div class="content-header">

                    <!-- clase de boostrap contenedor fluido que ocupa todo el ancho de la pantalla
                 y hace que se puedan organizar en filas y columnas  -->

                    <div class="container-fluid">
                        <!-- crea una fila inferior a mb 2 -->
                        <div class="row mb-2">
                            <!-- aqui esta indicando que ocupa 6 de las 12 columnas que tiene la pantalla
                         lo que basicamente hace que se divida en dos a un lado el titulo que esta al lado izquierdo
                         de la pantalla y el otro lado esta el enlace de actualizacion  -->
                            <div class="col-sm-6">
                                <h1 class="m-0"> Gestion de clientes</h1>
                            </div><!-- /.col -->
                            <!-- este es el otro lado de la divicion anterior de columnas la parte derecha -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>


                                    <li class="breadcrumb-item active">y ahora que *2 *3?</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content-header -->

                <!-- /.content-header--- -->
            </div>
            <!-- id="clientes"  fin de seccion------------------------------>
            <!-- seccion de reportes y analisis -->
            <div id="reportes" class="gestion-section" style="display: none;">
                <!-- Content Header (Page header) //encabezado de lla pagina-->
                <div class="content-header">

                    <!-- clase de boostrap contenedor fluido que ocupa todo el ancho de la pantalla
                 y hace que se puedan organizar en filas y columnas  -->

                    <div class="container-fluid">
                        <!-- crea una fila inferior a mb 2 -->
                        <div class="row mb-2">
                            <!-- aqui esta indicando que ocupa 6 de las 12 columnas que tiene la pantalla
                         lo que basicamente hace que se divida en dos a un lado el titulo que esta al lado izquierdo
                         de la pantalla y el otro lado esta el enlace de actualizacion  -->
                            <div class="col-sm-6">
                                <h1 class="m-0"> Reportes y Analisis</h1>
                            </div><!-- /.col -->
                            <!-- este es el otro lado de la divicion anterior de columnas la parte derecha -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>


                                    <li class="breadcrumb-item active">reportes</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content-header -->

                <!-- /.content-header--- -->
            </div>
            <!-- id="reportes"  fin de seccion------------------------------>
            <!-- seccion de administracion de ususarios -->
            <div id="confi_usu" class="gestion-section" style="display: none;">
                <!-- Content Header (Page header) //encabezado de lla pagina-->
                <div class="content-header">

                    <!-- clase de boostrap contenedor fluido que ocupa todo el ancho de la pantalla
                 y hace que se puedan organizar en filas y columnas  -->

                    <div class="container-fluid">
                        <!-- crea una fila inferior a mb 2 -->
                        <div class="row mb-2">
                            <!-- aqui esta indicando que ocupa 6 de las 12 columnas que tiene la pantalla
                         lo que basicamente hace que se divida en dos a un lado el titulo que esta al lado izquierdo
                         de la pantalla y el otro lado esta el enlace de actualizacion  -->
                            <div class="col-sm-6">
                                <h1 class="m-0"> Administracion de Usuarios</h1>
                                <a href="#registro">Resgistrar nuevo usuario</a>
                            </div><!-- /.col -->
                            <!-- este es el otro lado de la divicion anterior de columnas la parte derecha -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>


                                    <li class="breadcrumb-item active">usuarios</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content-header -->
                <!-- knknvdkjvnkfnv -->
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <form action="controllers/guardar_cambios.php" method="POST" style="display: inline;">
                                    <td><input type="text" name="username" value="<?php echo htmlspecialchars($usuario['username']); ?>" required></td>
                                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required></td>
                                    <td><input type="text" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required></td>
                                    <td>
                                        <select name="id_roles" required>
                                            <option value="">Selecciona un rol</option>
                                            <option value="1" <?php echo $usuario['id_roles'] == '1' ? 'selected' : ''; ?>>Admin</option>
                                            <option value="2" <?php echo $usuario['id_roles'] == '2' ? 'selected' : ''; ?>>User</option>
                                        </select>
                                    </td>
                                    <td><?php echo htmlspecialchars($usuario['fyh_create']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['fyh_update']); ?></td>
                                    <td>
                                        <input type="hidden" name="id" value="<?php echo $usuario['id_user']; ?>">
                                        <button type="submit">Guardar</button>
                                    </td>
                                </form>
                                <td>
                                    <form action="controllers/eliminar_usuario.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $usuario['id_user']; ?>">
                                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <!-- Formulario para Agregar Nuevo Usuario -->
                <h3 id="registro">Agregar Nuevo Usuario</h3>
                <form action="controllers/controllers_registro.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" require>
                        <!--coloca al final de la linea  -->
                        <div class="input-group-append">
                            <!--coloca al final de la linea en tipo texto  -->
                            <div class="input-group-text">
                                <!--coloca al final de la linea, es un icono tipo espan  -->
                                <span class="fas fa-user"></span>
                            </div>
                        </div><!-- estos dos contenedores div, se utilizan para: -->

                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Correo" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="tel" name="phone" class="form-control" placeholder="telefono" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="repetir_password" class="form-control" placeholder="Repetir contraseña" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="id_roles" required>
                            <option value="">Selecciona un rol</option>
                            <option value="1" <?php echo $usuario['id_roles'] == '1' ? 'selected' : ''; ?>>Admin</option>
                            <option value="2" <?php echo $usuario['id_roles'] == '2' ? 'selected' : ''; ?>>User</option>
                            <!-- Agrega más roles según sea necesario -->
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit">Agregar Usuario</button>
                </form>

            </div>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="template/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="template/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
        <!-- ... tu código anterior ... -->

        <script>
            function showContent(sectionId) {
                document.querySelectorAll('.gestion-section').forEach(function(section) {
                    section.style.display = 'none';
                });
                document.getElementById(sectionId).style.display = 'block';
            }
        </script>

        <!-- ... tu código posterior ... -->

</body>

</html>