<?php
include('controllers/conex_bd.php');

$usuarios = [];
$query = "SELECT u.*, r.nombre_rol AS rol, r.fecha_creacion AS fyh_create, r.fecha_actualizacion AS fyh_update 
          FROM usuarios u
          LEFT JOIN roles r ON u.id_roles = r.id_roles";

try {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Obtener todos los resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener usuarios: " . $e->getMessage();
}

// Consulta para obtener los roles
$rolesQuery = "SELECT id_roles, nombre_rol FROM roles WHERE nombre_rol IN ('operador')"; // Asegúrate de que 'id_roles' y 'nombre_rol' sean las columnas correctas
$rolesStmt = $conn->prepare($rolesQuery);
$rolesStmt->execute();
$roles = $rolesStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Regístrate!</title>

    <!-- estilos de bootstrap y fuentes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="template/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- estilos mios css y java -->
    <link rel="stylesheet" href="public/css/styles_mios.css">

    <style>
        body {
            background-image: url('public/images/logo-sena-negro-svg-2022.svg');
            background-size: 50% 50%;
        }
    </style>

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="login.php"><b>INGRESAR</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrar nuevo usuario</p>

                <form action="controllers/controllers_registro.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Correo" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="tel" name="phone" class="form-control" placeholder="Teléfono" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="repetir_password" class="form-control" placeholder="Repetir contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="id_roles" class="form-control" required>
                            <option value="">Selecciona un rol</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?php echo $role['id_roles']; ?>"><?php echo htmlspecialchars($role['nombre_rol']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    Estoy de acuerdo <a href="terminos.html">términos y condiciones</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                    </div>
                </form>

                <a href="login.php" class="text-center">¡Ya tengo una cuenta!</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    ...
</body>

</html>