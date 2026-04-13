<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$quadrinhos = $pdo->query("SELECT * FROM quadrinhos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista</title>
</head>

<body>

<h1>Quadrinhos</h1>

<a href="dashboard.php">Voltar</a>
<a href="criarquadrinho.php">Novo</a>

<table border="1">

<tr>
<th>ID</th>
<th>Título</th>
<th>Ações</th>
</tr>

<?php foreach ($quadrinhos as $q): ?>

<tr>
<td><?= $q['id'] ?></td>
<td><?= $q['titulo'] ?></td>

<td>
<a href="editar.php?id=<?= $q['id'] ?>">Editar</a>
<a href="deletar.php?id=<?= $q['id'] ?>">Excluir</a>
</td>
</tr>

<?php endforeach; ?>

</table>

</body>
</html>