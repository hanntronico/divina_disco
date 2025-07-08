<?php
header('Content-Type: application/json');
require 'config.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM ingredientes ORDER BY nombre_ingrediente");
    $stmt->execute();
    $ingredientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['ingredientes' => $ingredientes]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
