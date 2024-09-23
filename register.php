<?php
require 'db.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña

    // Preparar la consulta
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    
    // Ejecutar la consulta
    if ($stmt->execute([$name, $email, $password])) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Registrarse</h1>
    <form action="register.php" method="POST">
        <input type="text" name="name" required placeholder="Nombre">
        <input type="email" name="email" required placeholder="Correo Electrónico">
        <input type="password" name="password" required placeholder="Contraseña">
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
