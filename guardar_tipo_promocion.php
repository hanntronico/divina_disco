<?php
require_once 'config.php'; // Asegúrate que este archivo conecta a la BD usando PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo_tipo'] ?? '';
    $nombre = $_POST['nombre_tipo'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO tipo_promocion (codigo_tipo, nombre_tipo) VALUES (:codigo, :nombre)");
        $stmt->execute([
            ':codigo' => $codigo,
            ':nombre' => $nombre
        ]);

        echo "<script>
                alert('✅ Tipo de promoción guardado exitosamente');
                window.location.href = 'tipopromocion.php'; // Ajusta si el nombre de la vista es otro
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
            window.location.href = 'tipopromocion.php';
          </script>";
}
?>
