<?php
require 'db.php'; // Asegúrate de que la ruta sea correcta

// Obtener las citas de la base de datos
$stmt = $pdo->prepare("SELECT * FROM citas");
$stmt->execute();
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Citas</title>
    <link rel="stylesheet" href="style.css"> <!-- Asegúrate de que esta ruta sea correcta -->
    <style>
  body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .cita {
            border: 1px solid #333;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #fff;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            border-top: 1px solid #333;
            padding-top: 10px;
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 100px; /* Ajusta el tamaño según sea necesario */
        }

        
button {
    background-color: #188ae7;
    color: white;
    cursor: pointer;
}

button:hover {
    background-color: #188ae7;
}

    </style>
</head>
<body>

    <h1>Esc. Secundaria Gral. No. 118 "Generación 2003"</h1>
    <h2>Citas Agendadas</h2>

    <?php foreach ($citas as $cita): ?>
        <div class="cita">
            <p><strong>Nombre del Alumno:</strong> <?php echo $cita['nombre']; ?></p>
            <p><strong>Fecha:</strong> <?php echo $cita['fecha']; ?></p>
            <p><strong>Hora:</strong> <?php echo $cita['hora']; ?></p>
            <p><strong>Motivo:</strong> <?php echo $cita['motivo']; ?></p>
            <button onclick="printCita(<?php echo $cita['id']; ?>)">Imprimir</button>
        </div>
    <?php endforeach; ?>
    <script>
    function printCita(id) {
        const citas = document.querySelectorAll('.cita');
        const cita = Array.from(citas).find(c => c.querySelector('button').onclick.toString().includes(id));

        if (!cita) return; // Si no se encuentra la cita, salir de la función
        
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Imprimir Cita</title>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<img src="images.png" alt="Logo de la Escuela" style="display:block; margin:0 auto; width:100px;">');
        printWindow.document.write('<h1>Esc. Secundaria Gral. No. 118 "Generación 2003"</h1>');
        printWindow.document.write('<h2>Cita Agendada</h2>');
        printWindow.document.write('<p><strong>Nombre del Alumno:</strong> ' + cita.querySelector('p:nth-child(1)').textContent.split(': ')[1] + '</p>');
        printWindow.document.write('<p><strong>Fecha:</strong> ' + cita.querySelector('p:nth-child(2)').innerHTML + '</p>');
        printWindow.document.write('<p><strong>Hora:</strong> ' + cita.querySelector('p:nth-child(3)').innerHTML + '</p>');
        printWindow.document.write('<p><strong>Motivo:</strong> ' + cita.querySelector('p:nth-child(4)').innerHTML + '</p>');
        printWindow.document.write('<div style="margin-top: 50px;"><p>______________________________</p><p>Firma del padre, madre o tutor</p></div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

</body>
</html>
