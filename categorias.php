<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DIVINNA Disco - Mantenedores</title>
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
        <h4 class="mb-4">Categorías</h4>
         <form action="procesar_categorias.php" method="POST">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Código Categoría</label>
              <input type="text" class="form-control" name="codigo_categoria" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre Categoría</label>
              <input type="text" class="form-control" name="nombre_categoria" required>
            </div>
          </div>
          <br>
          <div class="mb-3">
            <button class="btn btn-dark btn-custom">Guardar</button>
            <button class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>
        <br>
       <!-- Tabla de Categorías -->
        <div class="table-section">
          <h5>Listado de Categorías</h5>
          <table class="table table-bordered table-striped" id="tabla-categorias">
            <thead class="table-dark">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
              <tr><td colspan="2">Cargando categorías...</td></tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  
  <script>
  document.addEventListener('DOMContentLoaded', () => {
    fetch('listarcategoriastabla.php')
      .then(res => res.json())
      .then(data => {
        const tbody = document.querySelector('#tabla-categorias tbody');
        tbody.innerHTML = ''; // limpiar tabla
        
        if(data.error) {
          tbody.innerHTML = `<tr><td colspan="2">Error: ${data.error}</td></tr>`;
          return;
        }
        
        if(data.categorias.length === 0) {
          tbody.innerHTML = `<tr><td colspan="2">No hay categorías registradas</td></tr>`;
          return;
        }
        
        data.categorias.forEach(cat => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td>${cat.id_categoria}</td>
            <td>${cat.nombre_categoria}</td>
          `;
          tbody.appendChild(tr);
        });
      })
      .catch(err => {
        const tbody = document.querySelector('#tabla-categorias tbody');
        tbody.innerHTML = `<tr><td colspan="2">Error cargando categorías: ${err.message}</td></tr>`;
      });
  });
</script>

</body>
</html>



