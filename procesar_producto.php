<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

if (!isset($pdo)) {
    die("Error: no se pudo conectar a la base de datos.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoger datos del formulario con null coalescing para evitar warnings
    $codigo = $_POST['codigo_producto'] ?? '';
    $nombre = $_POST['nombre_producto'] ?? '';
    $descripcion = $_POST['descripcion_producto'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $id_categoria = $_POST['categoria_producto'] ?? 0;

    // Validar que la categoría exista
    $sql_check = "SELECT COUNT(*) FROM categorias WHERE id_categoria = :id_categoria";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    $stmt_check->execute();
    $existe = $stmt_check->fetchColumn();

    if (!$existe) {
        die("La categoría seleccionada no existe.");
    }

    // Manejo de la imagen
    $imagen_nombre = '';
    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] == 0) {
        $carpeta_destino = "uploads/";
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0755, true);
        }

        $nombre_original = basename($_FILES['imagenProducto']['name']);
        $ruta_destino = $carpeta_destino . time() . "_" . $nombre_original;

        if (move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $ruta_destino)) {
            $imagen_nombre = $ruta_destino;
        } else {
            die("Error al subir la imagen.");
        }
    }

    // Insertar producto
    $sql = "INSERT INTO productos (codigo_producto, nombre_producto, descripcion_producto, precio, imagen_producto, id_categoria)
            VALUES (:codigo, :nombre, :descripcion, :precio, :imagen, :categoria)";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen_nombre);
        $stmt->bindParam(':categoria', $id_categoria);

        $stmt->execute();

        echo "<script>
                alert('Producto insertado satisfactoriamente.');
                window.location.href = 'productos.php';
              </script>";
        exit;

    } catch (PDOException $e) {
        die("Error al guardar el producto: " . $e->getMessage());
    }

} else {
    die("Método no permitido.");
}

?>
