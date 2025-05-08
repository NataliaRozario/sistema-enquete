<?php

session_start();
$title = "Login";
$content = ob_get_clean();

include_once '../config/config.php';
include_once '../templates/template.php';

ob_start();
echo renderTemplate();
?>

<div class="d-flex flex-column align-items-center">
<form action="autenticacao.php" class="mb-3 px-5 py-5 col-md-4" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuário</label>
    <input type="usuario" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" id="senha">
  </div>
  <button type="submit" class="btn btn-primary btn-login mt-3">Entrar</button>
</form>
</div>