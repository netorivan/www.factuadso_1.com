
<?php
include('../../config.php');

session_start(); // Iniciar la sesión
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location:../login.php"); // Redirigir a la página de inicio (o login)
exit();
echo 'cerrar sesion';
