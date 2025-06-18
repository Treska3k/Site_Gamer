<?php
// view/contato.php
session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fale Conosco</title>
  <!-- CSS custom -->
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5 d-flex justify-content-center">
    <div style="width:100%;max-width:600px;">
      <h2 class="text-white mb-4">Fale Conosco</h2>

      <!-- Mensagem de feedback -->
      <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-success">
          <?= htmlspecialchars($_SESSION['flash'], ENT_QUOTES) ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
      <?php endif; ?>

      <form action="../acoes.php" method="POST" class="bg-secondary p-4 rounded text-white">
        <input type="hidden" name="contato" value="1">

        <label for="nome">Nome</label>
        <input id="nome" type="text" name="nome" class="form-control mb-3" required>

        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" class="form-control mb-3" required>

        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" rows="5" class="form-control mb-3" required></textarea>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
