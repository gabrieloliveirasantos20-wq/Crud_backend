<?php
require_once 'includes/conexao.php';
require_once 'includes/header.php';

$busca = trim($_GET['q'] ?? '');

if ($busca !== '') {
    $stmt = $pdo->prepare("SELECT * FROM produtos
                            WHERE nome LIKE :q OR categoria LIKE :q
                            ORDER BY id DESC");
    $stmt->execute([':q' => "%$busca%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
}
$produtos = $stmt->fetchAll();
?>

<section class="card">
  <div class="card-header">
    <h2>Produtos cadastrados</h2>
    <a class="btn btn-primary" href="create.php">+ Novo Produto</a>
  </div>

  <form class="search" method="get" action="index.php">
    <input type="text" name="q" placeholder="Pesquisar por nome ou categoria..."
           value="<?= htmlspecialchars($busca) ?>" />
    <button class="btn" type="submit">Pesquisar</button>
    <?php if ($busca !== ''): ?>
      <a class="btn btn-ghost" href="index.php">Limpar</a>
    <?php endif; ?>
  </form>

  <div class="table-wrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Categoria</th>
          <th>Qtd</th>
          <th>Preço</th>
          <th>Data de cadastro</th>
          <th class="acoes-col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($produtos) === 0): ?>
          <tr><td colspan="7" class="empty">Nenhum produto encontrado.</td></tr>
        <?php else: ?>
          <?php foreach ($produtos as $p): ?>
            <tr>
              <td><?= (int)$p['id'] ?></td>
              <td><?= htmlspecialchars($p['nome']) ?></td>
              <td><?= htmlspecialchars($p['categoria']) ?></td>
              <td><?= (int)$p['quantidade'] ?></td>
              <td>R$ <?= number_format((float)$p['preco'], 2, ',', '.') ?></td>
              <td><?= htmlspecialchars(date('d/m/Y', strtotime($p['data_cadastro']))) ?></td>
              <td class="acoes">
                <a class="btn btn-sm" href="edit.php?id=<?= (int)$p['id'] ?>">Editar</a>
                <a class="btn btn-sm btn-danger js-confirm-delete"
                   href="delete.php?id=<?= (int)$p['id'] ?>">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
