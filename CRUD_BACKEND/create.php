<?php
require_once 'includes/conexao.php';
session_start();

$erros = [];
$dados = [
  'nome' => '', 'descricao' => '', 'categoria' => '',
  'quantidade' => '', 'preco' => '', 'data_cadastro' => date('Y-m-d'),
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($dados as $k => $_) {
        $dados[$k] = trim($_POST[$k] ?? '');
    }

    if ($dados['nome'] === '') $erros[] = 'Informe o nome do produto.';
    if ($dados['descricao'] === '') $erros[] = 'Informe a descrição.';
    if ($dados['categoria'] === '') $erros[] = 'Informe a categoria.';
    if ($dados['quantidade'] === '' || !is_numeric($dados['quantidade'])) $erros[] = 'Quantidade inválida.';
    if ($dados['preco'] === '' || !is_numeric(str_replace(',', '.', $dados['preco']))) $erros[] = 'Preço inválido.';
    if ($dados['data_cadastro'] === '') $erros[] = 'Informe a data de cadastro.';

    if (empty($erros)) {
        $stmt = $pdo->prepare("INSERT INTO produtos
            (nome, descricao, categoria, quantidade, preco, data_cadastro)
            VALUES (:nome, :descricao, :categoria, :quantidade, :preco, :data_cadastro)");
        $stmt->execute([
            ':nome' => $dados['nome'],
            ':descricao' => $dados['descricao'],
            ':categoria' => $dados['categoria'],
            ':quantidade' => (int)$dados['quantidade'],
            ':preco' => (float)str_replace(',', '.', $dados['preco']),
            ':data_cadastro' => $dados['data_cadastro'],
        ]);
        $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Produto cadastrado com sucesso!'];
        header('Location: index.php');
        exit;
    }
}

require_once 'includes/header.php';
?>

<section class="card">
  <div class="card-header">
    <h2>Novo Produto</h2>
    <a class="btn btn-ghost" href="index.php">← Voltar</a>
  </div>

  <?php if ($erros): ?>
    <div class="flash error">
      <ul><?php foreach ($erros as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?></ul>
    </div>
  <?php endif; ?>

  <form method="post" class="form" novalidate>
    <div class="form-row">
      <label>Nome do produto
        <input type="text" name="nome" required value="<?= htmlspecialchars($dados['nome']) ?>" />
      </label>
      <label>Categoria
        <input type="text" name="categoria" required value="<?= htmlspecialchars($dados['categoria']) ?>" />
      </label>
    </div>
    <label>Descrição
      <textarea name="descricao" rows="3" required><?= htmlspecialchars($dados['descricao']) ?></textarea>
    </label>
    <div class="form-row">
      <label>Quantidade
        <input type="number" name="quantidade" min="0" required value="<?= htmlspecialchars($dados['quantidade']) ?>" />
      </label>
      <label>Preço (R$)
        <input type="number" step="0.01" min="0" name="preco" required value="<?= htmlspecialchars($dados['preco']) ?>" />
      </label>
      <label>Data de cadastro
        <input type="date" name="data_cadastro" required value="<?= htmlspecialchars($dados['data_cadastro']) ?>" />
      </label>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <a href="index.php" class="btn btn-ghost">Cancelar</a>
    </div>
  </form>
</section>

<?php require_once 'includes/footer.php'; ?>
