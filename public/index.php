<?php

session_start();
$title = "Home";
$content = ob_get_clean();
include_once '../templates/template.php';
include_once '../config/config.php';

ob_start();
?>

<?php if ($conn = dbConnect()): ?>
<h1>home page</h1>
<?php else: ?>
<h1> Erro ao conectar</h1>
<?php endif;?>

<?php 
echo renderTemplate($content);
?>
