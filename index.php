<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DIVINNA Disco</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    nav.menu-bar {
      background-color: #0d6efd;
    }

    nav.menu-bar a {
      color: white;
      margin: 0 10px;
      text-decoration: none;
      font-weight: bold;
    }

    nav.menu-bar a:hover {
      text-decoration: underline;
      color: #ffc107;
    }

    .logo {
      max-width: 250px;
      margin: 10px auto;
      display: block;
    }

    .main-content {
      background-image: url('assets/img/backg.jpg');
      background-size: cover;
      background-position: center;
      padding: 20px;
      min-height: calc(100vh - 130px);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .section-title {
      font-size: 2rem;
      font-weight: bold;
      color: white;
      margin-bottom: 30px;
      text-shadow: 1px 1px 3px #000;
    }

    .option-img {
      transition: transform 0.3s;
      border-radius: 10px;
    }

    .option-img:hover {
      transform: scale(1.05);
      cursor: pointer;
    }

    .option-label {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      font-weight: bold;
      font-size: 1rem;
      text-shadow: 1px 1px 2px black;
    }
  </style>
</head>
<body>

  <!-- Logo -->
  <img src="assets/img/logo.png" alt="DIVINNA Disco" class="logo">

  <!-- Menú de navegación -->
  <nav class="menu-bar text-center py-2">
    <a href="productos.php">Mantenedores</a>
    <a href="consultas.php">Consultas</a>
    <a href="reportes.php">Reportes</a>
    <a href="cierre.php">Inicio/Cierre</a>
  </nav>

  <!-- Contenido principal -->
  <div class="main-content text-center">
    <h5 class="section-title">¿Qué Quieres Hacer Hoy?</h5>

    <div class="container">
      <div class="row row-cols-2 g-4 justify-content-center">
        <div class="col">
          <a href="productos.php" class="text-decoration-none">
            <div class="position-relative text-center">
              <img src="assets/img/1.png" alt="Opción 1" class="img-fluid option-img">
              <div class="option-label">MANTENEDORES</div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="consultas.php" class="text-decoration-none">
            <div class="position-relative text-center">
              <img src="assets/img/2.png" alt="Opción 2" class="img-fluid option-img">
              <div class="option-label">CONSULTAS</div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="reportes.php" class="text-decoration-none">
            <div class="position-relative text-center">
              <img src="assets/img/3.png" alt="Opción 3" class="img-fluid option-img">
              <div class="option-label">REPORTES</div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="cierre.php" class="text-decoration-none">
            <div class="position-relative text-center">
              <img src="assets/img/4.png" alt="Opción 4" class="img-fluid option-img">
              <div class="option-label">INICIO / CIERRE</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
    <footer class="text-center py-3 mt-auto" style="background-color: #111; color: #ccc;">
      &copy; <?php echo date("Y"); ?> DIVINNA Disco. Todos los derechos reservados.
    </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
