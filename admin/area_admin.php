<?php

session_start();
$title = "Área Administrativa";
$content = ob_get_clean();

include_once '../config/config.php';
include_once '../templates/template.php';

ob_start();
echo renderTemplate();
?>


<p class= "h2 px-4 py-4">Área Administrativa</p>
<div class="accordion accordion-flush px-5 col-md-6" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Criar enquete
      </button>
    </h2>

    <form action="create_enquete.php" method="post">
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="form-floating mb-3">
        <input type="text" class="form-control" name="pergunta" id="pergunta" required>
        <label for="pergunta">Pergunta</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" name="opcao1" id="opcao1" required>
        <label for="opcao1">Opção 1</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="opcao2" id="opcao2" required>
        <label for="opcao2">Opção 2</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="opcao3" id="opcao3">
        <label for="opcao3">Opção 3 (Opcional)</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="opcao4" id="opcao4">
        <label for="opcao4">Opção 4 (Opcional)</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="opcao5" id="opcao5">
        <label for="opcao5">Opção 5 (Opcional)</label>
    </div>

    <div id="criarEnquete"></div>
    <button type="submit" class="btn btn-primary" id="liveAlertBtn">Criar enquete</button>
    </form>
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed rounded-3" type="submit" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Excluir enquete
      </button>
    </h2>
    <form action="delete_enquete.php" method="post">
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">

        <?php include_once 'lista_enquetes.php'; ?>
      </div>
    </div>
    </form>
  </div>
</div>