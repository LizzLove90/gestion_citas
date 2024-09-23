<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require 'db.php'; // Asegúrate de que la ruta sea correcta

// Opcional: Consulta para obtener las citas
try {
    $stmt = $pdo->prepare("SELECT * FROM citas");
    $stmt->execute();
    $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Citas - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido</h1>
        <div class="agenda-cita">
            <h2>Agendar Cita</h2>
            <form action="agendar_cita.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre del alumno" required>
                <input type="email" name="email" placeholder="Correo del padre" required>
                <input type="date" name="fecha" required>
                <input type="time" name="hora" required>
                <textarea name="motivo" placeholder="Motivo de la cita" required></textarea>
                <button type="submit">Agendar Cita</button>
            </form>
        </div>
        <div class="ver-citas">
            <h2>Ver Citas</h2>
            <a href="ver_citas.php">Ver citas agendadas</a>
        </div>
    </div>
</body>
</html>
