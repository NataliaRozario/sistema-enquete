<?php

session_start();
$title = "Home";
$content = ob_get_clean();

include_once '../templates/template.php';
include_once '../config/config.php';

ob_start();
echo renderTemplate();
?>

<p class= "h2 px-4 py-4">Votação de Enquetes</p>
<?php include_once '../admin/votacao.php'; ?>