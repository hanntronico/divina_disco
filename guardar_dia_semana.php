<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo_dia'] ?? '';
    $nombre = $_POST['nombre_dia'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO dia_semana (codigo_dia, nombre_dia) VALUES (:codigo, :nombre)");
        $stmt->execute([
            ':codigo' => $codigo,
            ':nombre' => $nombre
        ]);

        echo "<script>
                alert('¡Registro guardado exitosamente!');
                window.location.href = 'diasemana.php';
              </script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>
                alert('Error al guardar: " . $e->getMessage() . "');
                window.history.back();
              </script>";
        exit;
    }
} else {
    echo "<script>
            alert('Solicitud inválida.');
            window.history.back();
          </script>";
}
?>
