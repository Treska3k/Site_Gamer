<?php
// view/gerenciar_produtos.php
// A variável $prods já vem do controller

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerenciar Produtos</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="main-content container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-white">Produtos</h2>
      <a href="produto_create.php" class="btn btn-success">Novo Produto</a>
    </div>

    <table class="table table-dark table-bordered">
      <thead>
        <tr>
          <th>ID</th><th>Nome</th><th>Descrição</th>
          <th>Preço</th><th>Categoria</th><th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($prods)): ?>
          <tr>
            <td colspan="6" class="text-center">Nenhum produto cadastrado</td>
          </tr>
        <?php else: ?>
          <?php foreach ($prods as $p): ?>
            <tr>
              <td><?= htmlspecialchars($p['id_produto'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($p['nome'],       ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($p['descricao'],  ENT_QUOTES) ?></td>
              <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
              <td><?= htmlspecialchars($p['categoria'], ENT_QUOTES) ?></td>
              <td>
                <a href="produto_edit.php?id=<?= $p['id_produto'] ?>"
                   class="btn btn-sm btn-primary">Editar</a>
                <form action="produto_delet.php" method="POST" style="display:inline">
                  <input type="hidden" name="id_produto" value="<?= $p['id_produto'] ?>">
                  <button class="btn btn-sm btn-danger"
                          onclick="return confirm('Excluir produto?')">
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
