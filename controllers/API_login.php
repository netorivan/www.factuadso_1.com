<?php
session_start(); // Inicia la sesión
require('conex_bd.php'); // Conexión a la base de datos

header("Content-Type: application/json"); // Respuesta en JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ["success" => false, "message" => ""];

    // Verificar si los datos están presentes
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['email'], $data['password_user'])) {
        $response["message"] = "Faltan datos obligatorios.";
    } else {
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $password = trim($data['password_user']);

        if (empty($email) || empty($password)) {
            $response["message"] = "Por favor, rellene todos los campos.";
        } else {
            try {
                $stmt = $conn->prepare("SELECT id_user, username, email, password, id_roles FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id_user'];
                    $_SESSION['user_role'] = $user['id_roles'];
                    $_SESSION['username'] = $user['username'];

                    $response["success"] = true;
                    $response["message"] = "Inicio de sesión exitoso.";
                    $response["user"] = [
                        "id" => $user['id_user'],
                        "username" => $user['username'],
                        "email" => $user['email'],
                        "role" => $user['id_roles']
                    ];
                } else {
                    $response["message"] = "Email o contraseña incorrectos.";
                }
            } catch (PDOException $e) {
                error_log($e->getMessage());
                $response["message"] = "Error en el sistema. Inténtelo más tarde.";
            }
        }
    }
    echo json_encode($response);
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método no permitido."]);
}
