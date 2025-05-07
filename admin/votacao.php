<?php

include_once '../config/config.php';

$tabela = "enquete";
$colunas_exibir = ['id_enquete', 'pergunta', 'opcao1', 'opcao2', 'opcao3', 'opcao4', 'opcao5'];
$sql = "SELECT " . implode(', ', $colunas_exibir) . " FROM " . $tabela;
$result = dbConnect()->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="accordion accordion-flush px-5 col-md-6" id="accordionFlushExample">';
    while ($row = $result->fetch_assoc()) {
        $id_enquete = intval($row["id_enquete"]);
        $pergunta = htmlspecialchars($row["pergunta"]);
        $accordionId = 'flush-collapse-' . $id_enquete;
        $accordionHeaderId = 'flush-heading-' . $id_enquete;
        $formId = 'form-enquete-' . $id_enquete;
        $radioGroupName = 'enquete_' . $id_enquete;

        $conteudo_radio = '';
        foreach ($colunas_exibir as $coluna) {
            if ($coluna != 'id_enquete' && $coluna != 'pergunta' && isset($row[$coluna]) && !empty(trim($row[$coluna]))) {
                $opcao = htmlspecialchars($row[$coluna]);
                $radioId = 'opcao-' . $radioGroupName . '-' . $coluna;
                $conteudo_radio .= '<div class="mb-2">';
                $conteudo_radio .= '<input type="radio" class="btn-check" name="' . $radioGroupName . '" id="' . $radioId . '" autocomplete="off" value="' . htmlspecialchars($coluna) . '">';
                $conteudo_radio .= '<label class="btn btn-outline-primary" for="' . $radioId . '">' . $opcao . '</label>';
                $conteudo_radio .= '</div>';
            }
        }

        echo '<div class="accordion-item">';
        echo '  <h2 class="accordion-header" id="' . $accordionHeaderId . '">';
        echo '    <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#' . $accordionId . '" aria-expanded="false" aria-controls="' . $accordionId . '">';
        echo '      ' . $pergunta;
        echo '    </button>';
        echo '  </h2>';
        echo '  <div id="' . $accordionId . '" class="accordion-collapse collapse" aria-labelledby="' . $accordionHeaderId . '" data-bs-parent="#accordionFlushExample">';
        echo '    <div class="accordion-body">';
        echo '      <form id="' . $formId . '" method="post" action="../admin/votar.php">';
        echo '        ' . $conteudo_radio;
        echo '        <input type="hidden" name="id_enquete" value="' . $id_enquete . '">';
        echo '        <button type="submit" class="btn btn-primary mt-3 btn-success">Votar</button>';
        echo '      </form>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }

//     $accordion-button-padding-y:              $accordion-padding-y;
// $accordion-button-padding-x:              $accordion-padding-x;
// $accordion-button-color:                  var(--#{$prefix}body-color);
// $accordion-button-bg:                     var(--#{$prefix}accordion-bg);
// $accordion-transition:                    $btn-transition, border-radius .15s ease;
// $accordion-button-active-bg:              var(--#{$prefix}primary-bg-subtle);
// $accordion-button-active-color:           var(--#{$prefix}primary-text-emphasis);
    echo '</div>';
} else {
    echo "Nenhum resultado encontrado na tabela.";
}

dbConnect()->close();
?>