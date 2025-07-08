<?php
// listarproductostabla.php

header('Content-Type: application/json');

require 'config.php'; // Tu conexión PDO

try {
    // Traer productos con nombre de categoría (join)
    $stmt = $pdo->prepare("
        SELECT p.codigo_producto, p.nombre_producto, c.nombre_categoria, p.precio, p.descripcion_producto
        FROM productos p
        LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
        ORDER BY p.nombre_producto ASC
    ");
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Traer categorías para el combo
    $stmt2 = $pdo->prepare("SELECT id_categoria, nombre_categoria FROM categorias ORDER BY nombre_categoria ASC");
    $stmt2->execute();
    $categorias = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'productos' => $productos,
        'categorias' => $categorias
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
