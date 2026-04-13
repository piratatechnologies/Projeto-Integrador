<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body style="background:#111; color:white;">

<div class="container mt-5">

    <h1>Painel Admin</h1>

    <p>Bem-vindo, <?= $_SESSION['user']['username'] ?></p>

    <hr>

    <a href="criarquadrinho.php" class="btn btn-danger">Criar Quadrinho</a>
    <a href="listar.php" class="btn btn-warning">Gerenciar</a>
    <a href="index.php" class="btn btn-light">Voltar</a>
    <a href="logout.php" class="btn btn-secondary">Sair</a>

</div>

</body>
</html>