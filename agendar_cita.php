<?php
require 'db.php';
require 'send_mail.php'; // Asegúrate de que este archivo existe y funciona correctamente

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['motivo'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $motivo = $_POST['motivo'];

    $stmt = $pdo->prepare("INSERT INTO citas (nombre, email, fecha, hora, motivo) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nombre, $email, $fecha, $hora, $motivo]);

    sendMail($email, $nombre, $fecha, $hora, $motivo);

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
</head>
<body>
    <h1>Agendar Cita</h1>
    <form action="agendar_cita.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del alumno" required>
        <input type="email" name="email" placeholder="Correo del padre" required>
        <input type="date" name="fecha" required>
        <input type="time" name="hora" required>
        <textarea name="motivo" placeholder="Motivo de la cita" required></textarea>
        <button type="submit">Agendar Cita</button>
    </form>
</body>
</html>
