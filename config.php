<?php
$host = '162.241.61.205';
$dbname = 'allsopor_divinna';
$user = 'allsopor_divinna';
$pass = 'allsopor_divinna123.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    // Lanza excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Devuelve los resultados como objetos por defecto
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
