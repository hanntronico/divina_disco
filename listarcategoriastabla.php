<?php
header('Content-Type: application/json');
require 'config.php';

try {
    // Obtener categorías
    $stmtCat = $pdo->prepare("SELECT id_categoria, nombre_categoria FROM categorias ORDER BY nombre_categoria");
    $stmtCat->execute();
    $categorias = $stmtCat->fetchAll(PDO::FETCH_ASSOC);

    // Obtener productos con nombre de categoría
    $stmtProd = $pdo->prepare("
        SELECT p.codigo_producto, p.nombre_producto, p.descripcion_producto, p.precio, c.nombre_categoria
        FROM productos p
        LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
        ORDER BY p.nombre_producto
    ");
    $stmtProd->execute();
    $productos = $stmtProd->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'categorias' => $categorias,
        'productos' => $productos
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
