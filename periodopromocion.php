<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Periodo Promoción</title>
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
      margin: 0 auto;
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
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Periodo Promoción</h4>

        <?php
        if (isset($_GET['success'])) {
            echo "<script>alert('¡Registro guardado con éxito!'); window.location.href='periodopromocion.php';</script>";
        }
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger">Error: Todos los campos son obligatorios.</div>';
        }
        ?>

        <form method="POST" action="guardar_periodo_promocion.php">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código Periodo</label>
              <input type="text" name="codigo_periodo" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre Periodo</label>
              <input type="text" name="nombre_periodo" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>

        <!-- Tabla -->
        <div class="table-section">
          <h5>Listado de Periodos de Promoción</h5>
          <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                  $stmt = $pdo->query("SELECT * FROM periodo_promocion ORDER BY id DESC");
                  $registros = $stmt->fetchAll();
                  if (count($registros) === 0) {
                      echo "<tr><td colspan='2'>No hay registros aún.</td></tr>";
                  } else {
                      foreach ($registros as $r) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($r->codigo_periodo) . "</td>";
                          echo "<td>" . htmlspecialchars($r->nombre_periodo) . "</td>";
                          echo "</tr>";
                      }
                  }
              } catch (PDOException $e) {
                  echo "<tr><td colspan='2'>Error al cargar datos: " . $e->getMessage() . "</td></tr>";
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
