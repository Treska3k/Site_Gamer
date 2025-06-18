<?php
// view/index.php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Usuario.php';

// Busca todos os usuários
$users = Usuario::all($pdo);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de Usuários</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-white">Lista de Usuários</h2>
      <a href="cadastro.php" class="btn btn-primary">Adicionar Usuário</a>
    </div>

    <!-- Exibe mensagem de sucesso/erro armazenada em $_SESSION['flash'] -->
    <?php if (!empty($_SESSION['flash'])): ?>
      <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['flash'], ENT_QUOTES) ?>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <table class="table table-dark table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>EMAIL</th>
          <th>TELEFONE</th>
          <th>DATA NASC.</th>
          <th>AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($users) === 0): ?>
          <tr>
            <td colspan="6" class="text-center">Nenhum usuário cadastrado</td>
          </tr>
        <?php else: ?>
          <?php foreach ($users as $u): ?>
            <tr>
              <td><?= htmlspecialchars($u['id_usuario'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['nome'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['email'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['telefone']   ?? '', ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['data_nascimento'] ?? '', ENT_QUOTES) ?></td>
              <td>
                <a href="usuario_edit.php?id=<?= $u['id_usuario'] ?>" class="btn btn-sm btn-primary">Editar</a>
                <form action="usuario_delet.php" method="POST" style="display:inline">
                  <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>">
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir usuário?')">
                    Excluir
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
