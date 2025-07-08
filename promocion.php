<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Promociones</title>
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
    .img-thumbnail {
      max-width: 100px;
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

      <!-- Contenedor de formulario -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Promociones</h4>

        <form method="POST" action="guardar_promocion.php">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código de Promoción</label>
              <input type="text" class="form-control" name="codigo_promocion" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre de Promoción</label>
              <input type="text" class="form-control" name="nombre_promocion" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Descripción</label>
              <input type="text" class="form-control" name="descripcion">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Tipo</label>
              <input type="text" class="form-control" name="tipo">
            </div>
            <div class="col-md-4">
              <label class="form-label">Fecha de Inicio</label>
              <input type="date" class="form-control" name="fecha_inicio">
            </div>
            <div class="col-md-4">
              <label class="form-label">Fecha Final</label>
              <input type="date" class="form-control" name="fecha_final">
            </div>
          </div>

          <div class="row mb-3">
            <?php
            require_once 'config.php';
            $categorias = [];
            
            try {
                $stmt = $pdo->query("SELECT codigo_categoria, nombre_categoria FROM categoria_promociones ORDER BY nombre_categoria ASC");
                $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Error al cargar categorías: " . $e->getMessage() . "</div>";
            }
            ?>
            
            <div class="col-md-4">
              <label class="form-label">Categoría</label>
              <select class="form-control" name="categoria" required>
                <option value="">Seleccione</option>
                <?php foreach ($categorias as $cat): ?>
                  <option value="<?= htmlspecialchars($cat['codigo_categoria']) ?>">
                    <?= htmlspecialchars($cat['nombre_categoria']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label">Estado</label>
              <input type="text" class="form-control" name="estado">
            </div>
            <div class="col-md-4">
              <label class="form-label">Descuento (%)</label>
              <input type="number" class="form-control" name="descuento" min="0" max="100">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Sexo de Promoción</label>
              <select class="form-control" name="sexo_promocion">
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Todos">Todos</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Pre-compra</label>
              <select class="form-control" name="pre_compra">
                <option value="">Seleccione</option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>

        <div class="table-section">
  <h5>Listado de Promociones </h5>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Tipo</th>
          <th>Inicio</th>
          <th>Fin</th>
          <th>Categoría</th>
          <th>Estado</th>
          <th>Descuento</th>
          <th>Sexo</th>
          <th>Pre-compra</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require_once 'config.php';

          try {
              $stmt = $pdo->query("SELECT * FROM promociones ORDER BY id DESC");

              while ($row = $stmt->fetch()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row->codigo_promocion) . "</td>";
                  echo "<td>" . htmlspecialchars($row->nombre_promocion) . "</td>";
                  echo "<td>" . htmlspecialchars($row->descripcion) . "</td>";
                  echo "<td>" . htmlspecialchars($row->tipo) . "</td>";
                  echo "<td>" . htmlspecialchars($row->fecha_inicio) . "</td>";
                  echo "<td>" . htmlspecialchars($row->fecha_final) . "</td>";
                  echo "<td>" . htmlspecialchars($row->categoria) . "</td>";
                  echo "<td>" . htmlspecialchars($row->estado) . "</td>";
                  echo "<td>" . htmlspecialchars($row->descuento) . "%</td>";
                  echo "<td>" . htmlspecialchars($row->sexo_promocion) . "</td>";
                  echo "<td>" . htmlspecialchars($row->pre_compra) . "</td>";
                  echo "</tr>";
              }
          } catch (PDOException $e) {
              echo "<tr><td colspan='11'>Error al cargar promociones: " . $e->getMessage() . "</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>


      </div> <!-- /.form-section -->
    </div> <!-- /.row -->
  </div> <!-- /.container-fluid -->

</body>
</html>
