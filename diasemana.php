<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Dia Semana</title>
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
    <img src="assets/img/logo.png" alt="DIVINNA Disco" class="logo">
  </div>

  <div class="container-fluid">
    <div class="row">
        <?php include('menu.php'); ?>
      <!-- Formulario principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Dia Semana</h4>
        <form method="POST" action="guardar_dia_semana.php">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código Día de Semana</label>
              <input type="text" class="form-control" name="codigo_dia" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre Día de Semana</label>
              <input type="text" class="form-control" name="nombre_dia" required>
            </div>
          </div>
          <br>
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>
        <br>
         <!-- Tabla de categorías -->
        <div class="table-section">
          <h5>Listado de Días Semana</h5>
          <table class="table table-bordered table-striped mt-3">
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
                    $stmt = $pdo->query("SELECT * FROM dia_semana ORDER BY id DESC");
                    $rows = $stmt->fetchAll();
                    if (count($rows) === 0) {
                        echo "<tr><td colspan='2'>No hay registros en la base de datos.</td></tr>";
                    } else {
                        foreach ($rows as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row->codigo_dia) . "</td>";
                            echo "<td>" . htmlspecialchars($row->nombre_dia) . "</td>";
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



