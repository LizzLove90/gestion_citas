<?php
require 'db.php'; // Asegúrate de que la ruta sea correcta

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para obtener el usuario
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Iniciar sesión
        $_SESSION['user'] = $user['name']; // Guarda el nombre en la sesión
        $_SESSION['user_id'] = $user['id']; // Guarda el ID en la sesión
        header("Location: dashboard.php"); // Redirigir a la página de inicio
        exit();
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="POST">
        <input type="email" name="email" required placeholder="Correo Electrónico">
        <input type="password" name="password" required placeholder="Contraseña">
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
