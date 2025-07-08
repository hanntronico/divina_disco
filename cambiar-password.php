<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Cambiar Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
      width: 150px;
      margin-right: 10px;
    }
    .form-label {
      font-weight: bold;
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
        <h4 class="mb-4">Cambiar Contraseña</h4>
        <form>
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Usuario Actual</label>
              <input type="text" class="form-control" name="usuario_actual">
            </div>
            <div class="col-md-4">
              <label class="form-label">Contraseña Nueva</label>
              <input type="password" class="form-control" name="nueva_contrasena">
            </div>
            <div class="col-md-4">
              <label class="form-label">Repetir Contraseña</label>
              <input type="password" class="form-control" name="repetir_contrasena">
            </div>
          </div>
          <br>
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Cambiar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
