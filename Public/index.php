<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  use Class\Database\Database;
  use Router\Router;
  use Source\App;

  require './../vendor/autoload.php';

  // On invoque le routeur
  $router = new Router();

  // Les routes
  require '../Router/Routes.php';
  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-900 text-gray-200">

  <!-- Layout Navigation -->
  <?php include_once '../Views/layout/navigation.php'; ?>

  <main class="container mx-auto flex flex-col justify-center pt-8 px-20">

    <!-- APP -->
    <?php
    (new App($router, $_SERVER['REQUEST_URI']))->run();
    ?>
  </main>
</body>

</html>