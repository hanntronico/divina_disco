<?php
require_once 'config.php'; // Incluye la configuración de la conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $codigo         = $_POST['codigo_promocion'] ?? '';
    $nombre         = $_POST['nombre_promocion'] ?? '';
    $descripcion    = $_POST['descripcion'] ?? '';
    $tipo           = $_POST['tipo'] ?? '';
    $fecha_inicio   = $_POST['fecha_inicio'] ?? '';
    $fecha_final    = $_POST['fecha_final'] ?? '';
    $categoria      = $_POST['categoria'] ?? '';
    $estado         = $_POST['estado'] ?? '';
    $descuento      = $_POST['descuento'] ?? 0;
    $sexo           = $_POST['sexo_promocion'] ?? 'Todos';
    $pre_compra     = $_POST['pre_compra'] ?? 'No';

    try {
        $stmt = $pdo->prepare("
            INSERT INTO promociones (
                codigo_promocion, nombre_promocion, descripcion, tipo,
                fecha_inicio, fecha_final, categoria, estado,
                descuento, sexo_promocion, pre_compra
            ) VALUES (
                :codigo, :nombre, :descripcion, :tipo,
                :fecha_inicio, :fecha_final, :categoria, :estado,
                :descuento, :sexo, :pre_compra
            )
        ");

        $stmt->execute([
            ':codigo'       => $codigo,
            ':nombre'       => $nombre,
            ':descripcion'  => $descripcion,
            ':tipo'         => $tipo,
            ':fecha_inicio' => $fecha_inicio,
            ':fecha_final'  => $fecha_final,
            ':categoria'    => $categoria,
            ':estado'       => $estado,
            ':descuento'    => $descuento,
            ':sexo'         => $sexo,
            ':pre_compra'   => $pre_compra
        ]);

        // Mostrar alerta y redirigir con JavaScript
        echo "
            <script>
                alert('✅ Promoción guardada de forma exitosa.');
                window.location.href = 'promocion.php';
            </script>
        ";

    } catch (PDOException $e) {
        echo "<script>alert('❌ Error al guardar la promoción: " . addslashes($e->getMessage()) . "');</script>";
    }

} else {
    echo "<script>alert('❌ Acceso no permitido.');</script>";
}
?>
