<?php
$host = 'localhost';
$db = 'gestor_citas'; // Asegúrate de que el nombre sea correcto
$user = 'root'; // Usuario de la base de datos
$pass = ''; // Contraseña de la base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
