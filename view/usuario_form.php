<?php
$edit   = isset($u);
$action = $edit
  ? "usuario_edit.php?id={$u->id_usuario}"
  : 'usuario_create.php';

$title = $edit ? 'Editar Usuário' : 'Novo Usuário';
$nome  = $u->nome            ?? '';
$email = $u->email           ?? '';
$tel   = $u->telefone        ?? '';
$data  = $u->data_nascimento ?? '';
?>
<?php include __DIR__ . '/partials/navbar.php'; ?>

<div class="container my-5">
  <h2><?= $title ?></h2>
  <form action="<?= $action ?>" method="POST" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>"
             class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"
             class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="telefone" value="<?= htmlspecialchars($tel) ?>"
             class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Data de Nascimento</label>
      <input type="date" name="data_nascimento" value="<?= $data ?>"
             class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">
        Senha <?= $edit ? '(mantém se em branco)' : '' ?>
      </label>
      <input type="password" name="senha" class="form-control"<?= $edit ? '' : ' required' ?>>
    </div>
    <button class="btn btn-primary">Salvar</button>
    <a href="gerenciar_usuarios.php" class="btn btn-secondary ms-2">Cancelar</a>
  </form>
</div>
