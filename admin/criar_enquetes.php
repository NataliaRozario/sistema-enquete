<?php

session_start();
$title = "Área Administrativa";
$content = ob_get_clean();

include_once '../templates/template.php';
include_once '../config/config.php';

ob_start();
echo renderTemplate();
?>


<p class= "h2 px-4 py-4">Área Admnistrativa</p>
<div class="accordion accordion-flush px-5 col-md-6" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Criar enquete
      </button>
    </h2>

    <form method="post">
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="pergunta">
        <label for="floatingInput">Pergunta</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="opcao1" required>
        <label for="opcao1">Opção 1</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="opcao2" required>
        <label for="opcao2">Opção 2</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="opcao3">
        <label for="opcao3">Opção 3 (Opcional)</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="opcao4">
        <label for="opcao4">Opção 4 (Opcional)</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="opcao5">
        <label for="opcao5">Opção 5 (Opcional)</label>
    </div>

    <div id="liveAlertPlaceholder"></div>
    <button type="button" class="btn btn-primary" id="liveAlertBtn">Criar enquete</button>
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
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
</div>