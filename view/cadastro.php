<?php
session_start();
require_once __DIR__ . '/../config/database.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5 d-flex justify-content-center">
    <div style="width:100%;max-width:400px;">
      <h2 class="text-white mb-4">Cadastro</h2>

      <!-- feedback via flash -->
      <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-success">
          <?= htmlspecialchars($_SESSION['flash'], ENT_QUOTES) ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
      <?php endif; ?>

      <form action="../acoes.php" method="POST" class="bg-secondary p-4 rounded text-white">
        <input type="hidden" name="create_usuario" value="1">

        <label for="nome">Nome</label>
        <input id="nome" type="text" name="nome" class="form-control mb-3" required>

        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" class="form-control mb-3" required>

        <label for="telefone">Telefone</label>
        <input id="telefone" type="text" name="telefone" class="form-control mb-3" required>

        <label for="data_nascimento">Data de Nascimento</label>
        <input id="data_nascimento" type="date" name="data_nascimento" class="form-control mb-3" required>

        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" class="form-control mb-3" required>

        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
      </form>
    </div>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
