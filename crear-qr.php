<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Crear QR</title>
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
      width: 150px;
      margin-right: 10px;
    }
    .form-label {
      font-weight: bold;
    }
    .table-section {
      padding: 20px;
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

      <!-- Contenido principal -->
      <div class="col-md-10">
        <!-- Formulario Crear QR -->
        <div class="form-section">
          <h4 class="mb-4">Crear Tipo de QR</h4>
          <form>
            <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-label">Código Tipo QR</label>
                <input type="text" class="form-control" name="codigo_qr">
              </div>
              <div class="col-md-4">
                <label class="form-label">Tipo QR</label>
                <input type="text" class="form-control" name="tipo_qr">
              </div>
              <div class="col-md-4">
                <label class="form-label">Observaciones</label>
                <input type="text" class="form-control" name="observaciones">
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-dark btn-custom"><i class="fas fa-qrcode"></i> Guardar</button>
              <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
            </div>
          </form>
        </div>

        <!-- Tabla Listado -->
        <div class="table-section">
          <h5>Listado de Tipo de QR</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Código Tipo QR</th>
                <th>Tipo QR</th>
                <th>Observaciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>QR001</td>
                <td>Entrada VIP</td>
                <td>Acceso prioritario</td>
              </tr>
              <tr>
                <td>QR002</td>
                <td>Promo Happy Hour</td>
                <td>Escaneable desde cartel</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
