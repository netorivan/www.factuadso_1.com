<?php
// Conectar a la base de datos

require('conex_bd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $id_rol = $_POST['id_roles'];

    $query = "UPDATE usuarios SET username = :username, email = :email, telefono = :telefono, id_roles = :id_roles WHERE id_user = :id_user";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':id_user', $id);
    $stmt->bindParam(':id_roles', $id_rol); // Vinculamos el nuevo rol

    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente.";
        header("Location:../index.php"); // Redirigir a la página de lista
        exit;
    } else {
        echo "Error al actualizar el usuario.";
    }
}
