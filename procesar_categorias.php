<?php
require 'config.php';
// Conexión
$host = '162.241.61.205';
$dbname = 'allsopor_divinna';
$user = 'allsopor_divinna';
$pass = 'allsopor_divinna123.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Validar y procesar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = isset($_POST['codigo_categoria']) ? trim($_POST['codigo_categoria']) : '';
    $nombre = isset($_POST['nombre_categoria']) ? trim($_POST['nombre_categoria']) : '';

    if ($codigo && $nombre) {
        try {
            $stmt = $pdo->prepare("INSERT INTO categorias (id_categoria, nombre_categoria) VALUES (?, ?)");
            $stmt->execute([$codigo, $nombre]);

            // Mostrar alert y volver atrás
            echo "<script>
                alert('Categoría guardada correctamente');
                window.location.href = 'categorias.php';
            </script>";
            exit;
        } catch (PDOException $e) {
            echo "<script>
                alert('Error al guardar: " . $e->getMessage() . "');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Por favor complete todos los campos.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Acceso no permitido.');
        window.location.href = 'categorias.php';
    </script>";
}
?>
