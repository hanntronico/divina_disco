<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: linear-gradient(to right, #54F1FD, #b7a1ff);
      font-family: Arial, sans-serif;
    }
    .sidebar {
      background: linear-gradient(to right, #54F1FD);
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
    <img src="assets/img/logo2.png" alt="DIVINNA Disco" class="logo">
  </div>

  <div class="container-fluid">
    <div class="row">
      <!-- Menú lateral -->
      <?php include('menu.php'); ?>

      <!-- Formulario principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Usuarios</h4>
        <form>
          <div class="row mb-3">
            <div class="col-md-3">
              <label class="form-label">Código Usuario</label>
              <input type="text" class="form-control" name="codigo_usuario" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Código Perfil</label>
              <input type="text" class="form-control" name="codigo_perfil" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-3">
              <label class="form-label">Estado</label>
              <select class="form-select" name="estado" required>
                <option value="">Seleccione</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Cambiar primera vez</label>
              <select class="form-select" name="cambiar_primera_vez" required>
                <option value="">Seleccione</option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
          <br>
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>
        <br>
        <!-- Tabla de usuarios -->
        <div class="table-section">
          <h5>Listado de Usuarios</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Código Usuario</th>
                <th>Código Perfil</th>
                <th>Cambiar Primera Vez</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>USR001</td>
                <td>PERF001</td>
                <td>Sí</td>
                <td>Activo</td>
              </tr>
              <tr>
                <td>USR002</td>
                <td>PERF002</td>
                <td>No</td>
                <td>Inactivo</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
