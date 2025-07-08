<?php
require_once 'config.php'; // conexión a la base de datos

// Consulta para obtener todas las categorías existentes
$categorias = [];
try {
    $stmt = $pdo->query("SELECT codigo_categoria, nombre_categoria FROM categoria_promociones ORDER BY id DESC");
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener categorías: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Categoría Promo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      background: linear-gradient(to right, #e8a9e5, #b7a1ff);
      font-family: Arial, sans-serif;
    }
    .sidebar {
      background: linear-gradient(to right, #e8a9e5, #b7a1ff);
      color: black;
      min-height: 100vh;
      padding: 20px 10px;
    }
    .sidebar a {
      display: block;
      color: black;
      padding: 5px 10px;
      text-decoration: none;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background-color: #3b5bdb;
    }
    .form-section {
      padding: 20px;
    }
    .logo {
      display: block;
      max-width: 200px;
      margin: 20px auto;
    }
    .btn-custom {
      width: 100px;
      margin-right: 10px;
    }
    .form-label {
      font-weight: bold;
    }
    .table-section {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Logo -->
  <div class="bg-black text-center py-3">
    <img src="assets/img/logo.png" alt="DIVINNA Disco" class="logo">
  </div>

  <div class="container-fluid">
    <div class="row">
      <?php include('menu.php'); ?>
      
      <!-- Formulario principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Categorías Promociones</h4>
        
        <form method="POST" action="guardar_categoria_promocion.php">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código Categoría Promo</label>
              <input type="text" class="form-control" name="codigo_categoria" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre Categoría Promo</label>
              <input type="text" class="form-control" name="nombre_categoria" required>
            </div>
          </div>
          <br>
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>

        <!-- Tabla de categorías -->
        <div class="table-section">
          <h5>Listado de Categorías Promociones</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($categorias) > 0): ?>
                <?php foreach ($categorias as $categoria): ?>
                  <tr>
                    <td><?= htmlspecialchars($categoria['codigo_categoria']) ?></td>
                    <td><?= htmlspecialchars($categoria['nombre_categoria']) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="2">No hay categorías registradas.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
