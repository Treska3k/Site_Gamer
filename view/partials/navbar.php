<?php
// view/partials/navbar.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Auto-login por cookie
if (!isset($_SESSION['user_id']) && !empty($_COOKIE['remember_me'])) {
    $_SESSION['user_id'] = (int) $_COOKIE['remember_me'];
}

$current = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/SiteGamer/view/home.php">TreskaShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <!-- Links principais -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link<?= $current === 'home.php' ? ' active' : '' ?>"
             href="/SiteGamer/view/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= $current === 'produtos.php' ? ' active' : '' ?>"
             href="/SiteGamer/view/produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= $current === 'contato.php' ? ' active' : '' ?>"
             href="/SiteGamer/view/contato.php">Fale Conosco</a>
        </li>
      </ul>

      <!-- Botões de autenticação -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="btn btn-primary me-2" href="/SiteGamer/view/index.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-secondary" href="/SiteGamer/acoes.php?logout=1">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="btn btn-primary me-2" href="/SiteGamer/view/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="/SiteGamer/view/cadastro.php">Cadastre-se</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
