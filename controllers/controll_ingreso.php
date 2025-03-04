<?php
session_start(); // Inicia la sesión

require('conex_bd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica que ambos campos estén presentes
    if (!isset($_POST['email'], $_POST['password_user'])) {
        echo 'no hay datos';
    } else {
        // Verifica si los campos están vacíos
        if (empty($_POST['email']) || empty($_POST['password_user'])) {
            echo "por favor rellene el formulario";
        } else {
            try {
                $email = $_POST['email'];
                $password = trim($_POST['password_user']);

                // Preparar la consulta SQL
                $stmt = $conn->prepare("SELECT u.id_user, u.username, u.email, u.password, r.id_roles FROM usuarios u JOIN roles r ON u.id_roles = r.id_roles WHERE u.email = :email");

                // Vincular el parámetro de email
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                // Obtener el resultado de la consulta
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Verificar la contraseña
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['id_user']; // Almacena el ID del usuario
                        $_SESSION['user_role'] = $user['id_roles']; // Almacena el rol del usuario
                        $_SESSION['username'] = $user['username']; // Almacena el nombre de usuario

                        // Procesar el usuario según el rol
                        switch ($user['id_roles']) {
                            case 1: // Supongamos que 1 es el ID para 'admin'
                                header("Location: ../index.php");
                                exit();
                            case 2: // Supongamos que 2 es el ID para 'operador'
                                header("Location: ../factura.php");
                                exit();
                            default:
                                echo "Rol no reconocido.";
                        }
                    } else {
                        echo "Contraseña incorrecta.";
                    }
                } else {
                    echo "Email no encontrado.";
                }
            } catch (PDOException $e) {
                error_log($e->getMessage());
                echo "Ocurrió un error en el sistema: " . htmlspecialchars($e->getMessage());
            }
        }
    }
}
