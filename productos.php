<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>DIVINNA Disco - Productos</title>
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
    /* Estilo base del logo */
    .logo {
      display: block;
      max-width: 200px;
      margin: 0 auto;
      animation: blink 1.8s infinite;
    }

    /* Animación de parpadeo */
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
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
      <main class="col-md-10 form-section">
        <h4 class="mb-4">Crear Productos</h4>

        <form action="procesar_producto.php" method="POST" enctype="multipart/form-data">
          <!-- Fila 1 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label" for="codigo_producto">Código Producto</label>
              <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" required />
            </div>
            <div class="col-md-4">
              <label class="form-label" for="categoria_producto">
                Categoría Producto
                <span style="margin-left: 10px;">
                  <a href="categorias.php" class="text-decoration-none text-primary fw-bold">
                    NUEVA <i class="fas fa-plus"></i>
                  </a>
                </span>
              </label>
              <select class="form-control" name="categoria_producto" id="categoria_producto" required>
                <option value="1">Ejemplo Categoría</option>
                <!-- Aquí deberías cargar las categorías dinámicamente -->
              </select>
            </div>
          </div>

          <!-- Fila 2 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label" for="nombre_producto">Nombre Producto</label>
              <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" required />
            </div>
            <div class="col-md-4">
              <label class="form-label" for="descripcion_producto">Descripción Producto</label>
              <input type="text" class="form-control" name="descripcion_producto" id="descripcion_producto" required />
            </div>
          </div>

          <!-- Fila 3 -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label" for="precio">Precio $</label>
              <input type="number" class="form-control" name="precio" id="precio" step="0.01" min="0" required />
            </div>
            <div class="col-md-4">
              <label for="imagenProducto" class="form-label">Imagen Producto</label>
              <input type="file" class="form-control" id="imagenProducto" name="imagenProducto" accept="image/*" />
            </div>
          </div>
          
          <br>
          
          <!-- Botones -->
          <div class="mb-4">
            <button type="submit" class="btn btn-dark btn-custom">Guardar</button>
            <button type="reset" class="btn btn-danger btn-custom">Cancelar</button>
          </div>
        </form>

        <br>
        
        <!-- Tabla de productos -->
        <div class="table-section mt-4">
          <h5>Listado de Productos</h5>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí irían productos cargados dinámicamente -->
              <tr>
                <td>001</td>
                <td>Bebida Energética</td>
                <td>Bebidas</td>
                <td>$1500</td>
                <td>Bebida con alto nivel energético</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div> <!-- fin row -->
  </div> <!-- fin container-fluid -->
  
  <script>
      document.addEventListener('DOMContentLoaded', function() {
        fetch('listarproductostabla.php')
          .then(response => response.json())
          .then(data => {
            if(data.error) {
              alert('Error: ' + data.error);
              return;
            }
    
            // Llenar combo categorías
            const selectCat = document.querySelector('select[name="categoria_producto"]');
            selectCat.innerHTML = '';
            data.categorias.forEach(cat => {
              const option = document.createElement('option');
              option.value = cat.id_categoria;
              option.textContent = cat.nombre_categoria;
              selectCat.appendChild(option);
            });
    
            // Llenar tabla productos
            const tbody = document.querySelector('table tbody');
            tbody.innerHTML = '';
            data.productos.forEach(prod => {
              const tr = document.createElement('tr');
              tr.innerHTML = `
                <td>${prod.codigo_producto}</td>
                <td>${prod.nombre_producto}</td>
                <td>${prod.nombre_categoria || 'Sin categoría'}</td>
                <td>$${parseFloat(prod.precio).toFixed(2)}</td>
                <td>${prod.descripcion_producto}</td>
              `;
              tbody.appendChild(tr);
            });
    
          })
          .catch(err => {
            alert('Error cargando datos: ' + err);
          });
      });
    </script>


</body>
</html>
