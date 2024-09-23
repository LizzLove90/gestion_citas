<?php
require 'db.php'; // Asegúrate de que la ruta sea correcta

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Lógica de inicio de sesión...
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="images.png" alt="Logo Escuela" class="logo">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
        <a href="register.php">No tienes cuenta, regístrate aquí</a>
    </div>
</body>
</html>
