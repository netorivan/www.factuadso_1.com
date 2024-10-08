<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FACTUADSO Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Incluye SweetAlert2 -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Asegúrate de que la ruta sea correcta -->


    <style>
        body {
            background-image: url('https://img.freepik.com/foto-gratis/retrato-persona-que-posee-gestiona-su-propia-empresa_23-2151456982.jpg?uid=R158968701&ga=GA1.1.1801076652.1723594602&semt=ais_hybrid');
            /* Cambia la ruta a la ubicación de tu imagen */
            background-size: cover;
            /* Para que la imagen cubra toda la pantalla */
            background-position: center;
            /* Para centrar la imagen */
            background-repeat: no-repeat;
            /* Para evitar que la imagen se repita */
        }

        .login-box {
            /* Agrega un fondo semitransparente al contenedor del login */
            background-color: rgba(255, 255, 255, 0.8);
            /* Blanco con 80% de opacidad */
            border-radius: 10px;
            /* Opcional: bordes redondeados */
            padding: 20px;
            /* Espaciado interno */
        }
    </style>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>FACTUADSO</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Digita aqui tus datos para iniciar sesion</p>

                <form action="controllers/controll_ingreso.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Correo">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_user" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recuerdame!
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <p class="mb-1">
                    <a href="forgot-password.html">Olvide mi contraseña</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Registrar nuevo usuario</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="template/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="template/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
    <script>
        function mostrarAlertaCamposVacios() {
            Swal.fire({
                icon: 'warning',
                title: 'Campos Vacíos',
                text: 'Por favor, completa todos los campos.',
                confirmButtonText: 'Aceptar'
            });
        }

        function mostrarAlertaCamposLlenos() {
            Swal.fire({
                icon: 'info',
                title: 'Campos Llenos',
                text: 'Los campos están completos.',
                confirmButtonText: 'Aceptar'
            });
        }
    </script>

</body>

</html>