<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar los datos del formulario
    $codigo_producto = $_POST['codigo_producto_select'] ?? '';
    $codigo_ingrediente = $_POST['codigo_ingrediente_select'] ?? '';
    $cantidad = trim($_POST['cantidad_ingrediente'] ?? '');

    // Validación básica
    if (empty($codigo_producto) || empty($codigo_ingrediente) || empty($cantidad)) {
        die('Todos los campos son obligatorios.');
    }

    try {
        // Verificar si ya existe la relación producto-ingrediente
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM ingrediente_producto WHERE codigo_producto = ? AND codigo_ingrediente = ?");
        $stmt->execute([$codigo_producto, $codigo_ingrediente]);
        $existe = $stmt->fetchColumn();

        if ($existe > 0) {
            echo "<script>alert('Este ingrediente ya está asignado a este producto.'); window.location.href = 'ingredienteproducto.php';</script>";
            exit;
        }

        // Insertar el nuevo registro
        $stmt = $pdo->prepare("INSERT INTO ingrediente_producto (codigo_producto, codigo_ingrediente, cantidad) VALUES (?, ?, ?)");
        $stmt->execute([$codigo_producto, $codigo_ingrediente, $cantidad]);

        // Mostrar alerta y redirigir
        echo "<script>alert('Registro insertado exitosamente'); window.location.href = 'ingredienteproducto.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Error al guardar en la base de datos: " . addslashes($e->getMessage()) . "'); window.location.href = 'ingredienteproducto.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Método no permitido.'); window.location.href = 'ingredienteproducto.php';</script>";
    exit;
}


