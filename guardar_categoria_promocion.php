<?php
require_once 'config.php'; // Tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo_categoria'] ?? '';
    $nombre = $_POST['nombre_categoria'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO categoria_promociones (codigo_categoria, nombre_categoria) VALUES (:codigo, :nombre)");
        $stmt->execute([
            ':codigo' => $codigo,
            ':nombre' => $nombre
        ]);

        echo "<script>
                alert('✅ Categoría guardada exitosamente');
                window.location.href = 'categoriapromociones.php';
              </script>";
    } catch (PDOException $e) {
        echo "<script>
                alert('❌ Error: " . $e->getMessage() . "');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('❌ Acceso no permitido');
            window.location.href = 'categoriapromociones.php';
          </script>";
}
?>
