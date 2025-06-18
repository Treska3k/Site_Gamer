<?php
// view/gerenciar_categorias.php
// A variável $cats já vem preenchida pelo controller

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerenciar Categorias</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-white">Categorias</h2>
      <a href="categoria_create.php" class="btn btn-success">Nova Categoria</a>
    </div>

    <table class="table table-dark table-bordered">
      <thead>
        <tr>
          <th>ID</th><th>Nome</th><th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($cats)): ?>
          <tr>
            <td colspan="3" class="text-center">Nenhuma categoria cadastrada</td>
          </tr>
        <?php else: ?>
          <?php foreach ($cats as $c): ?>
            <tr>
              <td><?= htmlspecialchars($c['id_categoria'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($c['nome'],       ENT_QUOTES) ?></td>
              <td>
                <a href="categoria_edit.php?id=<?= $c['id_categoria'] ?>"
                   class="btn btn-sm btn-primary">Editar</a>
                <form action="categoria_delet.php" method="POST" style="display:inline">
                  <input type="hidden" name="id_categoria" value="<?= $c['id_categoria'] ?>">
                  <button class="btn btn-sm btn-danger"
                          onclick="return confirm('Excluir categoria?')">
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
