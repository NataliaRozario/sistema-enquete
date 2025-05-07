<?php

session_start();
include_once '../config/config.php'; // Inclui conexão com o banco de dados 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = dbConnect(); // verifica se a conexão existe/foi criada
    if (!$conn) {
        die("Erro ao conectar ao banco de dados" . mysqli_connect_error());
    }

    $pergunta = $_POST['pergunta'];
    $opcao1 = $_POST['opcao1'];
    $opcao2 = $_POST['opcao2'];
    $opcao3 = $_POST['opcao3'] ?? NULL;
    $opcao4 = $_POST['opcao4'] ?? NULL;
    $opcao5 = $_POST['opcao5'] ?? NULL;


    // Inserindo no banco de dados e evita ataque no bd
    $stm = $conn->prepare("INSERT INTO enquete (pergunta, opcao1, opcao2, opcao3, opcao4, opcao5) VALUES (?, ?, ?, ?, ?, ?)");
    $stm->bind_param("ssssss", $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5); // cada 's' refere-se a um parâmetro

    if ($stm->execute()) {
        echo "<script>alert('Enquete criada com sucesso!');</script>";
        echo "<script>window.location.href = '../public/';</script>";
    } else {
        echo "<script>alert('Erro ao criar enquete' );</script>";
        echo "<script>window.history.back()</script>";
    }

}

$conn->close();

?>