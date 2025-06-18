<?php
// view/login.php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5 d-flex justify-content-center">
    <div style="width:100%;max-width:400px;">
      <h2 class="text-white mb-4">Login</h2>

      <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-danger">
          <?= htmlspecialchars($_SESSION['flash'], ENT_QUOTES) ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
      <?php endif; ?>

      <form action="../acoes.php" method="POST" class="bg-secondary p-4 rounded text-white">
        <input type="hidden" name="login" value="1">

        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" class="form-control mb-3" required>

        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" class="form-control mb-3" required>

        <div class="form-check mb-3">
          <input id="remember" type="checkbox" name="remember" class="form-check-input">
          <label class="form-check-label text-white" for="remember">
            Lembrar-me
          </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
