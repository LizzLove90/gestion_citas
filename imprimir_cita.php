<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la cita de la base de datos
    try {
        $stmt = $pdo->prepare("SELECT * FROM citas WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $cita = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    if (!$cita) {
        echo "Cita no encontrada.";
        exit;
    }
} else {
    echo "ID de cita no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Imprimir Cita</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos para impresión */
        body {
            font-family: Arial, sans-serif;
        }
        .logo {
            text-align: center;
        }
        .firma {
            margin-top: 50px;
            border-top: 1px solid #000;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="Logo">
        <img src="images.png" alt="Logo de la Escuela">
        <h2>Esc. Secundaria Gral. No. 118 "Generación 2003"</h2>
        <h3>Cita Agendada</h3>
    </div>

    <p><strong>Nombre del Alumno:</strong> <?php echo htmlspecialchars($cita['nombre']); ?></p>
    <p><strong>Correo del Padre:</strong> <?php echo htmlspecialchars($cita['email']); ?></p>
    <p><strong>Fecha:</strong> <?php echo htmlspecialchars($cita['fecha']); ?></p>
    <p><strong>Hora:</strong> <?php echo htmlspecialchars($cita['hora']); ?></p>
    <p><strong>Motivo:</strong> <?php echo htmlspecialchars($cita['motivo']); ?></p>

    <div class="firma">
        <p>Firma del Padre/Madre/Tutor</p>
    </div>
</body>
</html>
