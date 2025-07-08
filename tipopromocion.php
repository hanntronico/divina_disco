<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>DIVINNA Disco - Tipo Promoción</title>
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
      <!-- Formulario principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Tipo Promoción</h4>
        <form method="POST" action="guardar_tipo_promocion.php">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label" for="codigo_tipo">Código Tipo</label>
              <input type="text" class="form-control" name="codigo_tipo" id="codigo_tipo" required />
            </div>
            <div class="col-md-4">
              <label class="form-label" for="nombre_tipo">Nombre Tipo</label>
              <input type="text" class="form-control" name="nombre_tipo" id="nombre_tipo" required />
            </div>
          </div>
          <br />
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>
        <br />
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
              <?php
              require_once 'config.php';

              try {
                $stmt = $pdo->query("SELECT * FROM tipo_promocion ORDER BY id DESC");
                while ($row = $stmt->fetch()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row->codigo_tipo) . "</td>";
                  echo "<td>" . htmlspecialchars($row->nombre_tipo) . "</td>";
                  echo "</tr>";
                }
              } catch (PDOException $e) {
                echo "<tr><td colspan='2'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
