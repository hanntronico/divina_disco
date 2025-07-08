<?php
require_once 'config.php';

try {
    // Obtener productos
    $stmtProd = $pdo->query("SELECT codigo_producto, nombre_producto FROM productos ORDER BY nombre_producto ASC");
    $productos = $stmtProd->fetchAll();

    // Obtener ingredientes
    $stmtIng = $pdo->query("SELECT id_ingrediente, nombre_ingrediente FROM ingredientes ORDER BY nombre_ingrediente ASC");
    $ingredientes = $stmtIng->fetchAll();

    echo json_encode([
        'productos' => $productos,
        'ingredientes' => $ingredientes
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
