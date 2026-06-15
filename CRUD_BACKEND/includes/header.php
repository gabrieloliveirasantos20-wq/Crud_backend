<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gerenciamento de Produtos</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header class="topbar">
    <div class="container topbar-inner">
      <h1>📦 Gerenciamento de Produtos</h1>
      <nav>
        <a href="index.php">Listar</a>
        <a href="create.php">Novo Produto</a>
      </nav>
    </div>
  </header>
  <main class="container">
    <?php if (!empty($_SESSION['flash'])): ?>
      <div class="flash <?= htmlspecialchars($_SESSION['flash']['type']) ?>">
        <?= htmlspecialchars($_SESSION['flash']['msg']) ?>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
