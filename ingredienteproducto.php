<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("
        SELECT 
            p.nombre_producto AS producto,
            ip.codigo_producto,
            i.nombre_ingrediente AS ingrediente,
            ip.codigo_ingrediente,
            ip.cantidad
        FROM ingrediente_producto ip
        JOIN productos p ON ip.codigo_producto = p.codigo_producto
        JOIN ingredientes i ON ip.codigo_ingrediente = i.id_ingrediente
        ORDER BY p.nombre_producto, i.nombre_ingrediente
    ");
    $registros = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error al obtener los datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>DIVINNA Disco - Ingrediente Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    .img-thumbnail {
      max-width: 100px;
    }
    .table-section {
      margin-top: 20px;
    }
    .logo {
  display: block;
  max-width: 200px;
  margin: 0 auto;
}
  </style>
</head>
<body>

  <!-- Logo -->
  <div class="bg-black text-center py-3">
    <img src="assets/img/logo.png" alt="DIVINNA Disco" class="logo" />
  </div>

  <div class="container-fluid">
    <div class="row">
         <?php include('menu.php'); ?>
      <!-- Contenido Principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Ingrediente por Producto</h4>

        <form id="formIngredienteProducto" method="POST" action="guardar_ingrediente_producto.php">
  <div class="row mb-3">
    <div class="col-md-4">
      <label for="codigo_producto_select" class="form-label">Producto</label>
      <select class="form-control" id="codigo_producto_select" name="codigo_producto_select" required>
        <option value="">Selecciona un producto</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="codigo_producto" class="form-label">Ci&oacute;digo del Producto</label>
      <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" readonly disabled>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4">
      <label for="codigo_ingrediente_select" class="form-label">Ingrediente</label>
      <select class="form-control" id="codigo_ingrediente_select" name="codigo_ingrediente_select" required>
        <option value="">Selecciona un ingrediente</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="codigo_ingrediente" class="form-label">C&oacute;digo del Ingrediente</label>
      <input type="text" class="form-control" id="codigo_ingrediente" name="codigo_ingrediente" readonly disabled>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4">
      <label for="cantidad_ingrediente" class="form-label">Cantidad Ingrediente</label>
      <input type="text" class="form-control" id="cantidad_ingrediente" name="cantidad_ingrediente" required placeholder="Ejemplo: 500 ml" />
    </div>
  </div>
  <br>

  <div class="mb-3">
    <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
    <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
  </div>
</form>


        <!-- Tabla -->
        <div class="table-section">
          <h5>Listado de Nuestros Productos</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Producto</th>
                <th>Código Producto</th>
                <th>Ingrediente</th>
                <th>Código Ingrediente</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($registros)): ?>
                <?php foreach ($registros as $fila): ?>
                  <tr>
                    <td><?= htmlspecialchars($fila->producto) ?></td>
                    <td><?= htmlspecialchars($fila->codigo_producto) ?></td>
                    <td><?= htmlspecialchars($fila->ingrediente) ?></td>
                    <td><?= htmlspecialchars($fila->codigo_ingrediente) ?></td>
                    <td><?= htmlspecialchars($fila->cantidad) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">No hay registros para mostrar.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <script>
document.addEventListener("DOMContentLoaded", function () {
  fetch("obtener_datos_selects.php")
    .then(response => response.json())
    .then(data => {
      const productoSelect = document.getElementById("codigo_producto_select");
      const ingredienteSelect = document.getElementById("codigo_ingrediente_select");
      const inputCodigoProducto = document.getElementById("codigo_producto");
      const inputCodigoIngrediente = document.getElementById("codigo_ingrediente");

      // Llenar productos
      data.productos.forEach(p => {
        const option = document.createElement("option");
        option.value = p.codigo_producto;
        option.textContent = p.nombre_producto;
        productoSelect.appendChild(option);
      });

      // Llenar ingredientes
      data.ingredientes.forEach(i => {
        const option = document.createElement("option");
        option.value = i.id_ingrediente;
        option.textContent = i.nombre_ingrediente;
        ingredienteSelect.appendChild(option);
      });

      // Mostrar el código del producto seleccionado
      productoSelect.addEventListener("change", function () {
        inputCodigoProducto.value = productoSelect.value;
      });

      // Mostrar el código del ingrediente seleccionado
      ingredienteSelect.addEventListener("change", function () {
        inputCodigoIngrediente.value = ingredienteSelect.value;
      });
    })
    .catch(error => {
      console.error("Error al cargar selects:", error);
    });
});
</script>


 
</body>
</html>
