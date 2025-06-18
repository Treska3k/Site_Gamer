<?php include __DIR__ . '/partials/navbar.php'; ?>

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Usuários</h2>
    <a href="usuario_create.php" class="btn btn-primary">Adicionar Usuário</a>
  </div>
  <table class="table table-dark table-striped table-hover table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Data Nasc.</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($users): ?>
        <?php foreach ($users as $u): ?>
        <tr>
          <td><?= $u['id_usuario'] ?></td>
          <td><?= htmlspecialchars($u['nome']) ?></td>
          <td><?= htmlspecialchars($u['email']) ?></td>
          <td><?= htmlspecialchars($u['telefone']) ?></td>
          <td>
            <?= $u['data_nascimento']
                 ? date('d/m/Y', strtotime($u['data_nascimento']))
                 : '' ?>
          </td>
          <td>
            <a href="usuario_edit.php?id=<?= $u['id_usuario'] ?>"
               class="btn btn-sm btn-success">Editar</a>
            <form action="usuario_delete.php" method="POST" class="d-inline">
              <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>">
              <button class="btn btn-sm btn-danger"
                      onclick="return confirm('Excluir esse usuário?')">
                Excluir
              </button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">Nenhum usuário cadastrado</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
        