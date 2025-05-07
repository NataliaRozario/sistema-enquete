<?php


session_start();
$title = "Resultados";
$content = ob_get_clean();

include_once '../templates/template.php';
include_once '../config/config.php';

ob_start();
echo renderTemplate();

if (isset($_GET['id_enquete'])) {
    $id_enquete = intval($_GET['id_enquete']);
    $tabela = "enquete";
    $colunas_exibir = ['opcao1', 'opcao2', 'opcao3', 'opcao4', 'opcao5'];
    $colunas_voto = ['votos_opcao1', 'votos_opcao2', 'votos_opcao3', 'votos_opcao4', 'votos_opcao5'];

    $sql = "SELECT total_votos, " . implode(', ', $colunas_voto) . ", " . implode(', ', $colunas_exibir) . " FROM " . $tabela . " WHERE id_enquete = ?";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_enquete);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $total_votos = intval($row['total_votos']);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Resultados</title>
            <style>
                .progress {
                    height: 30px;
                    width: 50%;
                    margin-bottom: 10px;
                }
            </style>
        </head>
        <body>
            <p class= "h2 px-4 py-4">Resultados da Enquete</p>
            <div class="container">
                <?php
                foreach ($colunas_exibir as $key => $opcao_coluna) {
                    if (!empty(trim($row[$opcao_coluna]))) {
                        $opcao_nome = htmlspecialchars($row[$opcao_coluna]);
                        $votos = intval($row[$colunas_voto[$key]]);
                        $porcentagem = ($total_votos > 0) ? round(($votos / $total_votos) * 100) : 0;
                        ?>
                        <div class="mb-2">
                            <strong><?php echo $opcao_nome; ?></strong>
                            <div class="progress" role="progressbar" aria-label="<?php echo $opcao_nome; ?>" aria-valuenow="<?php echo $porcentagem; ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-primary" style="width: <?php echo $porcentagem; ?>%;"><?php echo $porcentagem; ?>%</div>
                            </div>
                            <small>Votos: <?php echo $votos; ?></small>
                        </div>
                        <?php
                    }
                }
                ?>
                <p><strong>Total de votos:</strong> <?php echo $total_votos; ?></p>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Enquete não encontrada.";
    }

    $stmt->close();
    $conn->close();

} else {
    echo "ID da enquete não fornecido.";
}

?>