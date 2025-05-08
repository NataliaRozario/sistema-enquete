<?php
include_once "../config/config.php";
$table_name = "enquete"; // O nome da tabela que você quer consultar

// Montar a consulta SQL para selecionar todos os dados
$sql = "SELECT * FROM " . $table_name;

// Executar a consulta
$result = dbConnect()->query($sql);

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    echo '<ul class="list-group">';
    $contador = 1;

    // Percorrer cada linha do resultado
    while ($row = $result->fetch_assoc()){
    $pergunta = htmlspecialchars($row["pergunta"]); // Escapar para segurança
    $id_radio = "radio" . $contador;
    $checked = ($contador === 1) ? 'checked' : ''; // Marca o primeiro como checked

    echo '<li class="list-group-item">';
    echo '  <input class="form-check-input me-1" type="radio" name="lista" value="' . $pergunta . '" id="' . $id_radio . '" ' . $checked . '>';
    echo '  <label class="form-check-label" for="' . $id_radio . '">' . $pergunta . '</label>';
    echo '</li>';
    $contador++;
    }
    echo '</ul>';

    echo '<button type="submit" class="btn btn-primary btn-admin mt-3" id="liveAlertBtn">Deletar enquete</button>';
} else {
    echo 'Sem enquetes por aqui... (Ainda). <br>';
}

dbConnect()->close();
?>