<?php
require_once 'includes/conexao.php';
session_start();

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Produto excluído com sucesso!'];
}
header('Location: index.php');
exit;
