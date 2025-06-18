<?php
// view/categoria_form.php
// $cat pode existir (edição) ou não (criação)
$action = isset($cat) ? 'categoria_edit.php?id=' . $cat->id_categoria : 'categoria_create.php';
$title  = isset($cat) ? 'Editar Categoria' : 'Nova Categoria';
$name   = $cat->nome ?? '';
?>
<?php include __DIR__ . '/partials/navbar.php'; ?>

<div class="container my-5">
  <h2><?= $title ?></h2>
  <form action="<?= $action ?>" method="POST" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input
        type="text"
        name="nome"
        value="<?= htmlspecialchars($name) ?>"
        class="form-control"
        required>
    </div>
    <button class="btn btn-primary">Salvar</button>
    <a href="gerenciar_categorias.php" class="btn btn-secondary ms-2">Cancelar</a>
  </form>
</div>
