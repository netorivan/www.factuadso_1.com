<?php
include('controllers/config.php'); // Asegúrate de incluir tu configuración de base de datos

// Código para buscar en la base de datos
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $searchTerm = "%$query%";

    // Prepara la consulta SQL
    $sql = "SELECT 'productos' AS fuente, nombre_producto FROM productos WHERE nombre_producto LIKE :searchTerm
            UNION ALL
            SELECT 'usuarios' AS fuente, ? FROM usuarios WHERE ? LIKE :searchTerm
            UNION ALL
            SELECT 'administracion' AS fuente, descripcion FROM administracion WHERE descripcion LIKE :searchTerm";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $row) {
            echo "<p>De la tabla " . htmlspecialchars($row['fuente']) . ": " . htmlspecialchars($row['nombre'] ?? $row['descripcion']) . "</p>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "No se proporcionó ninguna consulta.";
}
