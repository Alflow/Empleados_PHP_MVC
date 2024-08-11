<!DOCTYPE html>
<html>

<head>
  <title>Registro de Horarios sencillo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link rel="stylesheet" type="text/css" href='web/css/estilos.css' />
</head>

<body>
  <header>
    <?= isset($_SESSION['usuario']) ? '<h2>Bienvenido ' . $_SESSION['usuario']['Nombre'] . '</h2>' : '' ?>
  </header>
  <nav>
    <hr>

    <a href="index.php?ctl=inicio">Inicio</a> |
    <?= isset($_SESSION['usuario']) ? '<a href="index.php?ctl=logout">Logout</a> | <a href="index.php?ctl=vistaFichaje">Fichar</a>' : '<a href="index.php?ctl=login">Login</a> |'     ?>
    <hr>
  </nav>
  <div id="contenido">
    <?= $contenido ?>
  </div>

  <footer>
    <hr>
    <p align="center">- Pie de página -</p>
  </footer>
</body>

</html>