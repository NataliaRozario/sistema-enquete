<?php

session_start();
include_once '../config/config.php'; // Inclui conexão com o banco de dados 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = dbConnect(); // verifica se a conexão existe/foi criada
    if (!$conn) {
        die("Erro ao conectar ao banco de dados" . mysqli_connect_error());
    }

    if (isset($_POST['lista'])) {
        $item_marcado = $_POST['lista'];
    }

    $stm = $conn->prepare("DELETE FROM enquete WHERE pergunta = (?)");
    $stm->bind_param("s", $item_marcado); // cada 's' refere-se a um parâmetro

    if ($stm->execute()) {
        echo "<script>alert('Enquete excluída com sucesso!');</script>";
        echo "<script>window.location.href = '../public/';</script>";
    } else {
        echo "<script>alert('Erro ao excluir enquete' );</script>";
        echo "<script>window.history.back()</script>";
    }

}

$conn->close();

?>