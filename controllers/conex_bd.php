<?php
// Definición de constantes para la conexión
define('SERVIDOR', 'localhost'); // Define el servidor de la base de datos
define('USUARIO', 'root'); // Define el nombre de usuario para la base de datos
define('PASSWORD', ''); // Define la contraseña para la base de datos
define('BD', 'sistemadeventas'); // Define el nombre de la base de datos

// Crea la cadena de conexión para PDO
$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

// Intenta establecer la conexión a la base de datos
try {
    // Crea una nueva instancia de PDO
    $conn = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    // Configura el modo de error de PDO para lanzar excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores

    // Mensaje de éxito
    echo "Conexión exitosa";
} catch (PDOException $e) {
    // Captura cualquier excepción y muestra el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
