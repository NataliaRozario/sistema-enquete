<?php
session_start();
require '../config/config.php';
$conn = dbConnect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE nome_usuario = '$usuario' AND senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header('Location: area_admin.php');
        exit();
    } else {
        echo '<div class="alert alert-danger">Usuário ou senha incorretos</div>';
    }
}