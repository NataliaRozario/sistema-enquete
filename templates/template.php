<?php
function renderTemplate() {
    $title = $GLOBALS['title'] ?? 'Página';
  }
?>
    <!doctype html>
    <html lang="pt-br">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?? 'Página'?> </title>
        
        <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../public/assets/css/cores.css" rel="stylesheet">

      </head>
      <body>
        <header>
          <?php include_once 'header.php' ?>
        </header>

        <script src="../public/assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </body>
    </html>

