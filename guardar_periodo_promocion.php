<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo_periodo'] ?? '';
    $nombre = $_POST['nombre_periodo'] ?? '';

    if (!empty($codigo) && !empty($nombre)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO periodo_promocion (codigo_periodo, nombre_periodo) VALUES (?, ?)");
            $stmt->execute([$codigo, $nombre]);
            header("Location: periodopromocion.php?success=1");
            exit;
        } catch (PDOException $e) {
            die("Error al guardar: " . $e->getMessage());
        }
    } else {
        header("Location: periodopromocion.php?error=1");
        exit;
    }
}
?>
