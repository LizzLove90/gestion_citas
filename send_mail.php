<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail($email, $nombre, $fecha, $hora, $motivo) {
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lizeth.estradac90@gmail.com';
        $mail->Password = 'cwoowclsfjrloqjv'; // Usa contraseñas de aplicaciones
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('lizeth.estradac90@gmail.com', 'Escuela');
        $mail->addAddress($email);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Cita Programada';

        $logoUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9e0vqxpJ0TAYqyzxa0yIJ5Ofo9JG3d2ZDXA&s/gestor_citas/images.png'; // Cambia esto a la ruta correcta
        $mail->Body = "<h1>Cita Programada</h1>
                        <p>Estimado padre/tutor,</p>
                        <p>Se ha agendado una cita para su hijo(a): $nombre</p>
                        <p><strong>Fecha:</strong> $fecha</p>
                        <p><strong>Hora:</strong> $hora</p>
                        <p><strong>Motivo:</strong> $motivo</p>
                        <p><img src='$logoUrl' alt='Logo Escuela' style='width:100px;' /></p>";

        $mail->send();
        echo "Correo enviado exitosamente.";
    } catch (Exception $e) {
        echo "Error al enviar correo: {$mail->ErrorInfo}";
    }
}
?>
