<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Cargos</title>
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
        <h4 class="mb-4">Cargos</h4>
        <form>
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código Cargo</label>
              <input type="text" class="form-control" name="codigo_cargo">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre Cargo</label>
              <input type="text" class="form-control" name="nombre_cargo">
            </div>
            <div class="col-md-4">
              <label class="form-label">Descripción Cargo</label>
              <input type="text" class="form-control" name="descripcion_cargo">
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
          <h5>Listado de Cargos</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>CARG001</td>
                <td>DJ</td>
                <td>Encargado de la música</td>
              </tr>
              <tr>
                <td>CARG002</td>
                <td>Bartender</td>
                <td>Prepara y sirve bebidas</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  

</body>
</html>
