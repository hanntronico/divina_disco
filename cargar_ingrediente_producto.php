<?php
header('Content-Type: application/json');
require 'config.php';

try {
    $stmt = $pdo->query("SELECT codigo_producto, codigo_ingrediente, cantidad FROM ingrediente_producto ORDER BY codigo_producto");
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['data' => $datos]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
