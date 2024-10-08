
<?php
include 'conex_bd.php';
// procesar la conexion a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los datos están presentes
    if (!isset($_POST['nombre'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['repetir_password'], $_POST['id_roles'])) {
        echo 'No hay datos';
    } else {
        // Inicializa un array para almacenar mensajes de error
        $errores = [];

        // Verifica si los campos están vacíos
        if (empty($_POST['nombre'])) {
            $errores[] = "Por favor, rellena tu nombre.";
        }
        if (empty($_POST['email'])) {
            $errores[] = "Por favor, rellena tu correo electrónico.";
        }
        if (empty($_POST['phone'])) {
            $errores[] = "Por favor, rellena tu teléfono.";
        }
        if (empty($_POST['password'])) {
            $errores[] = "Por favor, rellena la contraseña.";
        }
        if (empty($_POST['repetir_password'])) {
            $errores[] = "Por favor, repite la contraseña.";
        }
        if (empty($_POST['id_roles'])) {
            $errores[] = "Por favor, selecciona un rol.";
        }

        // Si hay errores, muéstralos
        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo "<p>$error</p>";
            }
        } else {
            // Si no hay errores, procesa los datos
            $nombre = htmlspecialchars($_POST['nombre']);
            $email = htmlspecialchars($_POST['email']);
            $telefono = htmlspecialchars($_POST['phone']);
            $password = $_POST['password'];
            $repetir_password = $_POST['repetir_password'];
            $rol = $_POST['id_roles'];

            // Verifica si las contraseñas coinciden
            if ($password !== $repetir_password) {
                echo "<p>Las contraseñas no coinciden.</p>";
            } else {
                // Hashear la contraseña
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Conectar a la base de datos (asegúrate de tener una conexión válida)
                try {

                    // Consulta de inserción
                    $insertQuery = "INSERT INTO usuarios (username, email, telefono, password, id_roles) VALUES (:username, :email, :telefono, :password, :id_roles)";

                    // Preparar la consulta
                    $stmt = $conn->prepare($insertQuery);
                    // Vincular parámetros
                    $stmt->bindParam(':username', $nombre);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':telefono', $telefono);
                    $stmt->bindParam(':password', $hashedPassword);
                    $stmt->bindParam(':id_roles', $rol);

                    // Ejecutar la consulta
                    $stmt->execute();
                    header("Location: ../login.php");
                    exit();
                } catch (PDOException $e) {
                    // Manejo de errores
                    echo "<p>Error en la base de datos: " . $e->getMessage() . "</p>";
                    header("Location:../register.php");
                    exit();
                }
            }
        } // fin de la verificación de errores
    } // fin de isset
} // fin de server
