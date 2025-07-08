<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Categ</title>
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
        <!-- Sidebar -->
      <nav class="col-md-2 sidebar">
        <strong><a href="#">Sección Productos</a></strong>
        <a href="productos.php">Productos</a>
        <a href="categorias.php">Categorías</a>
        <a href="ingredientes.php">Ingredientes</a>
        <a href="ingredienteproducto.php">Ingrediente Producto</a>
        <hr class="bg-white" />
        <strong><a href="#">Sección Promociones</a></strong>
        <a href="promociones.php">Promociones</a>
        <a href="categoriapromociones.php">Categoría Promociones</a>
        <a href="tipopromocion.php">Tipo Promoción</a>
        <a href="#">Día Semana</a>
        <a href="#">Periodo Promoción</a>
        <a href="#">Promoción</a>
        <hr class="bg-white" />
        <a href="#">Colaboradores</a>
        <a href="#">Cargo</a>
        <a href="#">Colaborador</a>
        <a href="#">Comercio</a>
        <a href="#">Estado Com-Producto</a>
        <hr class="bg-white" />
        <a href="#">Crea QR</a>
        <a href="#">Tipo QR</a>
        <a href="#">DetalleQR</a>
      </nav>

      <!-- Formulario principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Categorías Promociones</h4>
        <form>
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código Estado</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre Estado</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <br>
          <div class="mb-3">
            <button class="btn btn-dark btn-custom">Guardar</button>
            <button class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>
        <br>
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
              <tr>
                <td>CAT001</td>
                <td>Tragos</td>
              </tr>
              <tr>
                <td>CAT002</td>
                <td>Snacks</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</body>
</html>



