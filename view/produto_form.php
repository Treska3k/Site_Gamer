<?php
// view/produto_form.php
// $p pode existir (edição) ou não (criação)
// $cats contém todas as categorias
$edit   = isset($p);
$action = $edit
  ? "produto_edit.php?id={$p->id_produto}"
  : 'produto_create.php';
$title  = $edit ? 'Editar Produto' : 'Novo Produto';
?>
<?php include __DIR__ . '/partials/navbar.php'; ?>

<div class="container my-5">
  <h2><?= $title ?></h2>
  <form action="<?= $action ?>" method="POST" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome"
             value="<?= $edit ? htmlspecialchars($p->nome) : '' ?>"
             class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição</label>
      <textarea name="descricao" class="form-control" rows="3"><?= $edit ? htmlspecialchars($p->descricao) : '' ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Preço (ex. 199.99)</label>
      <input type="text" name="preco"
             value="<?= $edit ? $p->preco : '' ?>"
             class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Categoria</label>
      <select name="id_categoria" class="form-select" required>
        <option value="">-- selecione --</option>
        <?php foreach ($cats as $c): ?>
          <option value="<?= $c['id_categoria'] ?>"
            <?= $edit && $p->id_categoria == $c['id_categoria'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($c['nome']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Imagem (nome do arquivo)</label>
      <input type="text" name="imagem"
             value="<?= $edit ? htmlspecialchars($p->imagem) : '' ?>"
             class="form-control">
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="gerenciar_produtos.php" class="btn btn-secondary ms-2">Cancelar</a>
  </form>
</div>
