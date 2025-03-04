<?php
require('conex_bd.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM usuarios WHERE id_user = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
        header("Location:../index.php"); // Redirigir a la página de lista
        exit;
    } else {
        echo "Error al eliminar el usuario.";
    }
}
