<?php
// ingredientes.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Ingredientes</title>
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

  <!-- Barra superior con logo -->
  <div class="bg-black text-center py-3">
    <img src="assets/img/logo.png" alt="DIVINNA Disco" class="logo">
  </div>

  <div class="container-fluid">
    <div class="row">
       <?php include('menu.php'); ?>
       
      <!-- Panel de formulario principal -->
      <div class="col-md-10 form-section">
        <h4 class="mb-4">Gesti&oacute;n de Ingredientes</h4>
        <form method="POST" action="guardar_ingrediente.php">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Ci&oacute;digo de Ingrediente</label>
              <input type="text" class="form-control" name="codigo_ingrediente" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre de Ingrediente</label>
              <input type="text" class="form-control" name="nombre_ingrediente" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Stock Ingrediente</label>
              <input type="number" class="form-control" name="stock" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Medida Uso Ingrediente</label>
              <input type="text" class="form-control" name="medida_uso" required>
            </div>
          </div>
          <br>
          <!-- Botones -->
          <div class="mb-3">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form><br>

        <!-- Tabla de ingredientes -->
        <div class="table-section">
          <h5>Listado de Ingredientes</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>C&oacute;digo</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Medida Uso Ingrediente</th>
              </tr>
            </thead>
            <tbody id="tabla-ingredientes">
              <tr>
                <td colspan="5" class="text-center">Cargando ingredientes...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- JS para cargar ingredientes -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      fetch('cargar_ingredientes.php')
        .then(response => response.json())
        .then(data => {
          const tbody = document.getElementById('tabla-ingredientes');
          tbody.innerHTML = '';

          if (data.ingredientes && data.ingredientes.length > 0) {
            data.ingredientes.forEach(ing => {
              const row = `
                <tr>
                  <td>${ing.id_ingrediente}</td>
                  <td>${ing.nombre_ingrediente}</td>
                  <td>${ing.stock}</td>
                  <td>${ing.medida_uso}</td>
                  
                </tr>
              `;
              tbody.innerHTML += row;
            });
          } else {
            tbody.innerHTML = '<tr><td colspan="5" class="text-center">No hay ingredientes registrados.</td></tr>';
          }
        })
        .catch(error => {
          console.error('Error al cargar los ingredientes:', error);
          alert('Error cargando ingredientes.');
        });
    });
  </script>
  

</body>
</html>
