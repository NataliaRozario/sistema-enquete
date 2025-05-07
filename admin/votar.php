<?php

session_start();
include_once '../config/config.php'; // Inclui conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = dbConnect(); // Verifica se a conexão existe/foi criada
    if (!$conn) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    if (isset($_POST['id_enquete'])) {
        $id_enquete = intval($_POST['id_enquete']);
    } else {
        echo "<script>alert('Erro: ID da enquete não identificado.');</script>";
        echo "<script>window.history.back();</script>";
        $conn->close();
        exit;
    }

    // Determina qual opção foi selecionada
    $opcao_selecionada = null;
    $colunas_voto = ['votos_opcao1', 'votos_opcao2', 'votos_opcao3', 'votos_opcao4', 'votos_opcao5'];
    $colunas_texto = ['opcao1', 'opcao2', 'opcao3', 'opcao4', 'opcao5'];

    // Obtém o nome do grupo de rádio com base no id_enquete
    $radioGroupName = 'enquete_' . $id_enquete;

    foreach ($colunas_texto as $key => $coluna_texto) {
        if (isset($_POST[$radioGroupName]) && $_POST[$radioGroupName] === $coluna_texto) {
            $opcao_selecionada = $colunas_voto[$key];
            break;
        }
    }

    if ($opcao_selecionada) {
        // Incrementa o contador de votos da opção
        $stm_opcao = $conn->prepare("UPDATE enquete SET $opcao_selecionada = $opcao_selecionada + 1 WHERE id_enquete = ?");
        $stm_opcao->bind_param("i", $id_enquete);

        if ($stm_opcao->execute()) {
            // Incrementa o contador total de votos
            $stm_total = $conn->prepare("UPDATE enquete SET total_votos = total_votos + 1 WHERE id_enquete = ?");
            $stm_total->bind_param("i", $id_enquete);
            $stm_total->execute();
            $stm_total->close();

            // Redireciona para resultados.php, passando id_enquete via GET
            header("Location: resultados.php?id_enquete=" . $id_enquete);
            exit;
        } else {
            echo "<script>alert('Erro ao registrar voto: " . $stm_opcao->error . "');</script>";
            echo "<script>window.history.back();</script>";
        }

        $stm_opcao->close();
    } else {
        echo "<script>alert('Erro: Nenhuma opção selecionada.');</script>";
        echo "<script>window.history.back();</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Acesso inválido.');</script>";
    echo "<script>window.location.href = '../public/index.php';</script>";
}

?>