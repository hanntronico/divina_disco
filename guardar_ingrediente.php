<?php
require 'config.php'; // Asegúrate de tener la conexión $pdo definida aquí

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = trim($_POST['codigo_ingrediente'] ?? '');
    $nombre = trim($_POST['nombre_ingrediente'] ?? '');
    $stock = floatval($_POST['stock'] ?? 0);
    $medida = trim($_POST['medida_uso'] ?? '');
    $uso = trim($_POST['uso_ingrediente'] ?? '');

    if ($codigo && $nombre) {
        try {
            $stmt = $pdo->prepare("INSERT INTO ingredientes (id_ingrediente, nombre_ingrediente, stock, medida_uso, uso_ingrediente)
                                   VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$codigo, $nombre, $stock, $medida, $uso]);

            echo "<script>
                alert('Ingrediente guardado correctamente.');
                window.location.href = 'ingredientes.php';
            </script>";
        } catch (PDOException $e) {
            echo "<script>
                alert('Error al guardar: " . $e->getMessage() . "');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Por favor complete al menos el código y nombre del ingrediente.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Acceso no permitido.');
        window.location.href = 'ingredientes.php';
    </script>";
}
?>
