<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Enquetônico</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../public">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/criar_enquetes.php">Área adiministrativa</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION['username'])): ?>
          <li class="nav-item">
            <a href="../admin/logout.php" class="nav-link">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="../admin/register.php" class="nav-link">Registrar</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>