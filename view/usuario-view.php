<?php
session_start();
require_once __DIR__ . '/../config/database.php';
$id = $_GET['id'] ?? null;
if ($id) {
  $r = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id='$id'");
  $u = mysqli_fetch_assoc($r);
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visualizar Usuário</title>
<link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5 d-flex justify-content-center">
    <div style="width:100%;max-width:500px;">
      <div class="card bg-secondary text-white">
        <div class="card-header">
          <h4 class="mb-0">
            Visualizar Usuário
            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
          </h4>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input class="form-control" value="<?= htmlspecialchars($u['nome']) ?>" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" value="<?= htmlspecialchars($u['email']) ?>" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input class="form-control" value="<?= htmlspecialchars($u['telefone']) ?>" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Data Nascimento</label>
            <input class="form-control" value="<?= date('d/m/Y', strtotime($u['data_nascimento'])) ?>" readonly>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
